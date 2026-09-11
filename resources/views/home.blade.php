<x-marketing-layout
    :title="'Home'"
    :description="'Nexa Mining and Engineering Services — mining and industrial supply, equipment and logistics, fuel and energy, and training across the DRC, Zimbabwe, Zambia and South Africa.'"
>
    <!-- Hero -->
    <section class="relative flex flex-col overflow-hidden bg-nexa-navy min-h-screen min-h-[100svh] min-h-[100dvh]">
        <!-- Background photo (responsive sources, slow ken-burns) -->
        <picture>
            <source
                type="image/webp"
                sizes="108vw"
                srcset="{{ asset('images/photos/hero-quarry-1280.webp') }} 1280w, {{ asset('images/photos/hero-quarry-1920.webp') }} 1920w, {{ asset('images/photos/hero-quarry-2560.webp') }} 2560w, {{ asset('images/photos/hero-quarry-3200.webp') }} 3200w"
            >
            <img
                src="{{ asset('images/photos/hero-quarry.jpg') }}"
                sizes="108vw"
                srcset="{{ asset('images/photos/hero-quarry-1280.jpg') }} 1280w, {{ asset('images/photos/hero-quarry-1920.jpg') }} 1920w, {{ asset('images/photos/hero-quarry-2560.jpg') }} 2560w, {{ asset('images/photos/hero-quarry-3200.jpg') }} 3200w"
                width="1920" height="1281"
                alt="Mobile crushing plant working under dust in an open quarry"
                class="hero-kenburns absolute inset-0 h-full w-full object-cover object-[50%_60%] md:object-[49%_56%]"
                loading="eager"
                fetchpriority="high"
                decoding="async"
            >
        </picture>
        <!-- Grade: vertical (nav legibility up top, seamless hand-off to the next section at the base) -->
        <div class="hero-grade-y absolute inset-0"></div>
        <!-- Grade: edges (anchors the headline on the left and the CTA on the right; the machine breathes through the middle) -->
        <div class="hero-grade-x absolute inset-0"></div>
        <!-- Film grain -->
        <div class="hero-grain absolute inset-0 opacity-[0.07] mix-blend-overlay"></div>

        <!-- Content -->
        <div class="relative z-10 flex-1 flex items-end">
            <div class="relative w-full max-w-[84rem] mx-auto px-4 sm:px-6 lg:px-8 pt-28 pb-8 sm:pb-10">

                <div class="lg:flex lg:items-end lg:justify-between lg:gap-10">
                    <div class="max-w-3xl">
                        <h1 class="font-display font-medium text-[2.25rem] leading-[1.07] sm:text-[2.75rem] md:text-[3.25rem] lg:text-[3.5rem] 2xl:text-[3.9rem] tracking-tightest text-white">
                            <span class="block rise-in" style="--i: 0">Mining supply and logistics,</span>
                            <span class="block rise-in" style="--i: 1">delivered with precision.</span>
                        </h1>

                        <div class="mt-6 flex flex-col lg:flex-row lg:items-end lg:justify-between gap-6 lg:gap-10">
                            <p class="max-w-lg text-base sm:text-lg text-white/70 leading-relaxed rise-in" style="--i: 2">
                                Explosives, equipment, fuel, technology and training &mdash; one partner across four countries.
                            </p>
                            <div class="lg:shrink-0 rise-in" style="--i: 3">
                                <x-btn href="#contact" variant="primary">Request a Quote</x-btn>
                            </div>
                        </div>
                    </div>

                    <!-- Explore Services card -->
                    <a
                        href="#services"
                        class="hidden lg:flex shrink-0 w-72 items-stretch gap-3 bg-white/10 backdrop-blur-sm ring-1 ring-white/15 p-3 rise-in hover:bg-white/15 transition-colors group"
                        style="--i: 3"
                    >
                        <img
                            src="{{ asset('images/photos/crusher-machine.jpg') }}"
                            alt=""
                            class="h-full w-20 object-cover shrink-0"
                            loading="lazy"
                        >
                        <div class="flex flex-col justify-center py-1">
                            <p class="font-display font-semibold text-white leading-snug">One partner for the whole supply chain.</p>
                            <span class="mt-2 inline-flex items-center gap-1.5 text-sm font-semibold text-nexa-green">
                                Explore Services
                                <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Divider -->
                <div class="mt-10 sm:mt-12 border-t border-white/15 rise-in" style="--i: 4"></div>

                <!-- Trust row: compliance checks + rating -->
                <div class="mt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 rise-in" style="--i: 5">
                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                        @foreach (['OHADA Compliant', '4-Country Coverage', 'Quality Assured'] as $point)
                            <span class="inline-flex items-center gap-2 text-sm text-white/70">
                                <svg viewBox="0 0 20 20" class="h-4 w-4 text-nexa-green shrink-0" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <circle cx="10" cy="10" r="8"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m6.5 10 2.3 2.3L14 7.8"/>
                                </svg>
                                {{ $point }}
                            </span>
                        @endforeach
                    </div>

                    <div class="relative inline-flex flex-col items-center self-center w-44 h-[4.5rem] shrink-0 px-6">
                        <svg viewBox="0 0 176 72" class="absolute inset-0 h-full w-full text-white/30" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round" aria-hidden="true">
                            <path d="M46 68 C 26 60, 16 46, 14 13"/>
                            <path d="M42 62 l-11 -3"/><path d="M36 54 l-12 -2"/><path d="M31 46 l-12 -1"/><path d="M27 38 l-12 0.5"/><path d="M23.5 30 l-11.5 1.5"/><path d="M19.5 22 l-10.5 2"/><path d="M16 15 l-9 2.5"/>
                            <g transform="translate(176,0) scale(-1,1)">
                                <path d="M46 68 C 26 60, 16 46, 14 13"/>
                                <path d="M42 62 l-11 -3"/><path d="M36 54 l-12 -2"/><path d="M31 46 l-12 -1"/><path d="M27 38 l-12 0.5"/><path d="M23.5 30 l-11.5 1.5"/><path d="M19.5 22 l-10.5 2"/><path d="M16 15 l-9 2.5"/>
                            </g>
                        </svg>
                        <div class="relative flex items-center gap-0.5 text-nexa-green">
                            @for ($i = 0; $i < 5; $i++)
                                <svg viewBox="0 0 20 20" class="h-3 w-3 fill-current" aria-hidden="true"><path d="M10 1.5l2.6 5.6 6.1.6-4.6 4.2 1.3 6-5.4-3.1-5.4 3.1 1.3-6-4.6-4.2 6.1-.6z"/></svg>
                            @endfor
                        </div>
                        <p class="relative mt-1.5 font-mono text-[10px] uppercase tracking-widest text-white/60 whitespace-nowrap">4.9 Highly Rated</p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment -->
    <section class="bg-nexa-paper">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32">
            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <x-section-label text="Our Commitment" />
            </div>
            <p
                data-word-reveal
                class="mt-8 max-w-4xl font-display font-medium text-2xl sm:text-4xl lg:text-[2.9rem] leading-[1.25] tracking-tight text-nexa-ink"
            >We build accountability into every shipment, every border crossing and every hour on site — one partner across four countries, defined by precision, reliability and excellence.</p>

            <div
                class="mt-16 sm:mt-24 grid grid-cols-2 lg:grid-cols-4 gap-x-6 gap-y-12"
                data-reveal data-reveal-stagger x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
            >
                @foreach ([
                    ['OHADA Compliant', 'Statutory governance under the OHADA Uniform Act'],
                    ['Nexa Holding Group', 'Part of a diversified group across mining, fuel and energy'],
                    ['Nexa Petroleum', 'Dedicated fuel and energy supply division'],
                    ['Sustainability Committed', 'Responsible practices across every operation'],
                ] as $i => [$title, $body])
                    <div class="relative pl-5 lg:pl-6" style="--i: {{ $i }}">
                        <span class="absolute left-0 top-0 bottom-0 w-px bg-nexa-ink/15"></span>
                        <span class="absolute left-0 top-0 h-6 w-px bg-nexa-green"></span>
                        <p class="font-display font-medium text-nexa-ink text-lg lg:text-xl leading-tight">{{ $title }}</p>
                        <p class="mt-3 text-[13px] text-nexa-ink/55 leading-relaxed">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Clients -->
    <section class="bg-nexa-bone border-y border-nexa-line">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-28">
            <div class="text-center max-w-2xl mx-auto" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <x-section-label text="Our Clients" class="justify-center" />
                <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-nexa-ink">Trusted across the region.</h2>
            </div>

            <div
                class="mt-14 grid grid-cols-2 sm:grid-cols-3 lg:grid-cols-5 gap-4"
                data-reveal data-reveal-stagger x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
            >
                @foreach ([
                    'Katanga Copper', 'Zambezi Resources', 'Kolwezi Mining', 'Copperbelt Energy', 'Great Dyke PGM',
                    'Kasai Diamond Works', 'Southern Reef', 'Tantalum Ridge', 'Chibuluma', 'Haut-Katanga Extractives',
                ] as $i => $client)
                    <div class="group flex items-center justify-center text-center min-h-[104px] px-4 bg-nexa-mist ring-1 ring-nexa-line transition-colors duration-300 hover:bg-white" style="--i: {{ $i % 5 }}">
                        <span class="font-label text-[11px] sm:text-xs uppercase tracking-[0.16em] text-nexa-ink/55 group-hover:text-nexa-ink transition-colors duration-300">{{ $client }}</span>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services (sticky-stack) -->
    @php
        $services = [
            ['MIN&#8209;01', 'Mining & Industrial Supply', 'Explosives, mining chemicals, crushing equipment, safety gear, plant spares and conveyor mechanical spares for gold, copper, cobalt, PGM, diamond, chrome, lithium and tantalite mines.', 'rock-strata.jpg', 'Rock face at an open-pit mine', ['Explosives', 'Consumables']],
            ['OPS&#8209;02', 'Mining Operations Consulting', 'Drilling and blasting, ground support, loading and hauling, and mine dewatering services.', 'hero-excavator.jpg', 'Heavy excavator at an open-pit mining operation', ['Drill & Blast', 'Load & Haul']],
            ['EQP&#8209;03', 'Equipment & Logistics', 'Rental and sale of mining equipment and machinery, with after-sales service, maintenance and spare parts.', 'crusher-machine.jpg', 'Mobile crusher processing rock at a quarry site', ['Rental & Sale', 'After-sales']],
            ['FUEL&#8209;04', 'Fuel & Energy', 'Bulk fuel export, transportation, delivery and fuel management through Nexa Petroleum: diesel, petrol, jet fuel and LPG.', 'chemical-drums.jpg', 'Industrial drums used for bulk liquid handling', ['Bulk Fuel', 'Nexa Petroleum']],
            ['TEC&#8209;05', 'Technology & General Supply', 'IT consumables and hardware, electrical and electronic consumables, and general trade of goods and services.', 'drill-bits.jpg', 'Technical hardware and spare components', ['IT Hardware', 'General Trade']],
            ['TRN&#8209;06', 'Training', 'Machinery operation, safe operating procedures, HSE and occupational risk management, PPE, and site induction training.', 'safety-ppe.jpg', 'Safety equipment and PPE used on site', ['HSE', 'Site Induction']],
        ];
    @endphp
    <section id="services" class="py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <x-section-label text="Core Services" />
                <h2 class="mt-5 font-display font-medium text-3xl sm:text-5xl tracking-tight text-nexa-ink">Everything a mine site needs, from one partner.</h2>
            </div>

            {{-- Desktop: horizontal expanding-panel accordion --}}
            <div
                class="mt-14 hidden lg:flex h-[560px] gap-1 overflow-hidden"
                data-reveal x-data="{ active: 0, shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
            >
                @foreach ($services as $i => [$code, $title, $body, $image, $alt, $tags])
                    <div
                        @mouseenter="active = {{ $i }}"
                        @click="active = {{ $i }}"
                        class="relative shrink-0 cursor-pointer overflow-hidden bg-nexa-navy transition-[width] duration-500 ease-[cubic-bezier(0.16,1,0.3,1)]"
                        :style="'width:' + (active === {{ $i }} ? 'calc(100% - 5.4rem * 5 - 0.25rem * 5)' : '5.4rem')"
                    >
                        <img src="{{ asset('images/photos/'.$image) }}" alt="{{ $alt }}" class="absolute inset-0 h-full w-full object-cover" loading="lazy">
                        <div
                            class="absolute inset-0 bg-nexa-navy transition-opacity duration-500"
                            :class="active === {{ $i }} ? 'opacity-40' : 'opacity-[0.88]'"
                        ></div>
                        {{-- dark at the top (title) and bottom (copy); clear photo through the middle --}}
                        <div class="svc-grade absolute inset-0"></div>

                        {{-- Collapsed: vertical label --}}
                        <div x-show="active !== {{ $i }}" class="absolute inset-0 flex flex-col items-center justify-between py-7 text-white">
                            <span class="font-mono text-base leading-none text-white/70">+</span>
                            <span class="font-mono text-[10px] uppercase tracking-[0.2em] text-white/80 whitespace-nowrap [writing-mode:vertical-rl] rotate-180">{{ $title }}</span>
                            <span class="font-mono text-[10px] tracking-widest text-nexa-green whitespace-nowrap [writing-mode:vertical-rl] rotate-180">{!! $code !!}</span>
                        </div>

                        {{-- Expanded: full content --}}
                        <div
                            x-show="active === {{ $i }}" x-cloak
                            x-transition:enter="transition-opacity ease-out duration-500 delay-200"
                            x-transition:enter-start="opacity-0" x-transition:enter-end="opacity-100"
                            class="absolute inset-0 p-10 xl:p-12 flex flex-col justify-between text-white"
                        >
                            <div>
                                <p class="font-mono text-xs uppercase tracking-[0.2em] text-nexa-green">Service / {!! $code !!}</p>
                                <h3 class="mt-4 font-display font-medium text-3xl xl:text-[2.5rem] leading-tight tracking-tight max-w-md">{{ $title }}</h3>
                            </div>
                            <div class="max-w-md">
                                <p class="text-white/70 leading-relaxed">{{ $body }}</p>
                                <div class="mt-6 flex flex-wrap gap-2">
                                    @foreach ($tags as $tag)
                                        <span class="font-mono text-[11px] uppercase tracking-widest text-white/70 border border-white/25 px-3 py-1.5">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

            {{-- Mobile: vertical accordion --}}
            <div
                class="mt-12 lg:hidden"
                data-reveal x-data="{ open: 0, shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
            >
                @foreach ($services as $i => [$code, $title, $body, $image, $alt, $tags])
                    <div class="bg-nexa-navy text-white border-t border-white/10 first:border-t-0">
                        <button
                            type="button"
                            @click="open = open === {{ $i }} ? null : {{ $i }}"
                            class="w-full flex items-center justify-between gap-4 p-5 text-left"
                            :aria-expanded="(open === {{ $i }}).toString()"
                        >
                            <span class="min-w-0">
                                <span class="font-mono text-[11px] uppercase tracking-widest text-nexa-green">{!! $code !!}</span>
                                <span class="mt-1.5 block font-display font-medium text-lg">{{ $title }}</span>
                            </span>
                            <span class="shrink-0 font-mono text-xl text-nexa-green" x-text="open === {{ $i }} ? '−' : '+'"></span>
                        </button>
                        <div x-show="open === {{ $i }}" x-collapse x-cloak>
                            <div class="px-5 pb-6">
                                <p class="text-sm text-white/70 leading-relaxed">{{ $body }}</p>
                                <div class="mt-4 flex flex-wrap gap-2">
                                    @foreach ($tags as $tag)
                                        <span class="font-mono text-[10px] uppercase tracking-widest text-white/70 border border-white/25 px-2.5 py-1">{{ $tag }}</span>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Client Reviews -->
    @if ($testimonials->isNotEmpty())
        <section class="py-24 bg-nexa-bone border-y border-nexa-line overflow-hidden">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="grid lg:grid-cols-2 gap-8 lg:gap-12 items-start" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div>
                        <x-section-label text="Client Reviews" />
                        <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-nexa-ink">What clients say.</h2>
                    </div>
                    <p class="lg:pt-12 lg:justify-self-end lg:max-w-sm text-nexa-ink/60 leading-relaxed">
                        Real feedback from the mines, contractors and site teams that source their supply, fuel and training through Nexa.
                    </p>
                </div>
            </div>

            <div class="marquee-wrap mt-14 w-full overflow-hidden">
                <ul class="marquee-track flex gap-4 sm:gap-5">
                    @for ($rep = 0; $rep < 4; $rep++)
                        @foreach ($testimonials as $testimonial)
                            <li
                                @if ($rep > 0) aria-hidden="true" @endif
                                class="shrink-0 w-[80vw] sm:w-[22rem] min-h-[22rem] flex flex-col justify-between bg-nexa-mist p-8"
                            >
                                <blockquote class="text-base sm:text-lg leading-relaxed text-nexa-ink/80">&ldquo;{{ trim($testimonial->quote, '"[]') }}&rdquo;</blockquote>
                                <div class="mt-8">
                                    <p class="font-display font-semibold text-nexa-ink">{{ $testimonial->name }}</p>
                                    @if ($testimonial->title)
                                        <p class="text-sm text-nexa-ink/50 mt-0.5">{{ $testimonial->title }}</p>
                                    @endif
                                    @if ($testimonial->company)
                                        <p class="mt-2 font-mono text-[11px] uppercase tracking-[0.15em] text-nexa-green">{{ $testimonial->company }}</p>
                                    @endif
                                </div>
                            </li>
                        @endforeach
                    @endfor
                </ul>
            </div>
        </section>
    @endif

    <!-- Products -->
    @if ($featuredProducts->isNotEmpty())
        @php
            $categoryImages = [
                'Explosives' => 'rock-strata.jpg',
                'Mining Chemicals' => 'chemical-drums.jpg',
                'Crushing Equipment' => 'crusher-machine.jpg',
                'Mining Safety Gear' => 'safety-ppe.jpg',
                'Plant & Equipment Spares' => 'drill-bits.jpg',
                'Conveyor Mechanical Spares' => 'conveyor-aerial.jpg',
            ];
        @endphp
        <section id="products" class="py-24 bg-nexa-bone border-y border-nexa-line">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="max-w-2xl">
                        <x-section-label text="Products" />
                        <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl tracking-tight text-nexa-ink">A catalog built for the field.</h2>
                    </div>
                    <x-btn :href="route('products.index')" variant="navy" size="sm">View All</x-btn>
                </div>

                <div class="mt-14 sticky-stack space-y-6">
                    @foreach ($featuredProducts as $i => $product)
                        <a
                            href="{{ route('products.show', $product) }}"
                            class="sticky-card group block bg-nexa-paper ring-1 ring-nexa-line shadow-[0_30px_80px_-40px_rgba(11,35,64,0.4)] overflow-hidden"
                            style="--stack-top: calc(96px + {{ $i }} * 14px); z-index: {{ $i + 1 }}"
                        >
                            <div class="grid lg:grid-cols-2">
                                <div class="relative min-h-[240px] lg:min-h-[440px] bg-nexa-ink/5 overflow-hidden">
                                    @if (isset($categoryImages[$product->category]))
                                        <img
                                            src="{{ asset('images/photos/'.$categoryImages[$product->category]) }}"
                                            alt="{{ $product->category }}"
                                            class="absolute inset-0 h-full w-full object-cover transition-transform duration-700 group-hover:scale-105"
                                            loading="lazy"
                                        >
                                    @endif
                                    <div class="absolute inset-0 bg-gradient-to-t from-nexa-navy/25 via-transparent to-transparent"></div>
                                </div>

                                <div class="p-8 sm:p-10 lg:p-14 flex flex-col justify-center">
                                    <p class="font-mono text-xs uppercase tracking-[0.2em] text-nexa-green">Product / {{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</p>
                                    <h3 class="mt-4 font-display font-medium text-2xl sm:text-3xl tracking-tight text-nexa-ink group-hover:text-nexa-green transition-colors duration-300">{{ $product->name }}</h3>
                                    <p class="mt-4 text-nexa-ink/60 leading-relaxed max-w-md">{{ $product->summary }}</p>
                                    <div class="mt-8 flex flex-wrap items-center gap-3">
                                        <span class="font-mono text-[11px] uppercase tracking-widest text-nexa-ink/60 border border-nexa-ink/20 px-3 py-1.5">{{ $product->category }}</span>
                                        <span class="font-mono text-[11px] uppercase tracking-wide text-nexa-ink/40">SKU {{ $product->sku }}</span>
                                        <span class="ml-auto text-nexa-ink/30 group-hover:text-nexa-green group-hover:translate-x-1 transition text-xl leading-none">&rarr;</span>
                                    </div>
                                </div>
                            </div>
                        </a>
                    @endforeach
                </div>
            </div>
        </section>
    @endif

    <!-- Mid-page CTA -->
    <section class="bg-nexa-navy">
        <div
            class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-24 sm:py-32"
            data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
        >
            <p class="font-mono text-[11px] uppercase tracking-[0.2em] text-white/60 flex items-center gap-2.5">
                <span class="relative flex h-1.5 w-1.5 shrink-0">
                    <span class="motion-safe:animate-ping absolute inline-flex h-full w-full bg-nexa-green opacity-75"></span>
                    <span class="relative inline-flex h-1.5 w-1.5 bg-nexa-green"></span>
                </span>
                Sales Team Ready
            </p>

            <h2 class="mt-8 max-w-3xl font-display font-medium text-3xl sm:text-5xl lg:text-[3.5rem] leading-[1.08] tracking-tight text-white">
                Need pricing on something specific?
            </h2>

            <div class="mt-6 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-6">
                <p class="max-w-lg text-white/65 leading-relaxed">
                    Tell us what you're sourcing and our sales team will get you a quote &mdash; fast.
                </p>
                <x-btn href="#contact" variant="primary" class="shrink-0">Request a Quote</x-btn>
            </div>
        </div>
    </section>

    <!-- Regions -->
    <section id="regions" class="py-24" x-data="{ active: 'cd', revealed: false }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <x-section-label text="Regional Reach" />
                <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-nexa-ink">One partner, four countries.</h2>
                <p class="mt-5 text-nexa-ink/65 leading-relaxed max-w-md">
                    Headquartered in Lubumbashi with an operational footprint across Central and Southern
                    Africa &mdash; so multi-site operations get consistent supply, pricing and support
                    without renegotiating in every country.
                </p>

                <table class="mt-10 w-full border-t border-nexa-ink/15">
                    @foreach ([
                        ['DRC', 'Lubumbashi', 'Headquarters', 'cd'],
                        ['Zambia', '—', 'Operational footprint', 'zm'],
                        ['Zimbabwe', '—', 'Operational footprint', 'zw'],
                        ['South Africa', '—', 'Operational footprint', 'za'],
                    ] as [$country, $city, $status, $code])
                        <tr
                            class="border-b border-nexa-ink/10 cursor-pointer hover:bg-nexa-green/5 transition-colors duration-300"
                            @click="active = '{{ $code }}'"
                            @mouseenter.debounce.150ms="active = '{{ $code }}'"
                            :class="{ 'bg-nexa-green/5': active === '{{ $code }}' }"
                        >
                            <td class="py-5 font-display font-semibold text-base sm:text-lg text-nexa-ink">{{ $country }}</td>
                            <td class="py-5 font-mono text-xs uppercase tracking-wide text-nexa-ink/45">{{ $city }}</td>
                            <td class="py-5 text-sm text-nexa-ink/55 text-right">{{ $status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true; revealed = true" :class="{ 'is-revealed': shown }">
                <div class="bg-nexa-mist p-8 sm:p-10">
                    <div class="relative w-full max-w-[560px] mx-auto">
                        @include('partials.africa-map')
                    </div>
                    <p class="mt-2 font-mono text-[11px] uppercase tracking-widest text-nexa-ink/35 text-center">
                        Hover or click a country to highlight it
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-24 bg-nexa-bone border-y border-nexa-line" x-data="{ open: 0 }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-16">
                <div class="lg:col-span-4" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <x-section-label text="FAQ" />
                    <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-nexa-ink">Common questions.</h2>
                    <p class="mt-5 text-nexa-ink/60 leading-relaxed max-w-sm">
                        Can&rsquo;t find what you&rsquo;re looking for?
                        <a href="#contact" class="text-nexa-ink underline decoration-nexa-ink/30 underline-offset-4 hover:text-nexa-green hover:decoration-nexa-green transition-colors">Get in touch</a>
                        and our sales team will help directly.
                    </p>
                </div>

                <div class="lg:col-span-8 border-t border-nexa-line" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    @foreach ([
                        ['What countries do you deliver to?', 'We are headquartered in Lubumbashi, DRC, with an operational footprint across Zambia, Zimbabwe and South Africa &mdash; supporting multi-site operations with consistent supply and pricing across all four.'],
                        ['Are you OHADA compliant?', 'Yes. Our statutory operations are governed by the OHADA Uniform Act, which underpins sound corporate governance across our activities in the region.'],
                        ['What can I order from Nexa?', 'Mining and industrial consumables (including explosives, mining chemicals and safety gear), equipment and machinery, bulk fuel (diesel, petrol, jet fuel and LPG), technology and general supply, and training services. See our full product catalog for specifics.'],
                        ['How do I request a quote?', 'Fill in the quote request form below with what you need, or reach our sales team directly by email or WhatsApp. We\'ll follow up with pricing and availability.'],
                        ['Do you support operations spanning multiple countries?', 'Yes &mdash; that\'s a core part of what we do. Our regional footprint means multi-site operations can work with one partner instead of renegotiating supply in every country.'],
                    ] as $i => [$question, $answer])
                        <div class="border-b border-nexa-line">
                            <button
                                type="button"
                                @click="open = open === {{ $i }} ? null : {{ $i }}"
                                @mouseenter.debounce.150ms="open = {{ $i }}"
                                class="w-full flex items-center justify-between gap-6 py-6 text-left"
                                :aria-expanded="(open === {{ $i }}).toString()"
                            >
                                <span class="font-display font-semibold text-lg text-nexa-ink">{{ $question }}</span>
                                <span class="shrink-0 text-nexa-green text-xl font-mono" x-text="open === {{ $i }} ? '−' : '+'"></span>
                            </button>
                            <div x-show="open === {{ $i }}" x-collapse.duration.400ms x-cloak>
                                <div class="pb-6 text-nexa-ink/60 leading-relaxed max-w-2xl">
                                    {!! $answer !!}
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Contact / Quote Request -->
    <section id="contact" class="relative py-24 bg-nexa-navy overflow-hidden">
        <img
            src="{{ asset('images/photos/hero-quarry-1920.jpg') }}"
            srcset="{{ asset('images/photos/hero-quarry-1280.jpg') }} 1280w, {{ asset('images/photos/hero-quarry-1920.jpg') }} 1920w, {{ asset('images/photos/hero-quarry-2560.jpg') }} 2560w, {{ asset('images/photos/hero-quarry-3200.jpg') }} 3200w"
            sizes="100vw"
            alt=""
            aria-hidden="true"
            class="absolute inset-0 h-full w-full object-cover"
            loading="lazy"
        >
        <div class="contact-grade absolute inset-0"></div>

        <div class="relative max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-14 lg:gap-20 items-stretch">

                <div class="flex flex-col" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div>
                        <x-section-label text="Get in touch" :dark="true" />
                        <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-white max-w-md">Ready to work with Nexa?</h2>
                        <p class="mt-5 text-white/55 leading-relaxed max-w-sm">
                            Tell us what you need and our sales team will get back to you &mdash; or reach us directly.
                        </p>
                    </div>

                    <dl class="mt-16 lg:mt-auto border-t border-white/10 divide-y divide-white/10 text-sm">
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">Email</dt>
                            <dd class="text-right"><a href="mailto:sales@nexaminingservices.com" class="font-semibold text-white hover:text-nexa-green transition">sales@nexaminingservices.com</a></dd>
                        </div>
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">WhatsApp</dt>
                            <dd class="text-right"><a href="https://wa.me/27837915713" target="_blank" rel="noopener noreferrer" class="font-semibold text-white hover:text-nexa-green transition">+27 83 791 5713</a></dd>
                        </div>
                        <div class="flex items-center justify-between gap-6 py-4">
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35 shrink-0">Head Office</dt>
                            <dd class="font-semibold text-white text-right">No. 32 Avenue Mwange, Golf Plateau, Commune Annexe, Lubumbashi, DRC</dd>
                        </div>
                    </dl>
                </div>

                <div class="bg-nexa-bone p-8 sm:p-10 shadow-2xl shadow-black/20" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    @if (session('status') === 'quote-request-sent')
                        <div class="mb-6 border border-nexa-green/30 bg-nexa-green/5 px-5 py-4 text-sm font-medium text-nexa-green-dark">
                            Thanks &mdash; your request has been received. Our sales team will be in touch shortly.
                        </div>
                    @endif

                    @php
                        $field = 'w-full border-0 border-b border-nexa-ink/20 rounded-none bg-transparent px-0 py-2 text-nexa-ink placeholder:text-nexa-ink/30 focus:ring-0 focus:border-nexa-green transition-colors';
                    @endphp

                    <form method="POST" action="{{ route('quote-requests.store') }}" class="grid sm:grid-cols-2 gap-x-8 gap-y-7">
                        @csrf

                        <div class="sm:col-span-1">
                            <label for="name" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Full name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required placeholder="John Doe"
                                class="{{ $field }}">
                            @error('name') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="company" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Company</label>
                            <input id="company" name="company" type="text" value="{{ old('company') }}" placeholder="Company name"
                                class="{{ $field }}">
                            @error('company') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="email" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required placeholder="name@company.com"
                                class="{{ $field }}">
                            @error('email') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="phone" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Phone</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}" placeholder="+27 00 000 0000"
                                class="{{ $field }}">
                            @error('phone') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="service_interest" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Service of interest</label>
                            <select id="service_interest" name="service_interest"
                                class="{{ $field }}">
                                <option value="">Select a service&hellip;</option>
                                <option value="Mining & Industrial Supply" @selected(old('service_interest') === 'Mining & Industrial Supply')>Mining &amp; Industrial Supply</option>
                                <option value="Mining Operations Consulting" @selected(old('service_interest') === 'Mining Operations Consulting')>Mining Operations Consulting</option>
                                <option value="Equipment & Logistics" @selected(old('service_interest') === 'Equipment & Logistics')>Equipment &amp; Logistics</option>
                                <option value="Fuel & Energy" @selected(old('service_interest') === 'Fuel & Energy')>Fuel &amp; Energy</option>
                                <option value="Technology & General Supply" @selected(old('service_interest') === 'Technology & General Supply')>Technology &amp; General Supply</option>
                                <option value="Training" @selected(old('service_interest') === 'Training')>Training</option>
                            </select>
                            @error('service_interest') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="message" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Message</label>
                            <textarea id="message" name="message" rows="3" required placeholder="Tell us about your project"
                                class="{{ $field }} resize-none">{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2 mt-2 pt-6 border-t border-nexa-ink/10">
                            <x-btn type="submit" variant="primary" :arrow="false">Send Request</x-btn>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>

    <!-- Insights -->
    @if ($latestPosts->isNotEmpty())
        @php
            $postImages = [
                'Compliance' => 'rock-strata.jpg',
                'Fuel & Energy' => 'chemical-drums.jpg',
                'Training & Safety' => 'safety-ppe.jpg',
            ];
        @endphp
        <section
            class="py-24 bg-nexa-bone border-t border-nexa-line"
            x-data="{
                active: 0,
                visible: true,
                titles: @js($latestPosts->pluck('title')),
                excerpts: @js($latestPosts->pluck('excerpt')),
                dates: @js($latestPosts->map(fn ($p) => $p->published_at->format('d.m.Y'))),
                categories: @js($latestPosts->pluck('category')),
                show(i) {
                    if (this.active === i) return;
                    this.visible = false;
                    setTimeout(() => { this.active = i; this.visible = true; }, 200);
                },
            }"
        >
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="max-w-2xl">
                        <x-section-label text="Insights" />
                        <h2 class="mt-5 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-nexa-ink">From the field.</h2>
                    </div>
                    <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-1.5 text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition shrink-0">
                        View all insights
                        <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>

                <div class="mt-12 grid lg:grid-cols-2 gap-10 lg:gap-16 items-start" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="border-t border-nexa-line">
                        @foreach ($latestPosts as $i => $post)
                            <a
                                href="{{ route('posts.show', $post) }}"
                                @mouseenter.debounce.150ms="show({{ $i }})"
                                @focus="show({{ $i }})"
                                class="flex items-start gap-4 sm:gap-6 py-6 border-b border-nexa-line group"
                            >
                                <span
                                    class="font-mono text-xs shrink-0 mt-1.5 w-20 transition-colors duration-300"
                                    :class="active === {{ $i }} ? 'text-nexa-green' : 'text-nexa-ink/35 group-hover:text-nexa-ink/50'"
                                >{{ $post->published_at->format('d.m.Y') }}</span>

                                <span class="flex-1 min-w-0">
                                    @if ($post->category)
                                        <span
                                            class="font-mono text-[11px] uppercase tracking-widest block mb-1.5 transition-colors duration-300"
                                            :class="active === {{ $i }} ? 'text-nexa-green' : 'text-nexa-ink/40'"
                                        >{{ $post->category }}</span>
                                    @endif
                                    <span
                                        class="font-display font-semibold text-base sm:text-lg leading-snug block transition-colors duration-300"
                                        :class="active === {{ $i }} ? 'text-nexa-ink' : 'text-nexa-ink/60 group-hover:text-nexa-ink/80'"
                                    >{{ $post->title }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>

                    <div class="hidden lg:block relative h-[460px] rounded-2xl overflow-hidden ring-1 ring-nexa-line">
                        @foreach ($latestPosts as $i => $post)
                            @if (isset($postImages[$post->category]))
                                <img
                                    src="{{ asset('images/photos/'.$postImages[$post->category]) }}"
                                    alt="{{ $post->category }}"
                                    class="absolute inset-0 w-full h-full object-cover"
                                    x-show="active === {{ $i }}"
                                    x-transition:enter="transition ease-out duration-700"
                                    x-transition:enter-start="opacity-0"
                                    x-transition:enter-end="opacity-100"
                                    x-transition:leave="transition ease-in duration-700"
                                    x-transition:leave-start="opacity-100"
                                    x-transition:leave-end="opacity-0"
                                    x-cloak
                                    loading="lazy"
                                >
                            @endif
                        @endforeach
                        <div class="absolute inset-0 bg-gradient-to-t from-nexa-navy/80 via-nexa-navy/10 to-transparent pointer-events-none"></div>

                        <div class="absolute inset-x-0 bottom-0 p-6 sm:p-8">
                            <p
                                x-show="visible"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="font-mono text-[11px] uppercase tracking-widest text-white/70"
                            ><span x-text="categories[active]"></span> &middot; <span x-text="dates[active]"></span></p>
                            <p
                                x-show="visible"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="mt-2 font-display font-bold text-xl text-white"
                                x-text="titles[active]"
                            ></p>
                            <p
                                x-show="visible"
                                x-transition:enter="transition ease-out duration-300"
                                x-transition:enter-start="opacity-0 translate-y-2"
                                x-transition:enter-end="opacity-100 translate-y-0"
                                class="mt-2 text-sm text-white/70 leading-relaxed line-clamp-3"
                                x-text="excerpts[active]"
                            ></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif
</x-marketing-layout>
