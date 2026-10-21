@php
    $footerWhatsapp = preg_replace('/\D/', '', config('services.whatsapp.number') ?? '');
    // social profiles show only once a real URL is set in .env
    $footerSocials = array_filter([
        'LinkedIn' => config('services.social.linkedin'),
        'Facebook' => config('services.social.facebook'),
    ]);
    $footerHeading = 'text-sm font-medium text-white mb-4';
    $footerLink = 'hover:text-white transition-colors';
@endphp

<footer class="bg-nexa-navy text-white/60">
    <div class="h-1 bg-nexa-green"></div>

    <!-- Main grid -->
    <div class="pt-16 pb-12">
        <div
            class="site-container grid grid-cols-2 lg:grid-cols-12 gap-x-8 gap-y-12"
            data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
        >
            <div class="col-span-2 lg:col-span-3">
                <x-application-logo :transparent="true" class="h-14 w-auto" />
                <p class="mt-6 text-sm leading-relaxed max-w-sm text-white/55">
                    Nexa supplies mining, industrial and technical consumables to mines in the DRC, Zambia,
                    Zimbabwe and South Africa, and supports them on site.
                </p>
                <p class="mt-4 text-sm text-white/40">Part of Nexa Holding Group.</p>

                @if ($footerSocials)
                    <div class="mt-8 flex items-center gap-2">
                        @foreach ($footerSocials as $network => $url)
                            <a href="{{ $url }}" target="_blank" rel="noopener noreferrer" aria-label="Nexa on {{ $network }}" class="flex h-10 w-10 items-center justify-center border border-white/15 text-white/60 hover:border-white/40 hover:text-white transition-colors">
                                @if ($network === 'LinkedIn')
                                    <svg viewBox="0 0 448 512" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M100.28 448H7.4V148.9h92.88zm-46.44-341C24.09 107 0 82.9 0 53.6a53.6 53.6 0 0 1 107.2 0c0 29.3-24.1 53.4-53.36 53.4zM447.9 448h-92.68V302.4c0-34.7-.7-79.2-48.29-79.2-48.29 0-55.7 37.7-55.7 76.7V448h-92.78V148.9h89.08v40.8h1.3c12.4-23.5 42.7-48.3 87.9-48.3 94 0 111.28 61.9 111.28 142.3V448z"/></svg>
                                @else
                                    <svg viewBox="0 0 320 512" class="h-4 w-4 fill-current" aria-hidden="true"><path d="M279.14 288l14.22-92.66h-88.91v-60.13c0-25.35 12.42-50.06 52.24-50.06h40.42V6.26S260.43 0 225.36 0c-73.22 0-121.08 44.38-121.08 124.72v70.62H22.89V288h81.39v224h100.17V288z"/></svg>
                                @endif
                            </a>
                        @endforeach
                    </div>
                @endif
            </div>

            <div class="lg:col-span-2">
                <p class="{{ $footerHeading }}">Explore</p>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="{{ route('home') }}#commitment" class="{{ $footerLink }}">About Nexa</a></li>
                    <li><a href="{{ route('services.index') }}" class="{{ $footerLink }}">Services</a></li>
                    <li><a href="{{ route('products.index') }}" class="{{ $footerLink }}">Products</a></li>
                    <li><a href="{{ route('posts.index') }}" class="{{ $footerLink }}">Articles</a></li>
                    <li><a href="{{ route('contact') }}" class="{{ $footerLink }}">Contact</a></li>
                </ul>
            </div>

            <div class="lg:col-span-2">
                <p class="{{ $footerHeading }}">Regions</p>
                <ul class="space-y-2.5 text-sm">
                    @foreach (\App\Models\Region::all() as $region)
                        <li>
                            <a href="{{ route('regions.show', $region->slug) }}" class="{{ $footerLink }}">{{ $region->name }}</a>
                            @if ($region->isHeadOffice())
                                <span class="ml-1.5 text-xs text-nexa-green">HQ</span>
                            @endif
                        </li>
                    @endforeach
                </ul>
            </div>

            <div class="lg:col-span-2">
                <p class="{{ $footerHeading }}">Offices</p>
                <div class="space-y-5 text-sm leading-relaxed">
                    <div>
                        <p class="text-white/40">Lubumbashi, head office</p>
                        <address class="mt-1 not-italic text-white/70">No. 32 Avenue Mwange, Golf Plateau, Commune Annexe, Haut-Katanga, DRC</address>
                    </div>
                    <div>
                        <p class="text-white/40">Johannesburg</p>
                        <address class="mt-1 not-italic text-white/70">16 Caithness Road, Blairgowrie, 2194, RSA</address>
                    </div>
                </div>
            </div>

            <div class="col-span-2 lg:col-span-3">
                <p class="{{ $footerHeading }}">Get in touch</p>
                <ul class="space-y-2.5 text-sm">
                    <li><a href="mailto:sales@nexaminingservices.com" class="{{ $footerLink }}">sales@nexaminingservices.com</a></li>
                    <li><a href="mailto:info@nexaminingservices.com" class="{{ $footerLink }}">info@nexaminingservices.com</a></li>
                    @if ($footerWhatsapp)
                        <li>
                            <a href="https://wa.me/{{ $footerWhatsapp }}" target="_blank" rel="noopener noreferrer" class="{{ $footerLink }}">
                                WhatsApp +{{ preg_replace('/^(\d{2})(\d{2})(\d{3})(\d+)$/', '$1 $2 $3 $4', $footerWhatsapp) }}
                            </a>
                        </li>
                    @endif
                    <li class="pt-2">
                        <a href="{{ route('contact') }}" class="group inline-flex items-center gap-1.5 font-semibold text-white border-b border-white/30 hover:border-white pb-0.5 transition-colors">
                            Request a quote
                            <span class="inline-block transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </div>

    <!-- Wordmark watermark -->
    <x-footer-wordmark text="NEXA" />

    <div class="border-t border-white/10">
        <div class="site-container py-5 flex flex-col sm:flex-row items-center justify-between gap-3 text-xs text-white/40">
            <p class="text-center sm:text-left">&copy; {{ date('Y') }} Nexa Mining &amp; Engineering Services SARL. OHADA compliant.</p>
            <div class="flex items-center gap-6 shrink-0">
                <a href="https://shifttechgs.com" target="_blank" rel="noopener noreferrer" class="hover:text-white transition-colors">Designed by ShiftTech</a>
                <button
                    type="button"
                    @click="window.scrollTo({ top: 0, behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' })"
                    class="group inline-flex items-center gap-1.5 hover:text-white transition-colors"
                >
                    Back to top
                    <span class="inline-block transition-transform duration-300 group-hover:-translate-y-0.5" aria-hidden="true">&uarr;</span>
                </button>
            </div>
        </div>
    </div>
</footer>
