@props(['title' => null, 'description' => null])

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <meta name="description" content="{{ $description ?? 'Nexa Mining and Engineering Services supplies explosives, mining chemicals, equipment, fuel and training to mines in the DRC, Zambia, Zimbabwe and South Africa.' }}">

        <title>{{ $title ? $title.' - '.config('app.name') : config('app.name') }}</title>

        <link rel="icon" href="{{ asset('favicon.ico') }}" sizes="any">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32.png') }}">
        <link rel="apple-touch-icon" href="{{ asset('apple-touch-icon.png') }}">

        <!-- Fonts: Satoshi + Switzer (Fontshare), IBM Plex Mono (Google) -->
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link rel="preconnect" href="https://api.fontshare.com" crossorigin>
        <link rel="preconnect" href="https://cdn.fontshare.com" crossorigin>
        <link href="https://api.fontshare.com/v2/css?f[]=satoshi@400,500,700,900&f[]=switzer@400,500,600&display=swap" rel="stylesheet">
        <link href="https://fonts.googleapis.com/css2?family=IBM+Plex+Mono:wght@400;500;600&display=swap" rel="stylesheet">

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])

        {{-- Page-specific head tags (social cards, structured data) --}}
        {{ $head ?? '' }}
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
                <div class="site-container">
                    <div class="flex items-center justify-between h-[72px] lg:h-[88px]">
                        <a
                            href="{{ route('home') }}"
                            class="shrink-0 flex items-center gap-3 transition duration-300"
                            :class="scrolled ? '' : 'logo-glow'"
                        >
                            <x-application-logo :transparent="true" class="h-12 lg:h-14 w-auto" />
                        </a>

                        <nav
                            class="hidden lg:flex items-center gap-1 font-label text-[13px] uppercase tracking-[0.14em] transition-colors duration-300"
                            :class="scrolled ? 'text-nexa-ink/70' : 'text-white/80'"
                        >
                            <x-nav-dropdown label="Services" :active="request()->routeIs('services.*')">
                                @foreach (\App\Models\Service::all() as $navService)
                                    <a href="{{ route('services.index') }}#{{ $navService->slug }}" class="group block px-5 py-3 border-b border-nexa-line hover:bg-nexa-bone focus-visible:bg-nexa-bone focus-visible:outline-none transition-colors">
                                        <span class="font-display font-medium text-[15px] text-nexa-ink group-hover:text-nexa-green transition-colors">{{ $navService->title }}</span>
                                    </a>
                                @endforeach
                                <a href="{{ route('services.index') }}" class="block px-5 py-3.5 text-nexa-ink/60 hover:text-nexa-ink hover:bg-nexa-bone focus-visible:bg-nexa-bone focus-visible:text-nexa-ink focus-visible:outline-none transition-colors">All services</a>
                            </x-nav-dropdown>
                            <a href="{{ route('products.index') }}" @class(['nav-link', 'nav-link--active' => request()->routeIs('products.*')])>Products</a>
                            <x-nav-dropdown label="Regions" :active="request()->routeIs('regions.*')">
                                @foreach (\App\Models\Region::all() as $navRegion)
                                    <a href="{{ route('regions.show', $navRegion->slug) }}" class="group flex items-baseline justify-between gap-4 px-5 py-3.5 border-b border-nexa-line hover:bg-nexa-bone focus-visible:bg-nexa-bone focus-visible:outline-none transition-colors">
                                        <span class="font-display font-medium text-base text-nexa-ink group-hover:text-nexa-green transition-colors">{{ $navRegion->name }}</span>
                                        <span class="text-xs text-nexa-ink/50">{{ $navRegion->presence }}{{ $navRegion->city ? ', '.$navRegion->city : '' }}</span>
                                    </a>
                                @endforeach
                                <a href="{{ route('home') }}#regions" class="block px-5 py-3.5 text-nexa-ink/60 hover:text-nexa-ink hover:bg-nexa-bone focus-visible:bg-nexa-bone focus-visible:text-nexa-ink focus-visible:outline-none transition-colors">See them on the map</a>
                            </x-nav-dropdown>
                            <a href="{{ route('posts.index') }}" class="nav-link">Articles</a>
                            <a href="{{ route('contact') }}" @class(['nav-link', 'nav-link--active' => request()->routeIs('contact')])>Contact</a>
                        </nav>

                        <div class="hidden lg:flex items-center gap-5">
                            <x-btn :href="route('contact')" variant="primary" size="sm" :arrow="false">
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
                        <div x-data="{ expanded: @js(request()->routeIs('services.*')) }">
                            <button type="button" @click="expanded = ! expanded" :aria-expanded="expanded.toString()" class="flex w-full items-center justify-between py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">
                                Services
                                <svg viewBox="0 0 12 12" class="h-3 w-3 text-nexa-ink/45 transition-transform duration-200" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="m2.5 4.5 3.5 3.5 3.5-3.5"/></svg>
                            </button>
                            <div x-show="expanded" x-collapse x-cloak>
                                <div class="pl-4 border-l border-nexa-line ml-1 mb-2">
                                    @foreach (\App\Models\Service::all() as $navService)
                                        <a href="{{ route('services.index') }}#{{ $navService->slug }}" @click="open = false" class="block py-2 text-[15px] text-nexa-ink/65 hover:text-nexa-ink">{{ $navService->title }}</a>
                                    @endforeach
                                    <a href="{{ route('services.index') }}" @click="open = false" class="block py-2 text-[15px] text-nexa-ink/45 hover:text-nexa-ink">All services</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('products.index') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Products</a>
                        <div x-data="{ expanded: @js(request()->routeIs('regions.*')) }">
                            <button type="button" @click="expanded = ! expanded" :aria-expanded="expanded.toString()" class="flex w-full items-center justify-between py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">
                                Regions
                                <svg viewBox="0 0 12 12" class="h-3 w-3 text-nexa-ink/45 transition-transform duration-200" :class="{ 'rotate-180': expanded }" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true"><path d="m2.5 4.5 3.5 3.5 3.5-3.5"/></svg>
                            </button>
                            <div x-show="expanded" x-collapse x-cloak>
                                <div class="pl-4 border-l border-nexa-line ml-1 mb-2">
                                    @foreach (\App\Models\Region::all() as $navRegion)
                                        <a href="{{ route('regions.show', $navRegion->slug) }}" @click="open = false" class="block py-2 text-[15px] text-nexa-ink/65 hover:text-nexa-ink">{{ $navRegion->name }}</a>
                                    @endforeach
                                    <a href="{{ route('home') }}#regions" @click="open = false" class="block py-2 text-[15px] text-nexa-ink/45 hover:text-nexa-ink">See them on the map</a>
                                </div>
                            </div>
                        </div>
                        <a href="{{ route('posts.index') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Articles</a>
                        <a href="{{ route('contact') }}" class="block py-2.5 text-base font-medium text-nexa-ink/80 hover:text-nexa-ink">Contact</a>
                        <div class="pt-3 mt-2 border-t border-nexa-line">
                            <a href="{{ route('contact') }}" class="block px-4 py-2.5 text-base font-semibold text-white bg-nexa-green text-center">Request a Quote</a>
                        </div>
                    </div>
                </div>
            </header>

            <!-- Page Content (pulled up so the hero sits behind the transparent header) -->
            <main class="grow -mt-[72px] lg:-mt-[88px]">
                {{ $slot }}
            </main>

            <x-marketing-footer />
        </div>

        <x-quote-bar />

        {{-- Floating WhatsApp button — hidden for now --}}
        {{-- <x-whatsapp-button /> --}}
    </body>
</html>
