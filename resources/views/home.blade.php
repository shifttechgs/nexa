<x-marketing-layout
    :title="'Home'"
    :description="'Nexa Mining and Engineering Services supplies explosives, mining chemicals, equipment, fuel and training to mines in the DRC, Zambia, Zimbabwe and South Africa.'"
>
    <!-- Hero -->
    <section data-no-reveal class="relative flex flex-col overflow-hidden bg-nexa-navy min-h-screen min-h-[100svh] min-h-[100dvh]">
        <!-- Background photo (responsive sources, slow ken-burns; the wrapper carries the scroll parallax) -->
        <div data-hero-parallax class="absolute inset-0 will-change-transform">
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
        </div>
        <!-- Grade: vertical (nav legibility up top, seamless hand-off to the next section at the base) -->
        <div class="hero-grade-y absolute inset-0"></div>
        <!-- Grade: edges (anchors the headline on the left and the CTA on the right; the machine breathes through the middle) -->
        <div class="hero-grade-x absolute inset-0"></div>
        <!-- Film grain -->
        <div class="hero-grain absolute inset-0 opacity-[0.07] mix-blend-overlay"></div>

        <!-- Content -->
        <div class="relative z-10 flex-1 flex items-end">
            <div class="relative w-full site-container pt-28 pb-8 sm:pb-10">

                <!-- Headline: full measure, fluid size so each line holds on one row from tablet up -->
                <h1 class="font-display font-medium text-[clamp(2.5rem,5vw,5.5rem)] leading-[1.04] tracking-tightest text-white text-balance">
                    <span class="block rise-in" style="--i: 0">Keep every shift productive</span>
                    <span class="block rise-in" style="--i: 1">with supplies that arrive on time.</span>
                </h1>

                <!-- Supporting row on a 12-col grid: copy + action share the headline's left edge | service card closes the right edge -->
                <div class="mt-8 sm:mt-10 grid grid-cols-1 lg:grid-cols-12 gap-8 lg:items-end">
                    <div class="lg:col-span-7">
                        <p class="max-w-2xl text-base sm:text-lg text-white/70 leading-relaxed rise-in" style="--i: 2">
                            Supplied from Lubumbashi to sites in the DRC, Zambia, Zimbabwe and South Africa, along with equipment, technology and training.
                        </p>
                        <div class="mt-7 flex flex-wrap items-center gap-x-6 gap-y-4 rise-in" style="--i: 3">
                            <x-btn :href="route('contact')" variant="primary-on-dark">Request a Quote</x-btn>
                            <a href="#services" class="group inline-flex items-center gap-2 text-sm font-semibold text-white/80 hover:text-white transition-colors">
                                <span class="border-b border-white/30 group-hover:border-white pb-0.5 transition-colors">Our services</span>
                            </a>
                        </div>
                    </div>

                    <!-- Explore Services card -->
                    <a
                        href="#services"
                        class="hidden lg:flex lg:col-span-4 lg:col-start-9 lg:justify-self-end w-full max-w-xs items-stretch gap-3 bg-white/10 backdrop-blur-sm ring-1 ring-white/15 p-3 rise-in hover:bg-white/15 transition-colors group"
                        style="--i: 4"
                    >
                        <img
                            src="{{ asset('images/photos/crusher-machine.jpg') }}"
                            alt=""
                            class="h-full w-20 object-cover shrink-0"
                            loading="lazy"
                        >
                        <div class="flex flex-col justify-center py-1">
                            <p class="font-display font-semibold text-white leading-snug">Supply, fuel, logistics and training.</p>
                            <span class="mt-2 inline-flex items-center gap-1.5 text-sm font-semibold text-nexa-green">
                                Explore Services
                                <span class="inline-block transition-transform duration-300 group-hover:translate-x-1">&rarr;</span>
                            </span>
                        </div>
                    </a>
                </div>

                <!-- Divider -->
                <div class="hero-rule mt-10 sm:mt-12 rise-in" style="--i: 5" aria-hidden="true"></div>

                <!-- Trust row: compliance checks + scroll cue -->
                <div class="mt-5 flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 rise-in" style="--i: 6">
                    <div class="flex flex-wrap items-center gap-x-6 gap-y-2">
                        @foreach (['OHADA Compliant', 'Lubumbashi Head Office', 'Part of Nexa Holding Group'] as $point)
                            <span class="inline-flex items-center gap-2 text-sm text-white/70">
                                <svg viewBox="0 0 20 20" class="h-4 w-4 text-nexa-green shrink-0" fill="none" stroke="currentColor" stroke-width="2" aria-hidden="true">
                                    <circle cx="10" cy="10" r="8"/>
                                    <path stroke-linecap="round" stroke-linejoin="round" d="m6.5 10 2.3 2.3L14 7.8"/>
                                </svg>
                                {{ $point }}
                            </span>
                        @endforeach
                    </div>

                    <!-- Scroll cue -->
                    <a href="#commitment" class="group hidden sm:inline-flex items-center gap-3 shrink-0 font-mono text-[11px] uppercase tracking-widest text-white/55 hover:text-white transition-colors">
                        Scroll
                        <span class="scroll-cue-line relative block h-10 w-px overflow-hidden bg-white/20" aria-hidden="true"></span>
                    </a>
                </div>
            </div>
        </div>
    </section>

    <!-- Commitment -->
    <section id="commitment" class="bg-nexa-paper">
        <div class="site-container py-24 sm:py-32">
            <p
                data-word-reveal
                class="max-w-4xl font-display font-medium text-2xl sm:text-4xl lg:text-[2.9rem] leading-[1.25] tracking-tight text-nexa-ink"
            >We give you a delivery date and we keep it. Every order is tracked through each border crossing, and our team stays reachable after it reaches site.</p>

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
    <section class="bg-nexa-bone">
        <div class="site-container py-24 sm:py-28">
            <!-- Header: title on the shared left edge, context copy closes the right -->
            <div class="grid lg:grid-cols-12 gap-6 lg:gap-8 lg:items-end" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <div class="lg:col-span-7">
                    <x-section-label text="Clients" />
                    <h2 class="section-title mt-6 text-nexa-ink">Who we supply.</h2>
                </div>
                <p class="lg:col-span-4 lg:col-start-9 max-w-md text-nexa-ink/60 leading-relaxed">
                    Some of the mines and plants we supply in the DRC, Zambia, Zimbabwe and South Africa.
                </p>
            </div>

            <!-- Client grid: flat white cards on the grey band, name + country per card -->
            <div
                class="mt-14 sm:mt-16 grid grid-cols-2 md:grid-cols-5 gap-3 sm:gap-4"
                data-reveal data-reveal-stagger x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
            >
                @foreach ([
                    ['Katanga Copper', 'DRC'], ['Zambezi Resources', 'Zambia'], ['Kolwezi Mining', 'DRC'], ['Copperbelt Energy', 'Zambia'], ['Great Dyke PGM', 'Zimbabwe'],
                    ['Kasai Diamond Works', 'DRC'], ['Southern Reef', 'South Africa'], ['Tantalum Ridge', 'Zimbabwe'], ['Chibuluma', 'Zambia'], ['Haut-Katanga Extractives', 'DRC'],
                ] as $i => [$client, $country])
                    <div class="group flex flex-col justify-end min-h-[128px] sm:min-h-[148px] p-4 sm:p-5 bg-nexa-paper" style="--i: {{ $i % 5 }}">
                        <p class="font-display font-medium text-base lg:text-lg leading-tight tracking-tight text-nexa-ink/70 group-hover:text-nexa-ink transition-colors duration-300">{{ $client }}</p>
                        <p class="mt-1.5 text-[13px] text-nexa-ink/45">{{ $country }}</p>
                    </div>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Services -->
    @php
        $services = \App\Models\Service::all();
    @endphp
    <section id="services" class="pt-24 pb-24 lg:pb-0">
        <div class="site-container">
            <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-8 pb-12 border-b border-nexa-line" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <div>
                    <x-section-label text="Services" />
                    <h2 class="section-title mt-6 text-nexa-ink">What we do.</h2>
                </div>
                <a href="{{ route('services.index') }}" class="group inline-flex items-center gap-3 self-start sm:self-auto bg-nexa-ink text-white text-sm font-semibold pl-5 pr-1.5 py-1.5 shrink-0">
                    All services
                    <span class="svc-arrow h-8 w-8 bg-nexa-green" aria-hidden="true"></span>
                </a>
            </div>

            {{-- Desktop: each row sticks a step lower than the one before, so the next row slides
                 over it and the earlier rows stay stacked as a strip of titles. --}}
            <div class="svc-stack" style="--svc-count: {{ $services->count() }}">
                @foreach ($services as $i => $service)
                    <a
                        href="{{ route('services.index') }}#{{ $service->slug }}"
                        class="svc-row group grid grid-cols-1 lg:grid-cols-[2rem_minmax(0,1fr)_minmax(0,1fr)_minmax(0,1fr)_2.5rem] gap-6 lg:gap-8 py-10 border-t border-nexa-line first:border-t-0 bg-nexa-paper"
                        style="--i: {{ $i }}"
                    >
                        <span class="font-label text-xs text-nexa-ink/45 lg:pt-2.5">{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</span>
                        <div class="svc-media aspect-[16/10] overflow-hidden bg-nexa-navy">
                            <img src="{{ $service->imageUrl() }}" alt="{{ $service->alt }}" class="h-full w-full object-cover transition-transform duration-700 ease-out group-hover:scale-105 group-active:scale-105" loading="lazy">
                        </div>
                        <h3 class="font-display font-semibold text-2xl xl:text-[1.75rem] leading-tight tracking-[-0.02em] text-nexa-ink">{{ $service->title }}</h3>
                        <div>
                            <p class="text-sm font-medium text-nexa-ink">Includes</p>
                            <ul class="mt-6 space-y-2.5">
                                @foreach (array_slice($service->includes, 0, 4) as $item)
                                    <li class="flex items-start gap-2.5 text-base lg:text-lg font-medium text-nexa-ink/85 leading-snug">
                                        <svg class="mt-1.5 h-3 w-3 shrink-0 text-nexa-green" viewBox="0 0 12 12" fill="none" aria-hidden="true"><path d="M2 6.5 4.75 9 10 3" stroke="currentColor" stroke-width="1.6"/></svg>
                                        {{ $item }}
                                    </li>
                                @endforeach
                            </ul>
                        </div>
                        <span class="svc-arrow h-10 w-10 bg-nexa-green justify-self-start lg:justify-self-end" aria-hidden="true"></span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <!-- Client Reviews -->
    @if ($testimonials->isNotEmpty())
        <section class="py-24 bg-nexa-paper">
            <div class="site-container">
                <div class="flex flex-col items-center text-center" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <x-section-label text="Reviews" />
                    <h2 class="section-title mt-6 text-nexa-ink">What clients say.</h2>
                </div>

                {{-- Client strip | quote card | photo over facts | contact card --}}
                {{-- Reviews rotate every 6s while the section is on screen; hovering or focusing
                     inside it pauses, and picking a client restarts the clock. --}}
                <div
                    class="mt-14 grid gap-5 xl:grid-cols-[minmax(0,1.15fr)_minmax(0,1.85fr)] 2xl:grid-cols-[minmax(0,1fr)_minmax(0,2fr)]"
                    x-data="{
                        active: 0,
                        count: {{ $testimonials->count() }},
                        timer: null,
                        visible: false,
                        paused: false,
                        start() {
                            this.stop();
                            if (this.count < 2 || window.matchMedia('(prefers-reduced-motion: reduce)').matches) return;
                            this.timer = setInterval(() => {
                                if (this.visible && !this.paused && !document.hidden) this.active = (this.active + 1) % this.count;
                            }, 6000);
                        },
                        stop() { clearInterval(this.timer); },
                        pick(i) { this.active = i; this.start(); },
                    }"
                    x-init="start()"
                    x-intersect:enter="visible = true"
                    x-intersect:leave="visible = false"
                    @mouseenter="paused = true"
                    @mouseleave="paused = false"
                    @focusin="paused = true"
                    @focusout="paused = false"
                >
                    <div class="flex flex-col sm:flex-row gap-5 2xl:gap-[1.875rem]">
                        {{-- Client picker: initials stand in for photos until real client portraits exist --}}
                        <div class="flex sm:flex-col sm:justify-evenly gap-3 bg-nexa-navy p-4 sm:py-8 sm:w-[5.5rem] 2xl:w-[6.875rem] shrink-0 sm:items-center" role="tablist" aria-label="Client reviews">
                            @foreach ($testimonials as $i => $testimonial)
                                <button
                                    type="button"
                                    role="tab"
                                    @click="pick({{ $i }})"
                                    :aria-selected="(active === {{ $i }}).toString()"
                                    class="h-14 w-14 2xl:h-16 2xl:w-16 shrink-0 grid place-items-center font-label text-sm text-white ring-2 ring-offset-2 ring-offset-nexa-navy transition"
                                    :class="active === {{ $i }} ? 'bg-nexa-green ring-nexa-green' : 'bg-white/10 ring-transparent hover:bg-white/20'"
                                    aria-label="Review {{ $i + 1 }}: {{ $testimonial->topic }}"
                                >{{ str_pad($i + 1, 2, '0', STR_PAD_LEFT) }}</button>
                            @endforeach
                        </div>

                        {{-- Quote card: every review shares one grid cell so the height holds when switching --}}
                        <div class="grid flex-1 bg-nexa-bone min-h-[22rem] xl:min-h-[30.875rem]">
                            @foreach ($testimonials as $i => $testimonial)
                                <figure
                                    class="review-slide [grid-area:1/1] flex flex-col justify-between p-7 xl:p-10"
                                    :class="{ 'is-active': active === {{ $i }} }"
                                    role="tabpanel"
                                >
                                    <div>
                                        <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-green">{{ $testimonial->company ?? 'Client review' }}</p>
                                        <blockquote class="mt-6 text-base xl:text-lg leading-relaxed text-nexa-ink/85">&ldquo;{{ $testimonial->quote }}&rdquo;</blockquote>
                                    </div>
                                    <figcaption class="mt-10">
                                        {{-- The theme leads until a reviewer's name is supplied --}}
                                        <p class="font-display font-medium text-2xl leading-tight tracking-[-0.02em] text-nexa-ink">{{ $testimonial->name ?? $testimonial->topic }}</p>
                                        @if ($testimonial->name || $testimonial->title)
                                            <p class="mt-1 text-sm text-nexa-ink/55">{{ $testimonial->name ? collect([$testimonial->title, $testimonial->topic])->filter()->first() : $testimonial->title }}</p>
                                        @endif
                                    </figcaption>
                                </figure>
                            @endforeach
                        </div>
                    </div>

                    <div class="grid gap-5 md:grid-cols-2">
                        <div class="flex flex-col gap-5">
                            <div class="relative flex-[3] min-h-[14rem] overflow-hidden bg-nexa-navy">
                                <img src="{{ asset('images/photos/conveyor-aerial.jpg') }}" alt="Conveyor line seen from above at a processing plant" class="absolute inset-0 h-full w-full object-cover" loading="lazy">
                                <div class="absolute inset-0 bg-nexa-navy-dark/45"></div>
                                <div class="relative h-full grid place-items-center p-6 text-center">
                                    <div>
                                        <p class="font-label text-xs uppercase tracking-[0.05em] text-white/75">DRC &middot; Zambia &middot; Zimbabwe &middot; South Africa</p>
                                        <p class="mt-3 font-display font-medium text-3xl lg:text-4xl xl:text-[2.75rem] leading-tight tracking-[-0.02em] text-white">Nexa Mining &amp; Engineering</p>
                                    </div>
                                </div>
                            </div>
                            <div class="flex-[2] grid grid-cols-2 gap-6 bg-nexa-green p-6 sm:p-8 text-white">
                                <div>
                                    <p class="font-display font-medium text-5xl lg:text-6xl leading-none tracking-[-0.02em] tabular-nums" x-data="countUp(4)" x-intersect.once="run()">4</p>
                                    <p class="mt-4 text-lg lg:text-xl font-medium">Countries supplied</p>
                                </div>
                                <div>
                                    <p class="font-display font-medium text-5xl lg:text-6xl leading-none tracking-[-0.02em] tabular-nums" x-data="countUp(2)" x-intersect.once="run()">2</p>
                                    <p class="mt-4 text-lg lg:text-xl font-medium">Offices in the region</p>
                                </div>
                            </div>
                        </div>

                        <div class="flex flex-col justify-between gap-10 bg-nexa-navy p-6 sm:p-8 text-white min-h-[22rem]">
                            <svg class="h-10 w-10 text-nexa-green" viewBox="0 0 40 40" fill="none" stroke="currentColor" stroke-width="1.8" aria-hidden="true">
                                <path d="M7 10h26v16H17l-7 6v-6H7z" stroke-linejoin="round"/>
                                <path d="M13 16h14M13 21h9" stroke-linecap="round"/>
                            </svg>
                            <div>
                                <h3 class="font-display font-medium text-2xl xl:text-[1.75rem] leading-tight tracking-[-0.02em]">Not sure what your site needs?</h3>
                                <p class="mt-4 max-w-sm text-white/70 leading-relaxed">Tell us the mine, the commodity and when you need it on site. We&rsquo;ll come back with a supply list and a quote.</p>
                            </div>
                            <a href="{{ route('contact') }}" class="group self-start inline-flex items-center gap-3 bg-white text-nexa-ink text-sm font-semibold pl-5 pr-1.5 py-1.5">
                                Talk to our team
                                <span class="svc-arrow h-8 w-8 bg-nexa-green" aria-hidden="true"></span>
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Products -->
    @if ($featuredProducts->isNotEmpty())
        @php
            $catalogue = \App\Models\Product::all();
            $catalogueCategories = $catalogue->countBy('category');
        @endphp
        <section id="products" class="py-24 bg-nexa-bone">
            <div class="site-container">
                <div class="grid lg:grid-cols-12 gap-6 lg:gap-8 lg:items-end" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="lg:col-span-7">
                        <x-section-label text="Products" />
                        <h2 class="section-title mt-6 text-nexa-ink">Products we stock.</h2>
                        <p class="mt-5 max-w-lg text-nexa-ink/60 leading-relaxed">
                            {{ $catalogue->count() }} products across {{ $catalogueCategories->count() }} categories. Add what you need to a quote and send it in one go.
                        </p>
                    </div>
                    <div class="lg:col-span-5 lg:justify-self-end">
                        <x-btn :href="route('products.index')" variant="navy">View all products</x-btn>
                    </div>
                </div>

                <!-- Featured products -->
                <div
                    class="mt-12 grid gap-4 lg:gap-6 sm:grid-cols-2 lg:grid-cols-4"
                    data-reveal data-reveal-stagger x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
                >
                    @foreach ($featuredProducts as $i => $product)
                        <x-product-card :product="$product" style="--i: {{ $i }}" />
                    @endforeach
                </div>

                <!-- Browse by category -->
                <div class="mt-14 border-t border-nexa-line pt-8 flex flex-col lg:flex-row lg:items-center gap-5 lg:gap-10">
                    <p class="shrink-0 text-sm font-medium text-nexa-ink/55">Browse by category</p>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($catalogueCategories as $category => $count)
                            <a
                                href="{{ route('products.index', ['category' => $category]) }}"
                                class="border border-nexa-ink/15 px-4 py-2 text-sm text-nexa-ink/75 hover:border-nexa-ink hover:text-nexa-ink transition"
                            >{{ $category }} <span class="ml-1 opacity-50">{{ $count }}</span></a>
                        @endforeach
                    </div>
                </div>
            </div>
        </section>
    @endif

    <!-- Mid-page CTA -->
    <x-sales-cta />

    <!-- Regions -->
    <section id="regions" class="py-24" x-data="{ active: 'cd', revealed: false }">
        <div class="site-container grid lg:grid-cols-2 gap-16 items-center">
            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                <x-section-label text="Regions" />
                <h2 class="section-title mt-6 text-nexa-ink">Where we work.</h2>
                <p class="mt-5 text-nexa-ink/65 leading-relaxed max-w-md">
                    Our head office is in Lubumbashi and we have an office in Johannesburg. Sites in all
                    four countries are supplied on the same terms, so a multi-site operation doesn't have
                    to negotiate separately in each one.
                </p>

                <table class="mt-10 w-full border-t border-nexa-ink/15">
                    @foreach ($regions as $region)
                        <tr
                            class="group border-b border-nexa-ink/10 cursor-pointer hover:bg-nexa-green/5 transition-colors duration-300"
                            @click="window.location = @js(route('regions.show', $region->slug))"
                            @mouseenter.debounce.150ms="active = '{{ $region->code }}'"
                            :class="{ 'bg-nexa-green/5': active === '{{ $region->code }}' }"
                        >
                            <td class="py-5 font-display font-semibold text-base sm:text-lg text-nexa-ink">
                                <a href="{{ route('regions.show', $region->slug) }}" class="group-hover:text-nexa-green transition-colors">{{ $region->name }}</a>
                            </td>
                            <td class="py-5 font-mono text-xs uppercase tracking-wide text-nexa-ink/45">{{ $region->city }}</td>
                            <td class="py-5 text-sm text-nexa-ink/55 text-right">{{ $region->presence }} <span class="ml-2 inline-block text-nexa-ink/35 transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">&rarr;</span></td>
                        </tr>
                    @endforeach
                </table>
            </div>

            <div data-reveal x-data="{ shown: false }" x-intersect.once="shown = true; revealed = true" :class="{ 'is-revealed': shown }">
                <div class="bg-nexa-bone p-8 sm:p-10">
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
    <section id="faq" class="py-24 bg-nexa-bone" x-data="{ open: 0 }">
        <div class="site-container">
            <div class="grid lg:grid-cols-12 gap-10 lg:gap-16">
                <div class="lg:col-span-4" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <x-section-label text="FAQ" />
                    <h2 class="section-title mt-6 text-nexa-ink">Common questions.</h2>
                    <p class="mt-5 text-nexa-ink/60 leading-relaxed max-w-sm">
                        Can&rsquo;t find what you&rsquo;re looking for?
                        <a href="{{ route('contact') }}" class="text-nexa-ink underline decoration-nexa-ink/30 underline-offset-4 hover:text-nexa-green hover:decoration-nexa-green transition-colors">Get in touch</a>
                        and our sales team will help directly.
                    </p>
                </div>

                <div class="lg:col-span-8 border-t border-nexa-line" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    @foreach ([
                        ['What countries do you deliver to?', 'Our head office is in Lubumbashi, DRC. We also deliver to sites in Zambia, Zimbabwe and South Africa, with the same supply and pricing in all four.'],
                        ['Are you OHADA compliant?', 'Yes. Our statutory operations are governed by the OHADA Uniform Act, which underpins sound corporate governance across our activities in the region.'],
                        ['What can I order from Nexa?', 'Mining and industrial consumables (including explosives, mining chemicals and safety gear), equipment and machinery, bulk fuel (diesel, petrol, jet fuel and LPG), technology and general supply, and training services. See our full product catalog for specifics.'],
                        ['How do I request a quote?', 'Fill in the quote request form below with what you need, or reach our sales team directly by email or WhatsApp. We\'ll follow up with pricing and availability.'],
                        ['Do you support operations spanning multiple countries?', 'Yes. Many of our clients run sites in more than one country, and they deal with a single Nexa account rather than a separate supplier in each.'],
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

    <!-- Articles -->
    @if ($latestPosts->isNotEmpty())
        <section class="py-24 bg-nexa-bone">
            <div class="site-container">
                <div class="grid lg:grid-cols-12 gap-6 lg:gap-8 lg:items-end" data-reveal x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }">
                    <div class="lg:col-span-7">
                        <x-section-label text="Articles" />
                        <h2 class="section-title mt-6 text-nexa-ink">Latest articles.</h2>
                        <p class="mt-5 max-w-lg text-nexa-ink/60 leading-relaxed">
                            Notes from our team on compliance, fuel logistics and site safety.
                        </p>
                    </div>
                    <div class="lg:col-span-5 lg:justify-self-end">
                        <a href="{{ route('posts.index') }}" class="group inline-flex items-center gap-1.5 text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition">
                            View all articles
                            <span class="inline-block transition-transform duration-300 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                        </a>
                    </div>
                </div>

                <div
                    class="mt-12 grid gap-4 lg:gap-6 md:grid-cols-2 lg:grid-cols-3"
                    data-reveal data-reveal-stagger x-data="{ shown: false }" x-intersect.once="shown = true" :class="{ 'is-revealed': shown }"
                >
                    @foreach ($latestPosts as $i => $post)
                        <x-post-card :post="$post" style="--i: {{ $i }}" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-marketing-layout>
