@props(['title' => null, 'description' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $description ?? 'Nexa Mining and Engineering Services — mining and industrial supply, equipment and logistics, fuel and energy, and training across the DRC, Zimbabwe, Zambia and South Africa.' }}">

        <title>{{ $title ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">

        <!-- Fonts -->
        <link rel="preconnect" href="https://fonts.bunny.net">
        <link href="https://fonts.bunny.net/css?family=figtree:400,500,600,700,800&display=swap" rel="stylesheet" />

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-gray-900 antialiased">
        <div x-data="{ open: false }" class="min-h-screen flex flex-col">

            <!-- Site Header -->
            <header class="bg-nexa-navy sticky top-0 z-30 shadow-md">
                <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-20">
                        <a href="{{ route('home') }}" class="shrink-0 bg-white rounded-md px-3 py-1.5">
                            <x-application-logo class="h-9 w-auto" />
                        </a>

                        <nav class="hidden lg:flex items-center gap-8">
                            <a href="{{ route('home') }}" class="text-sm font-medium text-white/80 hover:text-white transition">Home</a>
                            <a href="{{ route('home') }}#services" class="text-sm font-medium text-white/80 hover:text-white transition">Services</a>
                            <a href="{{ route('home') }}#about" class="text-sm font-medium text-white/80 hover:text-white transition">About</a>
                            <a href="{{ route('home') }}#contact" class="text-sm font-medium text-white/80 hover:text-white transition">Contact</a>
                        </nav>

                        <div class="hidden lg:flex items-center gap-3">
                            @auth
                                <a href="{{ route('dashboard') }}" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-nexa-navy bg-nexa-gold hover:bg-white transition">
                                    Dashboard
                                </a>
                            @else
                                <a href="{{ route('login') }}" class="text-sm font-medium text-white/80 hover:text-white transition">Log in</a>
                                <a href="{{ route('register') }}" class="inline-flex items-center px-4 py-2 rounded-md text-sm font-semibold text-nexa-navy bg-nexa-gold hover:bg-white transition">
                                    Register
                                </a>
                            @endauth
                        </div>

                        <!-- Mobile toggle -->
                        <button @click="open = ! open" class="lg:hidden inline-flex items-center justify-center p-2 rounded-md text-white/80 hover:text-white hover:bg-white/10">
                            <svg class="h-6 w-6" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': ! open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div x-cloak x-show="open" x-transition class="lg:hidden bg-nexa-navy-dark border-t border-white/10">
                    <div class="px-4 py-4 space-y-1">
                        <a href="{{ route('home') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white/80 hover:text-white hover:bg-white/5">Home</a>
                        <a href="{{ route('home') }}#services" class="block px-3 py-2 rounded-md text-base font-medium text-white/80 hover:text-white hover:bg-white/5">Services</a>
                        <a href="{{ route('home') }}#about" class="block px-3 py-2 rounded-md text-base font-medium text-white/80 hover:text-white hover:bg-white/5">About</a>
                        <a href="{{ route('home') }}#contact" class="block px-3 py-2 rounded-md text-base font-medium text-white/80 hover:text-white hover:bg-white/5">Contact</a>
                        <div class="pt-3 mt-3 border-t border-white/10 flex flex-col gap-2">
                            @auth
                                <a href="{{ route('dashboard') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-nexa-navy bg-nexa-gold text-center">Dashboard</a>
                            @else
                                <a href="{{ route('login') }}" class="block px-3 py-2 rounded-md text-base font-medium text-white/80 hover:text-white hover:bg-white/5">Log in</a>
                                <a href="{{ route('register') }}" class="block px-3 py-2 rounded-md text-base font-semibold text-nexa-navy bg-nexa-gold text-center">Register</a>
                            @endauth
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content -->
            <main class="grow">
                {{ $slot }}
            </main>

            <x-marketing-footer />
        </div>
    </body>
</html>
