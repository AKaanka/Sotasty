# 🍲 SoTasty - Recipe Sharing Platform

SoTasty is a recipe sharing web application built with **Laravel 12**, **Livewire**, **TailwindCSS**, and **Vite**.  
It allows users to register, manage their profiles, create and share recipes, comment on others' recipes, and secure their accounts with two-factor authentication.  

---

## 🚀 Features

- 🔐 User authentication (registration, login, password reset, email verification)
- 👤 Profile management (update info, change password, delete account)
- 🛡 Two-Factor Authentication (2FA) with recovery codes
- 🍴 Recipes:
  - Create, edit, delete, and view recipes
  - Categorize recipes
  - Add and view comments
- 📊 Dashboard with recipe stats
- 🎨 Responsive UI powered by TailwindCSS & Blade components

---

## 🛠 Tech Stack

- **Backend**: Laravel 12, Laravel Fortify, Livewire
- **Frontend**: Blade, TailwindCSS, Vite
- **Database**: SQLite (default), MySQL, or PostgreSQL
- **Authentication**: Laravel Fortify + Two-Factor Auth
- **Testing**: PestPHP, PHPUnit
- **CI/CD**: GitHub Actions (`.github/workflows/tests.yml`, `lint.yml`)

---

## ⚙️ Installation

### Prerequisites
- PHP >= 8.2
- Composer
- Node.js >= 18 + npm
- SQLite/MySQL/PostgreSQL
- Git

### Steps
```bash
# Clone the repository
git clone https://github.com/your-username/akaanka-sotasty.git
cd akaanka-sotasty

# Install PHP dependencies
composer install

# Install JS dependencies
npm install

# Setup environment
cp .env.example .env
php artisan key:generate

# Run migrations
php artisan migrate --seed

# Start development servers
npm run dev
php artisan serve
````

---

## 🧪 Running Tests

```bash
# Run feature and unit tests
php artisan test

# Or use Pest
./vendor/bin/pest
```

---

## 📂 Project Structure

* `app/` - Core application code (Models, Controllers, Livewire components)
* `resources/views/` - Blade templates for UI
* `database/migrations/` - Database schema definitions
* `tests/` - Feature and unit tests
* `public/` - Public entry point (`index.php`)
* `routes/web.php` - Application routes

---

## 🐳 Optional: Using Laravel Sail (Docker)

If you prefer Docker, you can use Laravel Sail:

```bash
./vendor/bin/sail up
```

---

## 📜 License

This project is licensed under the **MIT License**.

---

## 🤝 Contributing

Pull requests are welcome!
Please open an issue for discussion before making major changes.

---

## 👨‍🍳 Author

Developed by **Akaanka** as part of the SoTasty recipe-sharing application.

```

