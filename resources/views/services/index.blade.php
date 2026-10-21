<x-marketing-layout
    :title="'Services'"
    :description="'Mining and industrial supply, operations consulting, equipment and logistics, fuel and energy, technology supply and training from Nexa Mining and Engineering Services.'"
>
    <section class="bg-nexa-navy">
        <div class="site-container pt-28 sm:pt-32 pb-14">
            <nav aria-label="Breadcrumb" class="text-sm text-white/45">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="mx-2 text-white/25">/</span>
                <span class="text-white/75" aria-current="page">Services</span>
            </nav>
            <h1 class="mt-6 font-display font-medium text-4xl sm:text-5xl lg:text-6xl tracking-tightest text-white rise-in" style="--i: 0">Services.</h1>
            <p class="mt-5 text-white/60 max-w-2xl leading-relaxed rise-in" style="--i: 1">
                Six service lines for mines in the DRC, Zambia, Zimbabwe and South Africa, from consumables
                and spares through to fuel, equipment and on-site training.
            </p>

        </div>
    </section>

    <!-- Service tabs: stick under the site header; the tab for the section in view is highlighted -->
    <nav
        aria-label="Services on this page"
        class="sticky top-[72px] lg:top-[88px] z-40 bg-nexa-paper/95 backdrop-blur-md border-b border-nexa-line"
        x-data="{
            active: @js($services->first()->slug),
            init() {
                const observer = new IntersectionObserver((entries) => {
                    entries.forEach((entry) => {
                        if (entry.isIntersecting) this.setActive(entry.target.id);
                    });
                }, { rootMargin: '-40% 0px -55% 0px' });
                @js($services->pluck('slug')).forEach((id) => {
                    const section = document.getElementById(id);
                    if (section) observer.observe(section);
                });
            },
            setActive(id) {
                this.active = id;
                // keep the active tab visible when the row scrolls sideways (mobile)
                const tab = this.$refs.row.querySelector(`[href='#${id}']`);
                if (tab) this.$refs.row.scrollTo({ left: tab.offsetLeft - 16, behavior: 'smooth' });
            },
        }"
    >
        <div class="site-container">
            <div x-ref="row" class="-mx-4 px-4 sm:mx-0 sm:px-0 flex gap-1 overflow-x-auto [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                @foreach ($services as $service)
                    <a
                        href="#{{ $service->slug }}"
                        @click="setActive(@js($service->slug))"
                        class="relative shrink-0 whitespace-nowrap px-3 sm:px-4 py-4 text-sm transition-colors"
                        :class="active === @js($service->slug) ? 'text-nexa-ink font-medium' : 'text-nexa-ink/55 hover:text-nexa-ink'"
                        :aria-current="active === @js($service->slug) ? 'true' : null"
                    >
                        {{ $service->title }}
                        <span
                            class="absolute inset-x-3 sm:inset-x-4 bottom-0 h-0.5 bg-nexa-green transition-transform duration-300 origin-left"
                            :class="active === @js($service->slug) ? 'scale-x-100' : 'scale-x-0'"
                            aria-hidden="true"
                        ></span>
                    </a>
                @endforeach
            </div>
        </div>
    </nav>

    <!-- One row per service, photo side alternating -->
    @foreach ($services as $i => $service)
        <section id="{{ $service->slug }}" data-scroll-progress class="scroll-mt-[128px] lg:scroll-mt-[144px] py-16 sm:py-24 {{ $i % 2 ? 'bg-nexa-bone' : 'bg-nexa-paper' }}">
            <div class="site-container grid lg:grid-cols-12 gap-10 lg:gap-16 items-center">
                <div class="lg:col-span-6 {{ $i % 2 ? 'lg:order-2' : '' }}">
                    <div class="photo-reveal {{ $i % 2 ? 'photo-reveal--from-right' : '' }} relative aspect-[4/3] overflow-hidden bg-nexa-mist">
                        <img src="{{ $service->imageUrl() }}" alt="{{ $service->alt }}" class="absolute inset-0 h-full w-full object-cover" loading="{{ $i === 0 ? 'eager' : 'lazy' }}">
                    </div>
                </div>

                <div class="scroll-rise lg:col-span-6 {{ $i % 2 ? 'lg:order-1' : '' }}">
                    <h2 class="font-display font-medium text-3xl sm:text-4xl tracking-tight text-nexa-ink">{{ $service->title }}</h2>
                    <p class="mt-5 text-lg text-nexa-ink/70 leading-relaxed max-w-xl">{{ $service->summary }}</p>

                    <p class="mt-8 text-sm font-medium text-nexa-ink">What's included</p>
                    <ul class="scroll-stagger mt-3 grid sm:grid-cols-2 gap-x-8 border-t border-nexa-line">
                        @foreach ($service->includes as $n => $item)
                            <li class="flex items-start gap-3 border-b border-nexa-line py-3 text-nexa-ink/80" style="--i: {{ $n }}">
                                <span class="mt-[0.7em] h-0.5 w-2 shrink-0 bg-nexa-green" aria-hidden="true"></span>
                                {{ $item }}
                            </li>
                        @endforeach
                    </ul>

                    <div class="mt-9 flex flex-wrap items-center gap-x-7 gap-y-4">
                        <x-btn :href="route('contact', ['service' => $service->title])" variant="navy">Ask about {{ $service->title }}</x-btn>
                        @if ($service->productCategory)
                            <a
                                href="{{ $service->productCategory === 'All' ? route('products.index') : route('products.index', ['category' => $service->productCategory]) }}"
                                class="text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition"
                            >Browse related products</a>
                        @endif
                    </div>
                </div>
            </div>
        </section>
    @endforeach

    <x-sales-cta
        tone="light"
        :light-bg="$services->count() % 2 ? 'bg-nexa-bone' : 'bg-nexa-paper'"
        heading="Not sure which service you need?"
        copy="Tell us about your site and what you're trying to solve. Our team will point you to the right mix of supply, equipment and support."
    />
</x-marketing-layout>
