@php
    $footerWhatsapp = preg_replace('/\D/', '', config('services.whatsapp.number') ?? '');
@endphp

<footer class="bg-nexa-navy text-white/60">
    <div class="h-2 bg-brand-stripes"></div>

    <!-- Pre-footer CTA -->
    <div class="border-b border-white/10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-8 flex flex-col lg:flex-row items-center justify-between gap-6 text-center lg:text-left">
            <div>
                <p class="font-mono text-[11px] uppercase tracking-widest text-nexa-green mb-1">Talk to Sales</p>
                <h2 class="font-display font-bold text-xl sm:text-2xl text-white">Need pricing or availability on something specific?</h2>
            </div>
            <div class="flex flex-wrap items-center justify-center gap-6 shrink-0">
                <a href="{{ route('home') }}#contact" class="group inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-nexa-green hover:bg-white hover:text-nexa-navy transition">
                    Request a Quote
                    <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                </a>
                @if ($footerWhatsapp)
                    <a
                        href="https://wa.me/{{ $footerWhatsapp }}"
                        target="_blank"
                        rel="noopener noreferrer"
                        class="inline-flex items-center gap-2 text-sm font-semibold text-white/70 hover:text-white border-b border-white/30 hover:border-white pb-0.5 transition"
                    >
                        <svg viewBox="0 0 32 32" class="h-4 w-4 fill-current" aria-hidden="true">
                            <path d="M16.004 3C9.377 3 4 8.377 4 15.004c0 2.386.66 4.62 1.807 6.53L4 29l7.64-1.766a11.94 11.94 0 0 0 4.364.82h.005c6.627 0 12.004-5.377 12.004-12.005C28.013 8.377 22.636 3 16.004 3Zm7.03 17.017c-.297.836-1.47 1.531-2.406 1.735-.64.137-1.475.246-4.29-.92-3.6-1.492-5.914-5.147-6.096-5.386-.176-.24-1.458-1.94-1.458-3.7 0-1.76.905-2.622 1.226-2.983.32-.36.7-.45.933-.45.234 0 .467.002.671.013.216.011.505-.082.79.603.297.716.994 2.475 1.081 2.655.088.18.146.39.03.63-.117.24-.176.39-.35.6-.176.21-.37.47-.53.63-.176.176-.36.367-.155.717.204.35.905 1.494 1.943 2.42 1.335 1.19 2.462 1.559 2.813 1.734.35.176.556.147.76-.088.205-.234 1.376-1.606 1.744-2.156.37-.55.74-.457 1.24-.274.5.184 3.19 1.505 3.74 1.778.55.274.916.41 1.05.64.135.234.135 1.352-.163 2.188Z"/>
                        </svg>
                        WhatsApp Us
                    </a>
                @endif
            </div>
        </div>
    </div>

    <!-- Main grid -->
    <div
        class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-16 grid grid-cols-1 md:grid-cols-12 gap-10"
        data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
    >
        <div class="md:col-span-5">
            <x-application-logo :transparent="true" class="h-10 w-auto" />
            <p class="mt-6 text-sm leading-relaxed max-w-sm text-white/50">
                Nexa distributes quality mining, industrial and technical consumables while providing reliable
                support services to mining operations across the DRC, Central and Southern Africa.
            </p>
            <p class="mt-6 font-mono text-[11px] tracking-widest text-white/30 uppercase">
                OHADA Compliant &middot; Part of Nexa Holding Group
            </p>
        </div>

        <div class="md:col-span-2 md:col-start-6">
            <p class="font-mono text-[11px] tracking-widest text-nexa-green uppercase mb-4">Company</p>
            <ul class="space-y-2.5 text-sm">
                <li><a href="{{ route('home') }}#about" class="group inline-flex items-center gap-1.5 hover:text-white transition"><span class="transition-transform duration-200 group-hover:translate-x-1">About Nexa</span></a></li>
                <li><a href="{{ route('home') }}#services" class="group inline-flex items-center gap-1.5 hover:text-white transition"><span class="transition-transform duration-200 group-hover:translate-x-1">Our Services</span></a></li>
                <li><a href="{{ route('products.index') }}" class="group inline-flex items-center gap-1.5 hover:text-white transition"><span class="transition-transform duration-200 group-hover:translate-x-1">Products</span></a></li>
                <li><a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-1.5 hover:text-white transition"><span class="transition-transform duration-200 group-hover:translate-x-1">Insights</span></a></li>
                <li><a href="{{ route('home') }}#contact" class="group inline-flex items-center gap-1.5 hover:text-white transition"><span class="transition-transform duration-200 group-hover:translate-x-1">Contact Us</span></a></li>
            </ul>
        </div>

        <div class="md:col-span-2">
            <p class="font-mono text-[11px] tracking-widest text-nexa-green uppercase mb-4">Regional Reach</p>
            <ul class="space-y-2.5 text-sm">
                @foreach ([
                    ['DRC', true],
                    ['Zambia', false],
                    ['Zimbabwe', false],
                    ['South Africa', false],
                ] as [$country, $isHq])
                    <li>
                        <a href="{{ route('home') }}#regions" class="group inline-flex items-center gap-2 hover:text-white transition">
                            <span class="h-1.5 w-1.5 shrink-0 {{ $isHq ? 'bg-nexa-green' : 'bg-white/25' }}"></span>
                            <span class="transition-transform duration-200 group-hover:translate-x-1">{{ $country }}{{ $isHq ? ' (HQ)' : '' }}</span>
                        </a>
                    </li>
                @endforeach
            </ul>
        </div>

        <div class="md:col-span-3">
            <p class="font-mono text-[11px] tracking-widest text-nexa-green uppercase mb-4">Head Office</p>
            <ul class="space-y-3.5 text-sm text-white/70">
                <li class="flex gap-2.5">
                    <svg viewBox="0 0 20 20" class="h-4 w-4 mt-0.5 shrink-0 text-white/30" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10 18s6-5.686 6-10a6 6 0 1 0-12 0c0 4.314 6 10 6 10Z"/>
                        <circle cx="10" cy="8" r="2.25" stroke-linecap="round" stroke-linejoin="round"/>
                    </svg>
                    <span>No. 32 Avenue Mwange, Golf Plateau,<br>Commune Annexe, Lubumbashi,<br>Haut-Katanga, DRC</span>
                </li>
                <li class="flex gap-2.5">
                    <svg viewBox="0 0 20 20" class="h-4 w-4 mt-0.5 shrink-0 text-white/30" fill="none" stroke="currentColor" stroke-width="1.5" aria-hidden="true">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M3 5.5A1.5 1.5 0 0 1 4.5 4h11A1.5 1.5 0 0 1 17 5.5v9a1.5 1.5 0 0 1-1.5 1.5h-11A1.5 1.5 0 0 1 3 14.5v-9Z"/>
                        <path stroke-linecap="round" stroke-linejoin="round" d="m4 5.5 6 5 6-5"/>
                    </svg>
                    <span class="space-y-1">
                        <a href="mailto:info@nexaminingservices.com" class="block hover:text-white transition">info@nexaminingservices.com</a>
                        <a href="mailto:sales@nexaminingservices.com" class="block hover:text-white transition">sales@nexaminingservices.com</a>
                    </span>
                </li>
                @if ($footerWhatsapp)
                    <li class="flex gap-2.5">
                        <svg viewBox="0 0 32 32" class="h-4 w-4 mt-0.5 shrink-0 text-white/30 fill-current" aria-hidden="true">
                            <path d="M16.004 3C9.377 3 4 8.377 4 15.004c0 2.386.66 4.62 1.807 6.53L4 29l7.64-1.766a11.94 11.94 0 0 0 4.364.82h.005c6.627 0 12.004-5.377 12.004-12.005C28.013 8.377 22.636 3 16.004 3Zm7.03 17.017c-.297.836-1.47 1.531-2.406 1.735-.64.137-1.475.246-4.29-.92-3.6-1.492-5.914-5.147-6.096-5.386-.176-.24-1.458-1.94-1.458-3.7 0-1.76.905-2.622 1.226-2.983.32-.36.7-.45.933-.45.234 0 .467.002.671.013.216.011.505-.082.79.603.297.716.994 2.475 1.081 2.655.088.18.146.39.03.63-.117.24-.176.39-.35.6-.176.21-.37.47-.53.63-.176.176-.36.367-.155.717.204.35.905 1.494 1.943 2.42 1.335 1.19 2.462 1.559 2.813 1.734.35.176.556.147.76-.088.205-.234 1.376-1.606 1.744-2.156.37-.55.74-.457 1.24-.274.5.184 3.19 1.505 3.74 1.778.55.274.916.41 1.05.64.135.234.135 1.352-.163 2.188Z"/>
                        </svg>
                        <a href="https://wa.me/{{ $footerWhatsapp }}" target="_blank" rel="noopener noreferrer" class="hover:text-white transition">
                            +{{ preg_replace('/^(\d{2})(\d{2})(\d{3})(\d+)$/', '$1 $2 $3 $4', $footerWhatsapp) }}
                        </a>
                    </li>
                @endif
            </ul>
        </div>
    </div>

    <div class="border-t border-white/10">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-5 flex flex-col sm:flex-row items-center justify-between gap-3 font-mono text-[11px] tracking-wide text-white/30">
            <p class="text-center sm:text-left">&copy; {{ date('Y') }} NEXA MINING &amp; ENGINEERING SERVICES &mdash; SARL &middot; REG. OHADA COMPLIANT, LUBUMBASHI, DRC</p>
            <div class="flex items-center gap-5 shrink-0">
                <a href="https://shifttechgs.com" target="_blank" rel="noopener noreferrer" class="uppercase tracking-widest hover:text-white transition">Designed by ShiftTech</a>
                <button
                    type="button"
                    @click="window.scrollTo({ top: 0, behavior: window.matchMedia('(prefers-reduced-motion: reduce)').matches ? 'auto' : 'smooth' })"
                    class="group inline-flex items-center gap-1.5 uppercase tracking-widest hover:text-white transition"
                >
                    Back to top
                    <span class="inline-block transition-transform duration-300 group-hover:-translate-y-1">&uarr;</span>
                </button>
            </div>
        </div>
    </div>
</footer>
