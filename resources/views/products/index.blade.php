<x-marketing-layout
    :title="'Products'"
    :description="'Product catalog from Nexa Mining and Engineering Services — explosives, mining chemicals, equipment spares, fuel and technology supply.'"
>
    <section class="bg-nexa-navy">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-16 sm:pt-20 pb-16">
            <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">Products</p>
            <h1 class="font-display font-extrabold text-4xl sm:text-5xl text-white">The catalog.</h1>
            <p class="mt-5 text-white/55 max-w-xl leading-relaxed">
                Consumables, spares, chemicals and fuel &mdash; sourced, stocked and delivered across the DRC,
                Zambia, Zimbabwe and South Africa.
            </p>
        </div>
    </section>

    <section class="py-20" x-data="{ active: 'All' }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Category filter -->
            <div class="flex flex-wrap gap-2 border-b border-nexa-ink/15 pb-6">
                <button
                    @click="active = 'All'"
                    :class="active === 'All' ? 'bg-nexa-navy text-white' : 'text-nexa-ink/60 hover:text-nexa-ink border border-nexa-ink/15'"
                    class="px-4 py-2 text-xs font-label uppercase tracking-wide transition"
                >All</button>
                @foreach ($products->keys() as $category)
                    <button
                        @click="active = '{{ $category }}'"
                        :class="active === '{{ $category }}' ? 'bg-nexa-navy text-white' : 'text-nexa-ink/60 hover:text-nexa-ink border border-nexa-ink/15'"
                        class="px-4 py-2 text-xs font-label uppercase tracking-wide transition"
                    >{{ $category }}</button>
                @endforeach
            </div>

            <!-- Product groups -->
            @foreach ($products as $category => $items)
                <div x-show="active === 'All' || active === '{{ $category }}'" x-cloak class="mt-12">
                    <h2 class="font-display font-bold text-xl text-nexa-ink mb-1">{{ $category }}</h2>
                    <p class="font-mono text-[11px] uppercase tracking-widest text-nexa-green mb-6">{{ $items->count() }} {{ Str::plural('item', $items->count()) }}</p>

                    <div class="border-t border-nexa-ink/15">
                        @foreach ($items as $product)
                            <a href="{{ route('products.show', $product) }}" class="grid sm:grid-cols-12 gap-4 sm:gap-8 py-6 border-b border-nexa-ink/15 group items-center">
                                <div class="sm:col-span-2">
                                    <span class="font-mono text-xs text-nexa-green">{{ $product->sku }}</span>
                                </div>
                                <div class="sm:col-span-4">
                                    <h3 class="font-display font-semibold text-nexa-ink group-hover:text-nexa-green transition">{{ $product->name }}</h3>
                                </div>
                                <div class="sm:col-span-5">
                                    <p class="text-sm text-nexa-ink/55 leading-relaxed">{{ $product->summary }}</p>
                                </div>
                                <div class="sm:col-span-1 text-right">
                                    <span class="text-nexa-ink/30 group-hover:text-nexa-green transition text-lg">&rarr;</span>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endforeach
        </div>
    </section>

    <!-- CTA -->
    <section class="pb-24">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="border border-nexa-ink/15 bg-nexa-navy p-8 sm:p-10 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <p class="font-display font-semibold text-lg">Can't find what you need?</p>
                    <p class="text-white/55 text-sm mt-1">Our catalog covers more than what's listed here &mdash; ask our sales team directly.</p>
                </div>
                <a href="{{ route('home') }}#contact" class="inline-flex items-center gap-2 px-6 py-3 text-sm font-semibold text-white bg-nexa-green hover:bg-nexa-navy-dark transition shrink-0">
                    Request a Quote
                </a>
            </div>
        </div>
    </section>
</x-marketing-layout>
