# Laravel Starter Project
[![Project Status: Active – The project has reached a stable, usable state and is being actively developed.](https://www.repostatus.org/badges/latest/active.svg)](https://www.repostatus.org/#active)
![GitHub last commit](https://img.shields.io/github/last-commit/mortenebak/laravel-starter-project)
![GitHub Sponsors](https://img.shields.io/github/sponsors/mortenebak)

> Updated for Laravel 10.0 **and** Livewire 3.0

This repository contains my starting point when developing a new Laravel project.
It comes with a basic user management, role management and permissions management and a dashboard.

## It includes the TALL stack from the preset at Tallstack.dev:

- [Tailwind CSS](https://tailwindcss.com)
- [Alpine.js](https://alpinejs.dev)
- [Laravel](https://laravel.com)
- [Laravel Livewire](https://laravel-livewire.com)

## Further it includes:

- [Laravel Pint](https://github.com/laravel/pint) for code style fixes
- [PestPHP](https://pestphp.com) for testing
- [Strict Eloquent Models](https://planetscale.com/blog/laravels-safety-mechanisms) for safety
- [Laravel Debugbar](https://github.com/barryvdh/laravel-debugbar) for debugging
- [Laravel IDE helper](https://github.com/barryvdh/laravel-ide-helper) for IDE support
- [Spatie Roles & Permissions](https://spatie.be/docs/laravel-permission/v5/introduction) for user roles and permissions
- [Wire Elements / Modals](https://github.com/wire-elements/modal) for modals
- [LivewireAlerts](https://github.com/jantinnerezo/livewire-alert) for SweetAlerts


# Installation
After cloning the repository, do the following:

## 1. Install dependencies

```bash
composer install
npm install
npm run build # or npm run dev
```

## 2. Configure environment

Setup your `.env` file and run the migrations.

```bash
cp .env.example .env
php artisan key:generate
php artisan storage:link
```

## 3. Migration

```bash
php artisan migrate
```

## 4. Seeding

```bash
php artisan db:seed
```

## 5. Creating the first Super Admin user
    
```bash
php artisan app:create-super-admin
```

# Contributing
Feel free to contribute to this project by submitting a pull request.

# Todo
1. [x] Option for user to change password
2. [x] Option for user to change name and email address
3. [ ] Option for user to delete account
4. [x] Add tests
5. [x] Add tests for the user management
6. [x] Add tests for the role management
7. [x] Add tests for the permission management
8. [x] Add tests for the dashboard
9. [ ] Add concept of Impersonation
10. [ ] Add more documentation

# Credits
I'd like to thank all the people who have contributed to the packages used in this project. 
Especially [Spatie](https://spatie.be) for their great packages, Livewire and Alpinejs for their awesome framework and the Laravel community for their great work.
Furthermore, the [Tallstack.dev](https://tallstack.dev) team for their preset.
And of course [Laravel](https://laravel.com) for their awesome framework.

# Donate
If you like this project, please consider donating to support it.
