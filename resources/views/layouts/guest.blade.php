<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">

        <title>{{ config('app.name') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;800&family=Oswald:wght@500;600&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-nexa-ink antialiased">
        <div class="min-h-screen flex flex-col sm:justify-center items-center pt-10 sm:pt-0 bg-nexa-navy">
            <div>
                <a href="/">
                    <x-application-logo class="h-14 w-auto" />
                </a>
            </div>

            <div class="w-full sm:max-w-md mt-8 px-6 py-8 bg-white border-t-2 border-nexa-green">
                {{ $slot }}
            </div>

            <p class="mt-8 mb-10 font-mono text-[11px] uppercase tracking-widest text-white/35">
                &copy; {{ date('Y') }} Nexa Mining and Engineering Services &mdash; Lubumbashi, DRC
            </p>
        </div>
    </body>
</html>
