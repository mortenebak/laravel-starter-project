
## About this Laravel base project

This repository contains my starting point when developing a new Laravel project. It includes the TALL stack from the preset at [Tallstack.dev](https://tallstack.dev):

- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)
- [Laravel](https://laravel.com)
- [Laravel Livewire](https://laravel-livewire.com)

Further it includes:

- [Laravel Pint](https://github.com/laravel/pint) for code style fixes
- [PestPHP](https://pestphp.com) for testing
- [Strict Eloquent Models](https://planetscale.com/blog/laravels-safety-mechanisms) for safety
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) for debugging
- [Laravel IDE helper](https://github.com/barryvdh/laravel-ide-helper) for IDE support
- [Spatie Roles & Permissions](https://spatie.be/docs/laravel-permission/v5/introduction) for user roles and permissions

## Installation

After cloning the repository, do the following:

### 1. Install dependencies

```bash
composer install
npm install
npm run build # or npm run dev
```

### 2. Configure environment

Setup your `.env` file and run the migrations.

```bash
copy .env.example .env
php artisan key:generate
php artisan storage:link
php artisan migrate
```

### 3. Migration

```bash
php artisan migrate
```

### 4. Seeding

```bash
php artisan db:seed
```

### 5. Creating the first Super Admin user
    
```bash
php artisan app:create-super-admin
```
