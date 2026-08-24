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
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Archivo:wght@600;700;800&family=Oswald:wght@500;600&family=IBM+Plex+Sans:wght@400;500;600&family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans text-nexa-ink antialiased bg-nexa-paper">
        <div x-data="{ open: false }" class="min-h-screen flex flex-col">

            <!-- Utility Bar -->
            <div class="bg-nexa-navy text-white/60">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 h-9 flex items-center justify-between text-xs">
                    <div class="flex items-center gap-5 font-mono tracking-wide">
                        <a href="mailto:sales@nexaminingservices.com" class="hover:text-white transition hidden sm:inline">sales@nexaminingservices.com</a>
                        <a href="https://wa.me/27837915713" target="_blank" rel="noopener noreferrer" class="hover:text-white transition">+27 83 791 5713</a>
                    </div>
                    <div class="flex items-center gap-4">
                        <a href="#" aria-label="Nexa on Facebook" class="text-white/40 hover:text-white transition">
                            <svg viewBox="0 0 320 512" class="h-3.5 w-3.5 fill-current" aria-hidden="true">
                                <path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/>
                            </svg>
                        </a>
                        <a href="#" aria-label="Nexa on LinkedIn" class="text-white/40 hover:text-white transition">
                            <svg viewBox="0 0 448 512" class="h-3.5 w-3.5 fill-current" aria-hidden="true">
                                <path d="M100.28 448H7.4V148.9h92.88zm-46.44-341C24.09 107 0 82.9 0 53.6a53.6 53.6 0 0 1 107.2 0c0 29.3-24.1 53.4-53.36 53.4zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.7 37.7-55.7 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.28 61.9 111.28 142.3V448z"/>
                            </svg>
                        </a>
                    </div>
                </div>
            </div>

            <!-- Site Header -->
            <header class="sticky top-0 z-40 bg-nexa-paper/95 backdrop-blur-sm border-b border-nexa-ink/15">
                <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                    <div class="flex items-center justify-between h-[76px]">
                        <a href="{{ route('home') }}" class="shrink-0 flex items-center gap-3">
                            <x-application-logo class="h-9 w-auto" />
                        </a>

                        <nav class="hidden lg:flex items-center gap-8">
                            <a href="{{ route('home') }}" class="font-label text-sm uppercase tracking-wide text-nexa-ink/70 hover:text-nexa-ink border-b-2 border-transparent hover:border-nexa-green pb-1 transition">Home</a>
                            <a href="{{ route('home') }}#services" class="font-label text-sm uppercase tracking-wide text-nexa-ink/70 hover:text-nexa-ink border-b-2 border-transparent hover:border-nexa-green pb-1 transition">Services</a>
                            <a href="{{ route('products.index') }}" class="font-label text-sm uppercase tracking-wide text-nexa-ink/70 hover:text-nexa-ink border-b-2 border-transparent hover:border-nexa-green pb-1 transition">Products</a>
                            <a href="{{ route('home') }}#regions" class="font-label text-sm uppercase tracking-wide text-nexa-ink/70 hover:text-nexa-ink border-b-2 border-transparent hover:border-nexa-green pb-1 transition">Regions</a>
                            <a href="{{ route('posts.index') }}" class="font-label text-sm uppercase tracking-wide text-nexa-ink/70 hover:text-nexa-ink border-b-2 border-transparent hover:border-nexa-green pb-1 transition">Insights</a>
                            <a href="{{ route('home') }}#contact" class="font-label text-sm uppercase tracking-wide text-nexa-ink/70 hover:text-nexa-ink border-b-2 border-transparent hover:border-nexa-green pb-1 transition">Contact</a>
                        </nav>

                        <div class="hidden lg:flex items-center gap-5">
                            <a href="{{ route('home') }}#contact" class="inline-flex items-center px-5 py-2.5 text-sm font-semibold text-white bg-nexa-green hover:bg-nexa-navy hover:text-white transition">
                                Request a Quote
                            </a>
                        </div>

                        <!-- Mobile toggle -->
                        <button @click="open = ! open" class="lg:hidden inline-flex items-center justify-center h-10 w-10 border border-nexa-ink/20 text-nexa-ink">
                            <svg class="h-5 w-5" stroke="currentColor" fill="none" viewBox="0 0 24 24">
                                <path :class="{ 'hidden': open }" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16" />
                                <path :class="{ 'hidden': ! open }" class="hidden" stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                            </svg>
                        </button>
                    </div>
                </div>

                <!-- Mobile menu -->
                <div x-cloak x-show="open" x-transition class="lg:hidden border-t border-nexa-ink/15 bg-nexa-paper">
                    <div class="px-4 py-3 space-y-1">
                        <a href="{{ route('home') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Home</a>
                        <a href="{{ route('home') }}#services" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Services</a>
                        <a href="{{ route('products.index') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Products</a>
                        <a href="{{ route('home') }}#regions" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Regions</a>
                        <a href="{{ route('posts.index') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Insights</a>
                        <a href="{{ route('home') }}#contact" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Contact</a>
                        <div class="pt-3 mt-2 border-t border-nexa-ink/15 flex flex-col gap-2">
                            <a href="{{ route('home') }}#contact" class="block px-4 py-2.5 text-base font-semibold text-white bg-nexa-green text-center">Request a Quote</a>
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

        <x-whatsapp-button />
    </body>
</html>
