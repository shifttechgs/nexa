# Nexa Mining and Engineering Services — Website

Corporate website for Nexa Mining and Engineering Services (SARL), built on Laravel with Blade templates,
Tailwind CSS, and Laravel Breeze for authentication.

## Stack

- Laravel 13 (PHP 8.3+)
- Blade templates (no SPA framework)
- Tailwind CSS + Alpine.js (via Laravel Breeze, Blade stack)
- SQLite for local development (swap to MySQL in `.env` when needed)

## Local setup (WAMP)

This project lives under WAMP's `www` directory, so it's reachable at
`http://localhost/projects/nexa/public` once Apache is running — no extra vhost required.

```bash
composer install
npm install

cp .env.example .env      # already done for this checkout
php artisan key:generate  # already done for this checkout
php artisan migrate

npm run build              # production assets
# or, for active development with hot reload + queue + logs:
composer dev
```

`composer dev` runs the Laravel dev server, queue listener, log tailer, and Vite dev server together.

## Structure

- `resources/views/home.blade.php` — public marketing homepage, using `<x-marketing-layout>`
- `resources/views/components/marketing-layout.blade.php` — public site header/nav/footer shell
- `resources/views/components/marketing-footer.blade.php` — shared footer with service strip and contact details
- `resources/views/layouts/app.blade.php` + `layouts/navigation.blade.php` — authenticated app shell (dashboard, profile)
- `resources/views/layouts/guest.blade.php` — auth pages shell (login, register, password reset)
- `app/Http/Controllers/HomeController.php` — serves the homepage
- `tailwind.config.js` — brand palette under the `nexa` color namespace (`nexa-navy`, `nexa-green`, `nexa-gold`, `nexa-red`)
- `public/images/` — brand assets (logo, services strip) extracted from the corporate profile
- `public/favicon.ico` — generated from the Nexa icon mark

## Brand

Colors and the logo were sourced from the official *Nexa Corporate Profile 2026* document. If a vector
(SVG/AI) version of the logo becomes available, swap it into `public/images/nexa-logo.*` and update
`resources/views/components/application-logo.blade.php` accordingly.
