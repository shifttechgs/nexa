<x-marketing-layout
    :title="'Products'"
    :description="'Products from Nexa Mining and Engineering Services: explosives, mining chemicals, crushing equipment, safety gear and plant and conveyor spares.'"
>
    <section class="bg-nexa-navy">
        <div class="site-container pt-28 sm:pt-32 pb-14">
            <nav aria-label="Breadcrumb" class="text-sm text-white/45">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="mx-2 text-white/25">/</span>
                <span class="text-white/75" aria-current="page">Products</span>
            </nav>
            <h1 class="mt-6 font-display font-medium text-4xl sm:text-5xl lg:text-6xl tracking-tightest text-white">Products.</h1>
            <p class="mt-5 text-white/60 max-w-xl leading-relaxed">
                Consumables, spares, chemicals and safety gear, delivered to sites in the DRC, Zambia,
                Zimbabwe and South Africa. Add what you need to a quote and we'll come back with pricing
                and availability.
            </p>
        </div>
    </section>

    {{-- Catalogue: category tabs + search filter the grid client-side; 12 cards at a time with "Load more".
         The wrapper holds the Alpine state so the tab strip can stick while the grid scrolls under it. --}}
    <div
        x-data="{
            category: @js($activeCategory),
            query: '',
            step: 12,
            limit: 12,
            items: @js($products->map(fn ($p) => [
                'category' => $p->category,
                'text' => Str::lower($p->name.' '.$p->sku.' '.$p->category.' '.$p->summary),
            ])->values()),
            get matched() {
                const q = this.query.trim().toLowerCase();
                return this.items
                    .map((item, i) => ({ ...item, i }))
                    .filter((item) => (this.category === 'All' || item.category === this.category) && (!q || item.text.includes(q)))
                    .map((item) => item.i);
            },
            setCategory(name) {
                this.category = name;
                this.limit = this.step;
                const url = new URL(window.location);
                name === 'All' ? url.searchParams.delete('category') : url.searchParams.set('category', name);
                window.history.replaceState({}, '', url);
                // switching while deep in the grid: jump back to the top of the results
                if (this.$refs.catalogue.getBoundingClientRect().top < 0) this.$refs.catalogue.scrollIntoView({ behavior: 'smooth' });
                // keep the active tab visible when the row scrolls sideways (mobile)
                const tab = this.$refs.row.querySelector(`[data-category='${name}']`);
                if (tab) this.$refs.row.scrollTo({ left: tab.offsetLeft - 16, behavior: 'smooth' });
            },
        }"
        x-init="$watch('query', () => limit = step)"
    >
        <!-- Category tabs: stick under the site header, same strip as the services page -->
        <nav aria-label="Product categories" class="sticky top-[72px] lg:top-[88px] z-40 bg-nexa-paper/95 backdrop-blur-md border-b border-nexa-line">
            <div class="site-container">
                <div x-ref="row" role="tablist" class="-mx-4 px-4 sm:mx-0 sm:px-0 flex gap-1 overflow-x-auto [scrollbar-width:none] [&::-webkit-scrollbar]:hidden">
                    @foreach (['All' => $products->count()] + $categories->all() as $name => $count)
                        <button
                            type="button"
                            role="tab"
                            data-category="{{ $name }}"
                            @click="setCategory(@js($name))"
                            :aria-selected="(category === @js($name)).toString()"
                            class="relative shrink-0 whitespace-nowrap px-3 sm:px-4 py-4 text-sm transition-colors"
                            :class="category === @js($name) ? 'text-nexa-ink font-medium' : 'text-nexa-ink/55 hover:text-nexa-ink'"
                        >
                            {{ $name }} <span class="ml-1 opacity-50">{{ $count }}</span>
                            <span
                                class="absolute inset-x-3 sm:inset-x-4 bottom-0 h-0.5 bg-nexa-green transition-transform duration-300 origin-left"
                                :class="category === @js($name) ? 'scale-x-100' : 'scale-x-0'"
                                aria-hidden="true"
                            ></span>
                        </button>
                    @endforeach
                </div>
            </div>
        </nav>

        <section x-ref="catalogue" class="scroll-mt-[128px] lg:scroll-mt-[144px] bg-nexa-paper pt-10 sm:pt-12 pb-20 sm:pb-28">
            <div class="site-container">

                <!-- Count + search -->
                <div class="flex flex-col-reverse sm:flex-row sm:items-center sm:justify-between gap-5">
                    <p class="text-sm text-nexa-ink/55" aria-live="polite">
                        Showing <span x-text="Math.min(limit, matched.length)"></span> of <span x-text="matched.length"></span>
                        <span x-text="matched.length === 1 ? 'product' : 'products'"></span>
                    </p>

                    <label class="relative block sm:w-72 shrink-0">
                        <span class="sr-only">Search products</span>
                        <svg viewBox="0 0 20 20" class="pointer-events-none absolute left-0 top-1/2 h-4 w-4 -translate-y-1/2 text-nexa-ink/40" fill="none" stroke="currentColor" stroke-width="1.75" aria-hidden="true">
                            <circle cx="9" cy="9" r="5.5"/><path stroke-linecap="round" d="m13.5 13.5 3 3"/>
                        </svg>
                        <input
                            type="search"
                            x-model.debounce.150ms="query"
                            placeholder="Search by name or code"
                            class="w-full border-0 border-b border-nexa-ink/20 bg-transparent pl-7 pr-0 py-2 text-nexa-ink placeholder:text-nexa-ink/35 focus:ring-0 focus:border-nexa-green"
                        >
                    </label>
                </div>

                <!-- Grid -->
                <div class="mt-6 grid gap-4 lg:gap-6 sm:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4">
                    @foreach ($products as $i => $product)
                        {{-- cloak cards the first paint won't show, so the grid doesn't jump when Alpine starts --}}
                        <x-product-card
                            :product="$product"
                            class="border border-nexa-line"
                            x-show="matched.indexOf({{ $i }}) > -1 && matched.indexOf({{ $i }}) < limit"
                            :x-cloak="$i >= 12 || ($activeCategory !== 'All' && $product->category !== $activeCategory)"
                        />
                    @endforeach
                </div>

                <!-- Empty state -->
                <div x-show="matched.length === 0" x-cloak class="py-16 text-center">
                    <p class="font-display font-medium text-xl text-nexa-ink">No products match that search.</p>
                    <p class="mt-2 text-nexa-ink/55">Try another term, or <a href="{{ route('contact') }}" class="underline underline-offset-4 hover:text-nexa-green">ask our sales team</a>. We stock more than we list.</p>
                </div>

                <!-- Load more -->
                <div x-show="matched.length > limit" x-cloak class="mt-12 flex justify-center">
                    <button type="button" @click="limit += step" class="border border-nexa-ink/25 px-6 py-3.5 text-sm font-semibold text-nexa-ink hover:border-nexa-ink hover:bg-nexa-ink/[0.04] transition">
                        Load more <span class="ml-1 text-nexa-ink/45" x-text="'(' + (matched.length - limit) + ' more)'"></span>
                    </button>
                </div>
            </div>
        </section>
    </div>

    <x-sales-cta
        tone="light"
        light-bg="bg-nexa-bone"
        class="pt-8 sm:pt-12"
        heading="Can't find what you need?"
        copy="We stock more than we list. Send us the part number, spec sheet or a photo of what you're replacing and our sales team will source it."
    />
</x-marketing-layout>
