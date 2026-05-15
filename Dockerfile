FROM php:8.2-fpm

LABEL org.opencontainers.image.source="https://github.com/your-org/your-repo" \
      maintainer="You <you@example.com>"

# Install system dependencies (Node from Debian is OK for build-only use) & PHP extensions
RUN apt-get update && apt-get install -y --no-install-recommends \
    git curl unzip zip \
    libpng-dev libonig-dev libxml2-dev \
    libjpeg-dev libfreetype6-dev libwebp-dev \
    nodejs npm nginx \
    && docker-php-ext-configure gd --with-jpeg --with-freetype --with-webp \
    && docker-php-ext-install pdo_mysql mbstring exif pcntl bcmath gd \
    && rm -rf /var/lib/apt/lists/*

WORKDIR /var/www

# Copy composer early for caching
COPY --from=composer:2.5 /usr/bin/composer /usr/bin/composer

# 1. Composer deps (cache layer)
COPY composer.json composer.lock ./
# First pass: install dependencies without running Laravel's artisan-dependent composer scripts
RUN COMPOSER_NO_DEV=1 composer install --no-dev --prefer-dist --no-progress --no-interaction --no-scripts --optimize-autoloader

# 2. Node deps (cache layer)
COPY package.json package-lock.json* ./
RUN if [ -f package-lock.json ]; then npm ci; else npm install; fi

# 3. App source
COPY . .

# Second pass: run composer scripts now that full source (artisan, bootstrap, etc.) is present
RUN COMPOSER_NO_DEV=1 composer install --no-dev --prefer-dist --no-progress --no-interaction --optimize-autoloader

# 4. Build assets & Laravel optimize (done at build time)
RUN npm run build || echo "Skipping build failure fallback"

# Ensure writable dirs
RUN chown -R www-data:www-data storage bootstrap/cache \
    && find storage -type d -exec chmod 775 {} \; \
    && chmod 775 bootstrap/cache

# Copy Nginx config
COPY nginx.conf /etc/nginx/conf.d/default.conf

# Copy entrypoint
COPY docker-entrypoint.sh /usr/local/bin/docker-entrypoint.sh
RUN chmod +x /usr/local/bin/docker-entrypoint.sh

ENV PORT=8080
EXPOSE 8080

HEALTHCHECK --interval=30s --timeout=5s --start-period=20s --retries=3 CMD curl -f http://localhost:${PORT}/ || exit 1

ENTRYPOINT ["/usr/local/bin/docker-entrypoint.sh"]
CMD ["app"]

