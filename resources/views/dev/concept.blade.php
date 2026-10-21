{{--
    Design concept: the home page rebuilt around the supply route instead of borrowed
    template sections. Dev-only (see routes/web.php); every fact on it comes from the
    existing models, nothing is invented for the mock-up.
--}}
<x-marketing-layout
    :title="'Concept'"
    :description="'Design concept for the Nexa home page.'"
>
    <!-- Hero: the delivery promise, the route, and how an order moves -->
    <section data-no-reveal class="relative flex flex-col overflow-hidden bg-nexa-navy-dark text-white min-h-screen min-h-[100svh]">
        <x-contours class="concept-contours absolute inset-0 h-full w-full text-white/[0.07]" />

        <div class="relative z-10 flex-1 site-container grid lg:grid-cols-12 gap-10 lg:gap-6 items-center pt-28 pb-8">
            <div class="lg:col-span-7">
                <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-copper rise-in" style="--i: 0">Lubumbashi &rarr; site &middot; DRC &middot; Zambia &middot; Zimbabwe &middot; South Africa</p>
                <h1 class="mt-7 font-display font-medium text-[clamp(2.75rem,5vw,5.25rem)] leading-[1.02] tracking-tightest text-balance">
                    <span class="block rise-in" style="--i: 1">We give you a delivery&nbsp;date.</span>
                    <span class="block text-white/40 rise-in" style="--i: 2">Then we keep it.</span>
                </h1>
                <p class="mt-8 max-w-xl text-lg text-white/70 leading-relaxed rise-in" style="--i: 3">
                    Explosives, mining chemicals, plant spares, fuel and training, supplied from Lubumbashi to mine sites in four countries and tracked through each border crossing.
                </p>
                <div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-5 rise-in" style="--i: 4">
                    <a href="{{ route('contact') }}" class="btn-stamp btn-stamp--light">Request a quote</a>
                    <a href="#route" class="font-label text-xs uppercase tracking-[0.05em] text-white/70 hover:text-white border-b border-white/25 hover:border-white pb-1 transition-colors">Follow the route &darr;</a>
                </div>
            </div>

            {{-- Southern Africa crop of the shared map, recoloured for the dark hero; routes draw in on load --}}
            <div class="lg:col-span-5 rise-in" style="--i: 3" x-data="{ active: 'cd', revealed: false }" x-init="setTimeout(() => revealed = true, 700)">
                <div class="map-dark relative mx-auto max-w-[30rem]">
                    @include('partials.africa-map', ['viewBox' => '420 540 440 470'])
                </div>
            </div>
        </div>

        {{-- How an order moves: the four stages tick over in turn --}}
        <div
            class="relative z-10 border-t border-white/10"
            x-data="{ step: 0, init() { if (!window.matchMedia('(prefers-reduced-motion: reduce)').matches) setInterval(() => this.step = (this.step + 1) % 4, 2600) } }"
        >
            <div class="site-container">
                <p class="pt-5 font-label text-[11px] uppercase tracking-[0.05em] text-white/40">How an order moves</p>
                <ol class="grid grid-cols-2 lg:grid-cols-4">
                    @foreach ([
                        ['Order confirmed', 'You get a delivery date'],
                        ['Loaded in Lubumbashi', 'Packed and dispatched'],
                        ['At the border', 'Tracked through each crossing'],
                        ['On site', 'Our team stays reachable'],
                    ] as $i => [$stage, $note])
                        <li class="relative py-5 pr-4">
                            <span class="absolute left-0 right-4 top-0 h-px bg-white/10">
                                <span class="stage-fill absolute inset-y-0 left-0 bg-nexa-copper" :class="{ 'is-on': step === {{ $i }}, 'is-done': step > {{ $i }} }"></span>
                            </span>
                            <span class="font-label text-[11px] text-white/40">0{{ $i + 1 }}</span>
                            <p class="mt-1 font-display font-medium text-lg transition-colors duration-500" :class="step >= {{ $i }} ? 'text-white' : 'text-white/45'">{{ $stage }}</p>
                            <p class="text-sm text-white/50">{{ $note }}</p>
                        </li>
                    @endforeach
                </ol>
            </div>
        </div>
    </section>

    {{-- Everything below hangs off one route line: each section is a checkpoint on it.
         The rail fills as the section scrolls in (--p from data-scroll-progress). --}}

    <!-- Checkpoint 01: what we supply, as a manifest -->
    @php($services = \App\Models\Service::all())
    <section id="route" data-scroll-progress class="checkpoint bg-nexa-paper">
        <div class="site-container checkpoint-grid">
            <div class="checkpoint-rail" aria-hidden="true"><span class="checkpoint-node"></span></div>
            <div class="py-24">
                <div class="flex flex-col sm:flex-row sm:items-end sm:justify-between gap-6">
                    <div>
                        <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-copper-dark">Checkpoint 01 &middot; Supply</p>
                        <h2 class="section-title mt-4 text-nexa-ink">What goes on the truck.</h2>
                    </div>
                    <p class="max-w-sm text-nexa-ink/60 leading-relaxed">Six supply lines, one order. Pick from any of them and it ships together.</p>
                </div>

                {{-- Manifest: a row per supply line; on desktop the line's photo follows the cursor --}}
                <div
                    class="manifest mt-14 relative"
                    x-data="{ hover: null, x: 0, y: 0 }"
                    @mousemove="const r = $el.getBoundingClientRect(); x = $event.clientX - r.left; y = $event.clientY - r.top"
                    @mouseleave="hover = null"
                >
                    <div class="hidden md:grid manifest-row manifest-head font-label text-[11px] uppercase tracking-[0.05em] text-nexa-ink/45">
                        <span>Line</span><span>Supply</span><span>Contents</span><span></span>
                    </div>
                    @foreach ($services as $i => $service)
                        <a
                            href="{{ route('services.index') }}#{{ $service->slug }}"
                            class="manifest-row group"
                            @mouseenter="hover = {{ $i }}"
                        >
                            <span class="font-label text-xs text-nexa-ink/45 group-hover:text-nexa-copper transition-colors">NX&ndash;0{{ $i + 1 }}</span>
                            <span class="font-display font-medium text-2xl xl:text-[1.75rem] leading-tight tracking-[-0.02em] text-nexa-ink">{{ $service->title }}</span>
                            <span class="text-nexa-ink/60 leading-relaxed">{{ implode(' · ', array_slice($service->includes, 0, 4)) }}</span>
                            <span class="manifest-go justify-self-end" aria-hidden="true">&rarr;</span>
                            <img src="{{ $service->imageUrl() }}" alt="" class="md:hidden mt-2 aspect-[16/9] w-full object-cover" loading="lazy">
                        </a>
                    @endforeach

                    <div
                        class="manifest-preview hidden md:block pointer-events-none absolute left-0 top-0 z-10 w-72 aspect-[4/3] overflow-hidden bg-nexa-navy"
                        :class="{ 'is-on': hover !== null }"
                        :style="`translate: ${x + 24}px ${y - 110}px`"
                        aria-hidden="true"
                    >
                        @foreach ($services as $i => $service)
                            <img src="{{ $service->imageUrl() }}" alt="" class="absolute inset-0 h-full w-full object-cover transition-opacity duration-300" :class="hover === {{ $i }} ? 'opacity-100' : 'opacity-0'" loading="lazy">
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkpoint 02: where it goes, as stops on one route -->
    @php($regions = \App\Models\Region::all())
    <section data-scroll-progress class="checkpoint bg-nexa-bone overflow-hidden">
        <x-contours class="absolute inset-0 h-full w-full text-nexa-ink/[0.05]" />
        <div class="relative site-container checkpoint-grid">
            <div class="checkpoint-rail" aria-hidden="true"><span class="checkpoint-node"></span></div>
            <div class="py-24">
                <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-copper-dark">Checkpoint 02 &middot; Route</p>
                <h2 class="section-title mt-4 text-nexa-ink max-w-2xl">One supplier from Kolwezi to the Witwatersrand.</h2>

                <div class="route-stops mt-16" style="--stops: {{ $regions->count() }}">
                    <div class="route-track hidden lg:block" aria-hidden="true"><span class="route-track-fill"></span></div>
                    <ol class="grid gap-10 lg:gap-6 lg:grid-cols-4">
                        @foreach ($regions as $i => $region)
                            <li class="route-stop" style="--n: {{ $i }}">
                                <span class="route-stop-node" aria-hidden="true"></span>
                                <p class="mt-8 font-label text-[11px] uppercase tracking-[0.05em] text-nexa-ink/45">Stop 0{{ $i + 1 }} &middot; {{ $region->presence }}</p>
                                <h3 class="mt-2 font-display font-medium text-3xl tracking-[-0.02em] text-nexa-ink">
                                    <a href="{{ route('regions.show', $region->slug) }}" class="hover:text-nexa-copper-dark transition-colors">{{ $region->name }}</a>
                                </h3>
                                @if ($region->city)
                                    <p class="mt-1 text-sm text-nexa-ink/55">{{ $region->city }} office</p>
                                @endif
                                <ul class="mt-5 space-y-2 border-t border-nexa-ink/10 pt-4">
                                    @foreach ($region->areas as $area => $minerals)
                                        <li class="flex justify-between gap-4 text-sm">
                                            <span class="text-nexa-ink/80">{{ $area }}</span>
                                            <span class="text-right text-nexa-ink/45">{{ $minerals }}</span>
                                        </li>
                                    @endforeach
                                </ul>
                            </li>
                        @endforeach
                    </ol>
                </div>
            </div>
        </div>
    </section>

    <!-- Checkpoint 03: what clients say, as delivery notes -->
    @php($testimonials = \App\Models\Testimonial::all())
    <section data-scroll-progress class="checkpoint bg-nexa-paper">
        <div class="site-container checkpoint-grid">
            <div class="checkpoint-rail" aria-hidden="true"><span class="checkpoint-node"></span></div>
            <div class="py-24">
                <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-copper-dark">Checkpoint 03 &middot; Received</p>
                <h2 class="section-title mt-4 text-nexa-ink">Signed off on site.</h2>

                <div class="mt-14 grid gap-6 md:grid-cols-2">
                    @foreach ($testimonials as $i => $testimonial)
                        <figure class="delivery-note flex flex-col" x-data="{ stamped: false }" x-intersect.once.margin.-15%="setTimeout(() => stamped = true, 350)">
                            <div class="flex items-center justify-between gap-4 px-7 py-4 font-label text-[11px] uppercase tracking-[0.05em] text-nexa-ink/45">
                                <span>Delivery note</span>
                                <span>Review 0{{ $i + 1 }}</span>
                            </div>
                            <div class="delivery-note-tear" aria-hidden="true"></div>
                            <blockquote class="px-7 pt-7 text-lg leading-relaxed text-nexa-ink/85">&ldquo;{{ $testimonial->quote }}&rdquo;</blockquote>
                            <figcaption class="relative mt-auto flex items-end justify-between gap-6 px-7 pt-8 pb-7">
                                <span>
                                    <span class="block font-label text-[11px] uppercase tracking-[0.05em] text-nexa-ink/45">Client review</span>
                                    <span class="mt-1 block font-display font-medium text-xl tracking-[-0.02em] text-nexa-ink">{{ $testimonial->name ?? $testimonial->topic }}</span>
                                </span>
                                <span class="stamp" :class="{ 'is-stamped': stamped }" aria-hidden="true">Received</span>
                            </figcaption>
                        </figure>
                    @endforeach
                </div>
            </div>
        </div>
    </section>

    <!-- Checkpoint 04: send the order -->
    <section data-scroll-progress class="checkpoint relative overflow-hidden bg-nexa-navy-dark text-white">
        <x-contours class="absolute inset-0 h-full w-full text-white/[0.06]" />
        <div class="relative site-container checkpoint-grid checkpoint-grid--dark">
            <div class="checkpoint-rail" aria-hidden="true"><span class="checkpoint-node"></span></div>
            <div class="py-28 grid lg:grid-cols-12 gap-10 items-end">
                <div class="lg:col-span-8">
                    <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-copper">Checkpoint 04 &middot; Your site</p>
                    <h2 class="mt-4 font-display font-medium text-[clamp(2.25rem,4.6vw,4.5rem)] leading-[1.05] tracking-tightest text-balance">Send us your list. We&rsquo;ll send back a date.</h2>
                </div>
                <div class="lg:col-span-4 lg:justify-self-end">
                    <a href="{{ route('contact') }}" class="btn-stamp btn-stamp--light">Request a quote</a>
                </div>
            </div>
        </div>
    </section>
</x-marketing-layout>
