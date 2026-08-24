<x-marketing-layout
    :title="'Home'"
    :description="'Nexa Mining and Engineering Services — mining and industrial supply, equipment and logistics, fuel and energy, and training across the DRC, Zimbabwe, Zambia and South Africa.'"
>
    <!-- Hero -->
    <section class="relative bg-nexa-navy overflow-hidden flex flex-col lg:h-[calc(100dvh-113px)] lg:min-h-[600px] lg:max-h-[860px]">
        <div class="grid lg:grid-cols-2 lg:flex-1 lg:min-h-0">
            <!-- Text -->
            <div class="relative z-10 flex items-center px-4 sm:px-6 lg:pl-8 lg:pr-14 pt-10 sm:pt-14 lg:pt-0 pb-8 lg:pb-0">
                <div class="max-w-xl lg:ml-auto">
                    <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Supporting Mining &middot; Empowering Africa</p>

                    <h1 class="font-display font-extrabold text-3xl sm:text-5xl lg:text-6xl text-white leading-[1.05]">
                        Mining supply and logistics, delivered with precision.
                    </h1>

                    <p class="mt-4 sm:mt-6 text-base sm:text-lg text-white/60 max-w-xl leading-relaxed">
                        Explosives, equipment, fuel, technology and training &mdash; one accountable partner across the DRC,
                        Zimbabwe, Zambia and South Africa, headquartered in Lubumbashi.
                    </p>

                    <div class="mt-6 sm:mt-8 flex flex-wrap items-center gap-4">
                        <a href="#contact" class="group inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-white bg-nexa-green hover:bg-nexa-navy transition">
                            Request a Quote
                            <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                        </a>
                        <a href="#services" class="inline-flex items-center px-7 py-3.5 text-sm font-semibold text-white border border-white/25 hover:border-white hover:bg-white/5 transition">
                            View Services
                        </a>
                    </div>
                </div>
            </div>

            <!-- Photo (bleeds to the true viewport edge on large screens) -->
            <div class="relative min-h-[200px] sm:min-h-[300px] lg:min-h-0">
                <img
                    src="{{ asset('images/photos/hero-excavator.jpg') }}"
                    alt="Heavy excavator at an open-pit mining operation"
                    class="absolute inset-0 w-full h-full object-cover"
                    loading="eager"
                >
                <div class="absolute inset-0 bg-nexa-navy/25 mix-blend-multiply"></div>
                <div class="absolute inset-0 bg-gradient-to-t from-nexa-navy/55 via-transparent to-transparent"></div>
                <div class="absolute inset-0 bg-gradient-to-r from-nexa-navy/45 lg:from-nexa-navy/55 via-transparent to-transparent"></div>

                <p class="hidden sm:block absolute bottom-4 left-4 sm:bottom-6 sm:left-6 font-mono text-[10px] sm:text-[11px] uppercase tracking-widest text-white/70 bg-nexa-navy-dark/80 px-3 py-1.5 border border-white/10">
                    FIG.01 &mdash; OPEN-PIT LOADING, HAUL CLASS
                </p>
            </div>
        </div>

        <!-- Dispatch board -->
        <div
            class="relative shrink-0 border-t border-white/10 bg-nexa-navy-dark"
            x-data="{
                codes: [
                    { code: 'MIN-01', label: 'Mining &amp; Industrial Supply' },
                    { code: 'OPS-02', label: 'Mining Operations Consulting' },
                    { code: 'EQP-03', label: 'Equipment &amp; Logistics' },
                    { code: 'FUEL-04', label: 'Fuel &amp; Energy' },
                    { code: 'TEC-05', label: 'Technology &amp; General Supply' },
                    { code: 'TRN-06', label: 'Training' },
                ],
                i: 0,
                visible: true,
                timer: null,
                init() {
                    if (window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
                    this.timer = setInterval(() => this.cycle(), 2600);
                },
                async cycle() {
                    this.visible = false;
                    await new Promise(r => setTimeout(r, 250));
                    this.i = (this.i + 1) % this.codes.length;
                    this.visible = true;
                },
            }"
        >
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid grid-cols-2 lg:grid-cols-[auto_auto_1fr]">
                <div class="py-4 sm:py-5 pr-4 sm:pr-6 lg:pr-10">
                    <p class="font-mono text-xl sm:text-2xl font-semibold text-white">04</p>
                    <p class="font-mono text-[11px] uppercase tracking-wide text-white/40 mt-1">Countries Served</p>
                </div>
                <div class="py-4 sm:py-5 px-4 sm:px-6 lg:px-10 border-l border-white/10">
                    <p class="font-mono text-xl sm:text-2xl font-semibold text-white">Lubumbashi</p>
                    <p class="font-mono text-[11px] uppercase tracking-wide text-white/40 mt-1">Headquarters</p>
                </div>
                <div class="col-span-2 lg:col-span-1 min-w-0 pt-4 pb-4 sm:pb-5 lg:py-5 lg:pl-10 border-t border-white/10 lg:border-t-0 lg:border-l">
                    <p class="font-mono text-[11px] uppercase tracking-wide text-white/40 flex items-center gap-2">
                        <span class="relative flex h-1.5 w-1.5 shrink-0">
                            <span class="motion-safe:animate-ping absolute inline-flex h-full w-full bg-nexa-green opacity-75"></span>
                            <span class="relative inline-flex h-1.5 w-1.5 bg-nexa-green"></span>
                        </span>
                        Now Supplying
                    </p>
                    <div class="mt-1.5 h-7 sm:h-8 overflow-hidden">
                        <p
                            x-show="visible"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 -translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            x-transition:leave="transition ease-in duration-200"
                            x-transition:leave-start="opacity-100 translate-y-0"
                            x-transition:leave-end="opacity-0 translate-y-2"
                            class="font-mono text-base sm:text-lg lg:text-2xl font-semibold text-white truncate"
                        ><span class="text-nexa-green" x-text="codes[i].code"></span> <span x-text="codes[i].label"></span></p>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Trust bar -->
    <section class="border-b border-nexa-ink/10 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 py-10">
            <div class="grid grid-cols-2 sm:grid-cols-4 gap-x-8 gap-y-6" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                @foreach ([
                    ['OHADA Compliant', 'Statutory governance under the OHADA Uniform Act'],
                    ['Nexa Holding Group', 'Part of a diversified group across mining, fuel and energy'],
                    ['Nexa Petroleum', 'Dedicated fuel and energy supply division'],
                    ['Sustainability Committed', 'Responsible practices across every operation'],
                ] as [$title, $body])
                    <div>
                        <p class="font-display font-semibold text-nexa-ink text-sm">{{ $title }}</p>
                        <p class="mt-1 text-xs text-nexa-ink/50 leading-relaxed">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services (spec-sheet accordion) -->
    @php
        $services = [
            ['MIN&#8209;01', 'Mining & Industrial Supply', 'Explosives, mining chemicals, crushing equipment, safety gear, plant spares and conveyor mechanical spares for gold, copper, cobalt, PGM, diamond, chrome, lithium and tantalite mines.', 'rock-strata.jpg', 'Rock face at an open-pit mine'],
            ['OPS&#8209;02', 'Mining Operations Consulting', 'Drilling and blasting, ground support, loading and hauling, and mine dewatering services.', 'hero-excavator.jpg', 'Heavy excavator at an open-pit mining operation'],
            ['EQP&#8209;03', 'Equipment & Logistics', 'Rental and sale of mining equipment and machinery, with after-sales service, maintenance and spare parts.', 'crusher-machine.jpg', 'Mobile crusher processing rock at a quarry site'],
            ['FUEL&#8209;04', 'Fuel & Energy', 'Bulk fuel export, transportation, delivery and fuel management through Nexa Petroleum: diesel, petrol, jet fuel and LPG.', 'chemical-drums.jpg', 'Industrial drums used for bulk liquid handling'],
            ['TEC&#8209;05', 'Technology & General Supply', 'IT consumables and hardware, electrical and electronic consumables, and general trade of goods and services.', 'drill-bits.jpg', 'Technical hardware and spare components'],
            ['TRN&#8209;06', 'Training', 'Machinery operation, safe operating procedures, HSE and occupational risk management, PPE, and site induction training.', 'safety-ppe.jpg', 'Safety equipment and PPE used on site'],
        ];
    @endphp
    <section id="services" class="py-24 bg-nexa-navy" x-data="{ active: 0, codes: ['MIN-01', 'OPS-02', 'EQP-03', 'FUEL-04', 'TEC-05', 'TRN-06'] }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Core Services</p>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-white">Everything a mine site needs, from one partner.</h2>
            </div>

            <div class="mt-14 grid lg:grid-cols-2 gap-10 lg:gap-16 items-start" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <div class="border-t border-white/10">
                    @foreach ($services as $i => [$code, $title, $body, $image, $alt])
                        <div class="border-b border-white/10">
                            <button
                                type="button"
                                @click="active = {{ $i }}"
                                @mouseenter.debounce.150ms="active = {{ $i }}"
                                class="w-full flex items-start gap-4 sm:gap-6 py-6 text-left group"
                                :aria-expanded="(active === {{ $i }}).toString()"
                            >
                                <span
                                    class="font-mono text-sm shrink-0 mt-1 transition-colors duration-300"
                                    :class="active === {{ $i }} ? 'text-nexa-green' : 'text-white/30 group-hover:text-white/50'"
                                >{!! $code !!}</span>

                                <span class="flex-1 min-w-0">
                                    <span
                                        class="font-display font-semibold text-lg block transition-colors duration-300"
                                        :class="active === {{ $i }} ? 'text-white' : 'text-white/60 group-hover:text-white/80'"
                                    >{{ $title }}</span>

                                    <span x-show="active === {{ $i }}" x-collapse.duration.400ms>
                                        <span class="block pt-3 pr-2 text-sm text-white/50 leading-relaxed">{{ $body }}</span>
                                    </span>
                                </span>

                                <span
                                    class="font-mono text-lg shrink-0 leading-none transition-colors duration-300"
                                    :class="active === {{ $i }} ? 'text-nexa-green' : 'text-white/20 group-hover:text-white/40'"
                                    x-text="active === {{ $i }} ? '−' : '+'"
                                ></span>
                            </button>
                        </div>
                    @endforeach
                </div>

                <div class="hidden lg:block relative h-[460px] border border-white/10">
                    @foreach ($services as $i => [$code, $title, $body, $image, $alt])
                        <img
                            src="{{ asset('images/photos/'.$image) }}"
                            alt="{{ $alt }}"
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
                    @endforeach
                    <div class="absolute inset-0 bg-gradient-to-t from-nexa-navy/60 via-transparent to-transparent pointer-events-none"></div>

                    <p class="absolute bottom-4 left-4 font-mono text-[11px] uppercase tracking-widest text-white/70 bg-nexa-navy-dark/80 px-3 py-1.5 border border-white/10">
                        CODE <span x-text="codes[active]"></span>
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Why Choose Nexa -->
    <section id="about" class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="grid lg:grid-cols-2 gap-12 items-center" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <div class="max-w-2xl">
                    <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Our Company</p>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">Why mines choose Nexa.</h2>
                    <p class="mt-5 text-nexa-ink/70 leading-relaxed">
                        Nexa Mining Supply and Services is a subsidiary of Nexa Holding, a privately owned corporation
                        operating across mining supplies, fuel, and energy &mdash; committed to sustainability, OHADA
                        compliance, and service delivery defined by precision, reliability and excellence.
                    </p>
                </div>

                <div class="h-[260px] sm:h-[320px] border border-nexa-ink/15">
                    <img
                        src="{{ asset('images/photos/safety-ppe.jpg') }}"
                        alt="Safety equipment and PPE used on site"
                        class="w-full h-full object-cover"
                        loading="lazy"
                    >
                </div>
            </div>

            <div class="mt-12 grid sm:grid-cols-2 lg:grid-cols-3 gap-px bg-nexa-ink/15 border border-nexa-ink/15" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                @foreach ([
                    ['OHADA Compliant', 'Statutory operations governed by the OHADA Uniform Act, supporting sound corporate governance.'],
                    ['Customer Focused', 'Practical solutions designed around client requirements and operational priorities.'],
                    ['Quality & Safety', 'Products tested for performance under harsh mining conditions.'],
                    ['Reliability', 'End-to-end service from supply through to after-sales support.'],
                    ['Regional Reach', 'DRC headquarters with a footprint in Zimbabwe, Zambia, and South Africa.'],
                ] as [$title, $body])
                    <div class="bg-white p-7 group hover:bg-nexa-ink/[0.02] transition-colors duration-300">
                        <span class="flex h-8 w-8 items-center justify-center bg-nexa-green text-white text-sm font-bold transition-transform duration-300 group-hover:scale-110">&check;</span>
                        <h3 class="mt-4 font-display font-semibold text-nexa-ink">{{ $title }}</h3>
                        <p class="mt-2 text-sm text-nexa-ink/55 leading-relaxed">{{ $body }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Testimonials -->
    @if ($testimonials->isNotEmpty())
        <section
            class="py-24 bg-white"
            x-data="{
                active: 0,
                visible: true,
                quotes: @js($testimonials->pluck('quote')),
                names: @js($testimonials->pluck('name')),
                metas: @js($testimonials->map(fn ($t) => trim(($t->title ?? '').($t->title && $t->company ? ', ' : '').($t->company ?? '')))),
                show(i) {
                    if (this.active === i) return;
                    this.visible = false;
                    setTimeout(() => { this.active = i; this.visible = true; }, 200);
                },
            }"
        >
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="max-w-2xl" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">What Clients Say</p>
                    <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">Trusted on site.</h2>
                </div>

                <div class="mt-12 grid lg:grid-cols-2 gap-10 lg:gap-16 items-start" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="border-t border-nexa-ink/15">
                        @foreach ($testimonials as $i => $testimonial)
                            <button
                                type="button"
                                @click="show({{ $i }})"
                                @mouseenter.debounce.150ms="show({{ $i }})"
                                class="w-full flex items-center justify-between gap-4 py-5 border-b border-nexa-ink/15 text-left group"
                                :aria-expanded="(active === {{ $i }}).toString()"
                            >
                                <span>
                                    <span
                                        class="font-display font-semibold block transition-colors duration-300"
                                        :class="active === {{ $i }} ? 'text-nexa-ink' : 'text-nexa-ink/50 group-hover:text-nexa-ink/70'"
                                    >{{ $testimonial->name }}</span>
                                    <span class="font-mono text-[11px] uppercase tracking-wide text-nexa-ink/40 mt-0.5 block">
                                        {{ $testimonial->title }}{{ $testimonial->title && $testimonial->company ? ', ' : '' }}{{ $testimonial->company }}
                                    </span>
                                </span>
                                <span
                                    class="font-mono text-lg shrink-0 leading-none transition-colors duration-300"
                                    :class="active === {{ $i }} ? 'text-nexa-green' : 'text-nexa-ink/20 group-hover:text-nexa-ink/40'"
                                    x-text="active === {{ $i }} ? '−' : '+'"
                                ></span>
                            </button>
                        @endforeach
                    </div>

                    <div class="relative border border-nexa-ink/15 bg-nexa-ink/[0.02] p-8 sm:p-10 min-h-[280px] flex flex-col justify-center">
                        <span class="font-display text-5xl font-black text-nexa-green leading-none">&ldquo;</span>
                        <p
                            x-show="visible"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0 translate-y-2"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            class="mt-4 text-lg text-nexa-ink/70 leading-relaxed"
                            x-text="quotes[active]"
                        ></p>
                        <div
                            x-show="visible"
                            x-transition:enter="transition ease-out duration-300"
                            x-transition:enter-start="opacity-0"
                            x-transition:enter-end="opacity-100"
                            class="mt-6 pt-5 border-t border-nexa-ink/10"
                        >
                            <p class="font-display font-semibold text-nexa-ink text-sm" x-text="names[active]"></p>
                            <p class="font-mono text-[11px] uppercase tracking-wide text-nexa-ink/40 mt-0.5" x-text="metas[active]"></p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Products -->
    @if ($featuredProducts->isNotEmpty())
        <section id="products" class="py-24 bg-nexa-ink/[0.02] border-t border-nexa-ink/10">
            <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-4" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="max-w-2xl">
                        <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Products</p>
                        <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">A catalog built for the field.</h2>
                    </div>
                    <a href="{{ route('products.index') }}" class="group inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-nexa-navy hover:bg-nexa-green transition shrink-0">
                        View All
                        <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>

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

                <div
                    class="mt-12"
                    data-reveal
                    x-data="{
                        shown: false,
                        active: 0,
                        atEnd: false,
                        count: {{ $featuredProducts->count() }},
                        updateScroll() {
                            const el = $refs.rail;
                            const max = el.scrollWidth - el.clientWidth;
                            this.atEnd = max <= 4 || el.scrollLeft >= max - 4;
                            this.active = max > 0 ? Math.round((el.scrollLeft / max) * (this.count - 1)) : 0;
                        },
                        scrollToCard(i) {
                            const el = $refs.rail;
                            const card = el.children[i];
                            if (card) el.scrollTo({ left: card.offsetLeft - el.offsetLeft, behavior: 'smooth' });
                        },
                    }"
                    x-intersect.once="shown = true"
                    :class="{ 'is-revealed': shown }"
                    x-init="$nextTick(() => updateScroll())"
                >
                    <div
                        x-ref="rail"
                        @scroll.passive="updateScroll()"
                        class="product-rail flex gap-5 sm:gap-6 overflow-x-auto snap-x snap-mandatory scroll-smooth pb-2 -mx-4 px-4 sm:-mx-6 sm:px-6 lg:-mx-8 lg:px-8"
                    >
                        @foreach ($featuredProducts as $product)
                            <a
                                href="{{ route('products.show', $product) }}"
                                class="group snap-start shrink-0 w-72 sm:w-80 flex flex-col bg-white border border-nexa-ink/15 hover:border-nexa-green transition-colors duration-300"
                            >
                                <div class="relative h-44 sm:h-48 overflow-hidden border-b border-nexa-ink/15 bg-nexa-ink/5">
                                    @if (isset($categoryImages[$product->category]))
                                        <img
                                            src="{{ asset('images/photos/'.$categoryImages[$product->category]) }}"
                                            alt="{{ $product->category }}"
                                            class="w-full h-full object-cover transition-transform duration-700 group-hover:scale-105"
                                            loading="lazy"
                                        >
                                    @endif
                                    <span class="absolute top-3 left-3 font-mono text-[10px] uppercase tracking-widest text-white bg-nexa-navy/90 px-2.5 py-1">
                                        {{ $product->category }}
                                    </span>
                                </div>

                                <div class="p-5 flex flex-col flex-1">
                                    <h3 class="font-display font-semibold text-lg text-nexa-ink group-hover:text-nexa-green transition-colors duration-300">
                                        {{ $product->name }}
                                    </h3>
                                    <p class="mt-2 text-sm text-nexa-ink/55 leading-relaxed line-clamp-3 flex-1">
                                        {{ $product->summary }}
                                    </p>
                                    <div class="mt-4 pt-4 border-t border-nexa-ink/10 flex items-center justify-between">
                                        <span class="font-mono text-[11px] uppercase tracking-wide text-nexa-ink/40">SKU {{ $product->sku }}</span>
                                        <span class="text-nexa-ink/30 group-hover:text-nexa-green group-hover:translate-x-1 transition text-lg leading-none">&rarr;</span>
                                    </div>
                                </div>
                            </a>
                        @endforeach
                    </div>

                    <div class="mt-5 flex items-center justify-center gap-5">
                        <div class="flex items-center gap-1.5">
                            @foreach ($featuredProducts as $i => $product)
                                <button
                                    type="button"
                                    @click="scrollToCard({{ $i }})"
                                    class="h-1 transition-all duration-300"
                                    :class="active === {{ $i }} ? 'w-6 bg-nexa-green' : 'w-3 bg-nexa-ink/15 hover:bg-nexa-ink/30'"
                                    aria-label="Scroll to product {{ $i + 1 }}"
                                ></button>
                            @endforeach
                        </div>
                        <span
                            class="product-rail-hint font-mono text-[11px] uppercase tracking-widest text-nexa-ink/40 flex items-center gap-1.5 transition-opacity duration-300"
                            x-show="!atEnd"
                            x-transition:leave="transition-opacity duration-300"
                            x-transition:leave-end="opacity-0"
                        >
                            Scroll for more
                            <span class="inline-block">&rarr;</span>
                        </span>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Mid-page CTA -->
    <section class="py-20 bg-nexa-green">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 flex flex-col sm:flex-row items-center justify-between gap-8 text-white text-center sm:text-left" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
            <div>
                <p class="font-mono text-[11px] uppercase tracking-widest text-white/70 flex items-center justify-center sm:justify-start gap-2 mb-3">
                    <span class="relative flex h-1.5 w-1.5 shrink-0">
                        <span class="motion-safe:animate-ping absolute inline-flex h-full w-full bg-white opacity-75"></span>
                        <span class="relative inline-flex h-1.5 w-1.5 bg-white"></span>
                    </span>
                    Sales Team Ready
                </p>
                <h2 class="font-display font-extrabold text-2xl sm:text-3xl leading-tight">Need pricing on something specific?</h2>
                <p class="mt-2 text-white/80 max-w-md">Tell us what you're sourcing and our sales team will get you a quote fast.</p>
            </div>
            <a href="#contact" class="group inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-nexa-green bg-white hover:bg-nexa-navy hover:text-white transition shrink-0">
                Request a Quote
                <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
            </a>
        </div>
    </section>

    <!-- Regions -->
    <section id="regions" class="py-24" x-data="{ active: 'cd', revealed: false }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 grid lg:grid-cols-2 gap-16 items-center">
            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Regional Reach</p>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">One partner, four countries.</h2>
                <p class="mt-5 text-nexa-ink/70 leading-relaxed max-w-md">
                    Headquartered in Lubumbashi with an operational footprint across Central and Southern
                    Africa &mdash; so multi-site operations get consistent supply, pricing and support
                    without renegotiating in every country.
                </p>

                <table class="mt-8 w-full text-sm border-t border-nexa-ink/15">
                    @foreach ([
                        ['DRC', 'Lubumbashi', 'Headquarters', 'cd'],
                        ['Zambia', '—', 'Operational footprint', 'zm'],
                        ['Zimbabwe', '—', 'Operational footprint', 'zw'],
                        ['South Africa', '—', 'Operational footprint', 'za'],
                    ] as [$country, $city, $status, $code])
                        <tr
                            class="border-b border-nexa-ink/10 cursor-pointer hover:bg-nexa-green/5 transition"
                            @click="active = '{{ $code }}'"
                            @mouseenter.debounce.150ms="active = '{{ $code }}'"
                            :class="{ 'bg-nexa-green/5': active === '{{ $code }}' }"
                        >
                            <td class="py-3 font-semibold text-nexa-ink">{{ $country }}</td>
                            <td class="py-3 font-mono text-xs text-nexa-ink/50">{{ $city }}</td>
                            <td class="py-3 text-nexa-ink/60 text-right">{{ $status }}</td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div class="overflow-hidden" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true; revealed = true" :class="{ 'is-revealed': shown }">
                <div class="relative w-full max-w-[560px] mx-auto">
                    @include('partials.africa-map')
                </div>
                <p class="font-mono text-[11px] uppercase tracking-widest text-nexa-ink/30 text-center pt-2">
                    Hover or click a country to highlight it
                </p>
            </div>
        </div>
    </section>

    <!-- FAQ -->
    <section id="faq" class="py-24 bg-nexa-ink/[0.02] border-t border-nexa-ink/10" x-data="{ open: 0 }">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">FAQ</p>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">Common questions.</h2>
            </div>

            <div class="mt-10 border-t border-nexa-ink/15" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                @foreach ([
                    ['What countries do you deliver to?', 'We are headquartered in Lubumbashi, DRC, with an operational footprint across Zambia, Zimbabwe and South Africa &mdash; supporting multi-site operations with consistent supply and pricing across all four.'],
                    ['Are you OHADA compliant?', 'Yes. Our statutory operations are governed by the OHADA Uniform Act, which underpins sound corporate governance across our activities in the region.'],
                    ['What can I order from Nexa?', 'Mining and industrial consumables (including explosives, mining chemicals and safety gear), equipment and machinery, bulk fuel (diesel, petrol, jet fuel and LPG), technology and general supply, and training services. See our full product catalog for specifics.'],
                    ['How do I request a quote?', 'Fill in the quote request form below with what you need, or reach our sales team directly by email or WhatsApp. We\'ll follow up with pricing and availability.'],
                    ['Do you support operations spanning multiple countries?', 'Yes &mdash; that\'s a core part of what we do. Our regional footprint means multi-site operations can work with one partner instead of renegotiating supply in every country.'],
                ] as $i => [$question, $answer])
                    <div class="border-b border-nexa-ink/15">
                        <button
                            type="button"
                            @click="open = open === {{ $i }} ? null : {{ $i }}"
                            @mouseenter.debounce.150ms="open = {{ $i }}"
                            class="w-full flex items-center justify-between gap-4 py-5 text-left"
                            :aria-expanded="(open === {{ $i }}).toString()"
                        >
                            <span class="font-display font-semibold text-nexa-ink">{{ $question }}</span>
                            <span class="shrink-0 text-nexa-green text-xl font-mono" x-text="open === {{ $i }} ? '−' : '+'"></span>
                        </button>
                        <div x-show="open === {{ $i }}" x-collapse.duration.400ms x-cloak>
                            <div class="pb-5 text-sm text-nexa-ink/60 leading-relaxed max-w-2xl">
                                {!! $answer !!}
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Contact / Quote Request -->
    <section id="contact" class="py-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-nexa-ink/15 grid lg:grid-cols-5" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">

                <div class="lg:col-span-2 bg-nexa-navy p-8 sm:p-10 text-white">
                    <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Get in touch</p>
                    <h2 class="font-display font-bold text-2xl sm:text-3xl">Ready to work with Nexa?</h2>
                    <p class="mt-4 text-white/55 leading-relaxed">
                        Tell us what you need and our sales team will get back to you &mdash; or reach us directly.
                    </p>

                    <dl class="mt-10 space-y-6 text-sm border-t border-white/10 pt-8">
                        <div>
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35">Email</dt>
                            <dd class="mt-1"><a href="mailto:sales@nexaminingservices.com" class="font-semibold hover:text-nexa-green transition">sales@nexaminingservices.com</a></dd>
                        </div>
                        <div>
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35">WhatsApp</dt>
                            <dd class="mt-1"><a href="https://wa.me/27837915713" target="_blank" rel="noopener noreferrer" class="font-semibold hover:text-nexa-green transition">+27 83 791 5713</a></dd>
                        </div>
                        <div>
                            <dt class="font-mono text-[11px] uppercase tracking-widest text-white/35">Head Office</dt>
                            <dd class="mt-1 font-semibold">No. 32 Avenue Mwange, Golf Plateau, Commune Annexe, Lubumbashi, DRC</dd>
                        </div>
                    </dl>
                </div>

                <div class="lg:col-span-3 p-8 sm:p-10">
                    @if (session('status') === 'quote-request-sent')
                        <div class="mb-6 border border-nexa-green/30 bg-nexa-green/5 px-5 py-4 text-sm font-medium text-nexa-green-dark">
                            Thanks &mdash; your request has been received. Our sales team will be in touch shortly.
                        </div>
                    @endif

                    <form method="POST" action="{{ route('quote-requests.store') }}" class="grid sm:grid-cols-2 gap-5">
                        @csrf

                        <div class="sm:col-span-1">
                            <label for="name" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Full name</label>
                            <input id="name" name="name" type="text" value="{{ old('name') }}" required
                                class="w-full rounded-none border-nexa-ink/25 focus:border-nexa-green focus:ring-nexa-green">
                            @error('name') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="company" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Company</label>
                            <input id="company" name="company" type="text" value="{{ old('company') }}"
                                class="w-full rounded-none border-nexa-ink/25 focus:border-nexa-green focus:ring-nexa-green">
                            @error('company') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="email" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Email</label>
                            <input id="email" name="email" type="email" value="{{ old('email') }}" required
                                class="w-full rounded-none border-nexa-ink/25 focus:border-nexa-green focus:ring-nexa-green">
                            @error('email') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-1">
                            <label for="phone" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Phone</label>
                            <input id="phone" name="phone" type="text" value="{{ old('phone') }}"
                                class="w-full rounded-none border-nexa-ink/25 focus:border-nexa-green focus:ring-nexa-green">
                            @error('phone') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <label for="service_interest" class="block font-mono text-[11px] uppercase tracking-widest text-nexa-ink/50 mb-2">Service of interest</label>
                            <select id="service_interest" name="service_interest"
                                class="w-full rounded-none border-nexa-ink/25 focus:border-nexa-green focus:ring-nexa-green">
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
                            <textarea id="message" name="message" rows="4" required
                                class="w-full rounded-none border-nexa-ink/25 focus:border-nexa-green focus:ring-nexa-green">{{ old('message') }}</textarea>
                            @error('message') <p class="mt-1.5 text-xs text-nexa-red">{{ $message }}</p> @enderror
                        </div>

                        <div class="sm:col-span-2">
                            <button type="submit" class="inline-flex items-center gap-2 px-7 py-3.5 text-sm font-semibold text-white bg-nexa-green hover:bg-nexa-navy hover:text-white transition">
                                Send Request
                            </button>
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
            class="py-24 bg-white border-t border-nexa-ink/10"
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
                        <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Insights</p>
                        <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">From the field.</h2>
                    </div>
                    <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-1.5 text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition shrink-0">
                        View all insights
                        <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                    </a>
                </div>

                <div class="mt-12 grid lg:grid-cols-2 gap-10 lg:gap-16 items-start" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="border-t border-nexa-ink/15">
                        @foreach ($latestPosts as $i => $post)
                            <a
                                href="{{ route('posts.show', $post) }}"
                                @mouseenter.debounce.150ms="show({{ $i }})"
                                @focus="show({{ $i }})"
                                class="flex items-start gap-4 sm:gap-6 py-6 border-b border-nexa-ink/15 group"
                            >
                                <span
                                    class="font-mono text-xs shrink-0 mt-1.5 w-20 transition-colors duration-300"
                                    :class="active === {{ $i }} ? 'text-nexa-green' : 'text-nexa-ink/35 group-hover:text-nexa-ink/50'"
                                >{{ $post->published_at->format('d.m.Y') }}</span>

                                <span class="flex-1 min-w-0">
                                    @if ($post->category)
                                        <span
                                            class="font-mono text-[11px] uppercase tracking-wide block mb-1 transition-colors duration-300"
                                            :class="active === {{ $i }} ? 'text-nexa-green' : 'text-nexa-ink/40'"
                                        >{{ $post->category }}</span>
                                    @endif
                                    <span
                                        class="font-display font-semibold block transition-colors duration-300"
                                        :class="active === {{ $i }} ? 'text-nexa-ink' : 'text-nexa-ink/60 group-hover:text-nexa-ink/80'"
                                    >{{ $post->title }}</span>
                                </span>
                            </a>
                        @endforeach
                    </div>

                    <div class="hidden lg:block relative h-[460px] border border-nexa-ink/15">
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
