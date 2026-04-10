# 🚨 RADMedics Corporation Website

Welcome to the official repository for the RADMedics Corporation website.

This platform embodies our dedication to elevating the standards of pre-hospital emergency care through innovation, integrity, and compassion. By combining advanced web technologies with a deep commitment to education and community partnership, the site serves as a hub for aspiring and current emergency medical professionals. Our focus is on delivering timely, evidence-based information, fostering collaboration, and ensuring every visitor has access to the resources they need to excel in emergency medical services.

## Getting Started

### Prerequisites

-   PHP >= 8.1
-   Composer
-   Node.js & npm

### Installation

1. **Clone the repository:**
    ```sh
    git clone https://github.com/LesterOsana18/RADMedics-Corporation.git
    cd RADMedics-Corporation
    ```
2. **Install PHP dependencies:**
    ```sh
    composer install
    ```
3. **Install JavaScript dependencies:**
    ```sh
    npm install
    ```
4. **Copy and configure environment file:**
    ```sh
    cp .env.example .env
    # Edit .env to match your database and mail settings
    ```
5. **Generate application key:**
    ```sh
    php artisan key:generate
    ```
6. **Run migrations and seeders:**
    ```sh
    php artisan migrate --seed
    ```
7. **Build frontend assets:**
    ```sh
    npm run build
    ```
8. **Start the development server:**
    ```sh
    php artisan serve
    ```
    Visit [http://localhost:8000](http://localhost:8000) in your browser.

## Running Tests

```sh
php artisan test
```

## 🤝 Contributing

### Contribution Guide

1. Ensure you're on the latest `main` branch:

    ```bash
    git checkout main
    git pull origin main
    ```

2. Create a new branch:

    ```bash
    git checkout -b <type>/<short-task-desc>
    ```

    **Examples:**

    - `feat/login-form`
    - `fix/navbar-alignment`
    - `docs/update-readme`

    **Types:**

    - `feat` → New feature
    - `fix` → Bug fix
    - `refactor` → Code clean-up
    - `chore` → Config or dependency update
    - `docs` → Documentation changes

3. Confirm your current branch:

    ```bash
    git branch
    ```

4. Commit your work:

    ```bash
    git add -A
    git commit -m "<type>: <short-description>"
    ```

5. Push to GitHub:

    ```bash
    git push origin <your-branch-name>
    ```

6. Open a Pull Request:

    - Go to: [GitHub Pull Requests](https://github.com/LesterOsana18/RADMedics-Corporation/pulls)
    - Base: `main`, Compare: your branch
    - Add a clear title and description
    - ✅ **Make sure your PR passes all checks**  
      (Code style via `lint.yml`, tests via `pest.yml`)
    - If any checks don’t pass, just push your fixes. GitHub will re-run them automatically.

7. **Notify the team**

    Let the team know in the Messenger group chat once your PR is ready or if you need help.

## License

This project is licensed under the MIT License.

## Contact

For questions or support, please open an issue or contact the maintainers.
