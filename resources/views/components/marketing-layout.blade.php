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

        <!-- Fonts: Satoshi + Switzer (Fontshare), IBM Plex Mono (Google) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://api.fontshare.com" crossorigin>
        <link rel="preconnect" href="https://cdn.fontshare.com" crossorigin>
        <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&f[]=switzer@400,500,600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-nexa-ink antialiased bg-nexa-paper">
        <div
            x-data="{ open: false, scrolled: false }"
            x-init="scrolled = window.scrollY > 40"
            @scroll.window="scrolled = window.scrollY > 40"
            class="min-h-screen flex flex-col"
        >

            <!-- Site Header (overlays the hero; turns solid on scroll) -->
            <header
                class="sticky top-0 z-50 transition-colors duration-300"
                :class="scrolled ? 'bg-nexa-paper/90 backdrop-blur-md border-b border-nexa-line' : 'bg-transparent'"
            >
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-[72px]">
                        <a
                            href="{{ route('home') }}"
                            class="shrink-0 flex items-center gap-3 transition duration-300"
                            :class="scrolled ? '' : 'brightness-0 invert'"
                        >
                            <x-application-logo :transparent="true" class="h-9 w-auto" />
                        </a>

                        <nav
                            class="hidden lg:flex items-center gap-1 font-label text-[13px] uppercase tracking-[0.14em] transition-colors duration-300"
                            :class="scrolled ? 'text-nexa-ink/70' : 'text-white/80'"
                        >
                            <a href="{{ route('home') }}" class="nav-link">Home</a>
                            <a href="{{ route('home') }}#services" class="nav-link">Services</a>
                            <a href="{{ route('products.index') }}" class="nav-link">Products</a>
                            <a href="{{ route('home') }}#regions" class="nav-link">Regions</a>
                            <a href="{{ route('posts.index') }}" class="nav-link">Insights</a>
                            <a href="{{ route('home') }}#contact" class="nav-link">Contact</a>
                        </nav>

                        <div class="hidden lg:flex items-center gap-5">
                            <x-btn :href="route('home').'#contact'" variant="primary" size="sm" :arrow="false">
                                Request a Quote
                            </x-btn>
                        </div>

                        <!-- Mobile toggle -->
                        <button
                            @click="open = ! open"
                            aria-label="Toggle menu"
                            class="lg:hidden inline-flex items-center justify-center h-10 w-10 border transition-colors duration-300"
                            :class="scrolled ? 'border-nexa-ink/20 text-nexa-ink' : 'border-white/40 text-white'"
                        >
                            <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': ! open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div x-cloak x-show="open" x-transition class="lg:hidden border-t border-nexa-line bg-nexa-paper">
                    <div class="px-4 py-3 space-y-1">
                        <a href="{{ route('home') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Home</a>
                        <a href="{{ route('home') }}#services" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Services</a>
                        <a href="{{ route('products.index') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Products</a>
                        <a href="{{ route('home') }}#regions" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Regions</a>
                        <a href="{{ route('posts.index') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Insights</a>
                        <a href="{{ route('home') }}#contact" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Contact</a>
                        <div class="pt-3 mt-2 border-t border-nexa-line">
                            <a href="{{ route('home') }}#contact" class="block px-4 py-2.5 text-base font-semibold text-white bg-nexa-green text-center">Request a Quote</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content (pulled up so the hero sits behind the transparent header) -->
            <main class="grow -mt-[72px]">
                {{ $slot }}
            </main>

            <x-marketing-footer />
        </div>

        {{-- Floating WhatsApp button — hidden for now --}}
        {{-- <x-whatsapp-button /> --}}
    </body>
</html>
