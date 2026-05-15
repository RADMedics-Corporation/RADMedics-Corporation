#!/usr/bin/env sh
set -e

# Adjust nginx listen port dynamically for Render (uses $PORT)
if [ -n "${PORT}" ]; then
  sed -i "s/listen 80;/listen ${PORT};/" /etc/nginx/conf.d/default.conf || true
fi

# Clear any stale caches (removes references to removed providers like Flux)
php artisan optimize:clear || true
rm -f bootstrap/cache/packages.php bootstrap/cache/services.php bootstrap/cache/config.php 2>/dev/null || true
composer dump-autoload -o || true

# Ensure SQLite database exists & permissions (if using sqlite)
if grep -qi '^DB_CONNECTION=sqlite' .env 2>/dev/null; then
  mkdir -p database || true
  if [ ! -f database/database.sqlite ]; then
    touch database/database.sqlite || true
  fi
  chmod 664 database/database.sqlite 2>/dev/null || true
  chown www-data:www-data database/database.sqlite 2>/dev/null || true
fi

# Fallback SESSION_DRIVER and CACHE_STORE if required tables/migrations absent
if [ "${SESSION_DRIVER}" = "database" ]; then
  if ! ls database/migrations/*create_sessions_table* >/dev/null 2>&1; then
    export SESSION_DRIVER=file
    echo "SESSION_DRIVER fallback to file (sessions migration missing)."
  fi
fi
if [ "${CACHE_STORE}" = "database" ]; then
  if ! ls database/migrations/*create_cache_table* >/dev/null 2>&1; then
    export CACHE_STORE=file
    echo "CACHE_STORE fallback to file (cache migration missing)."
  fi
fi

# Run migrations (ignore errors but log)
if php artisan migrate --force; then
  echo "Migrations completed."
else
  echo "Migrations failed; continuing with app startup." >&2
fi

if php artisan db:seed --force; then
    echo "Seeding successfully."
else
    echo "Seeding failed" >&2
fi

# Rebuild caches
php artisan config:cache || true
php artisan route:cache || true
php artisan view:cache || true

# Run pending migrations if requested
if [ "${RUN_MIGRATIONS}" = "true" ]; then
  php artisan migrate --force || echo "Migrations skipped"
fi

# Start PHP-FPM in background then nginx in foreground
php-fpm -D
exec nginx -g 'daemon off;'
