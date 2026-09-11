<x-marketing-layout
    :title="'Products'"
    :description="'Product catalog from Nexa Mining and Engineering Services — explosives, mining chemicals, equipment spares, fuel and technology supply.'"
>
    <section class="bg-nexa-navy">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 sm:pt-32 pb-16">
            <x-section-label text="Products" :dark="true" />
            <h1 class="mt-5 font-display font-medium text-4xl sm:text-5xl lg:text-6xl tracking-tightest text-white">The catalog.</h1>
            <p class="mt-5 text-white/55 max-w-xl leading-relaxed">
                Consumables, spares, chemicals and fuel &mdash; sourced, stocked and delivered across the DRC,
                Zambia, Zimbabwe and South Africa.
            </p>
        </div>
    </section>

    <section class="py-20" x-data="{ active: 'All' }">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">

            <!-- Category filter -->
            <div class="flex flex-wrap gap-2 border-b border-nexa-line pb-6">
                <button
                    @click="active = 'All'"
                    :class="active === 'All' ? 'bg-nexa-navy text-white' : 'text-nexa-ink/60 hover:text-nexa-ink border border-nexa-ink/15'"
                    class="px-4 py-2 text-xs font-label uppercase tracking-wide rounded-full transition"
                >All</button>
                @foreach ($products->keys() as $category)
                    <button
                        @click="active = '{{ $category }}'"
                        :class="active === '{{ $category }}' ? 'bg-nexa-navy text-white' : 'text-nexa-ink/60 hover:text-nexa-ink border border-nexa-ink/15'"
                        class="px-4 py-2 text-xs font-label uppercase tracking-wide rounded-full transition"
                    >{{ $category }}</button>
                @endforeach
            </div>

            <!-- Product groups -->
            @foreach ($products as $category => $items)
                <div x-show="active === 'All' || active === '{{ $category }}'" x-cloak class="mt-12">
                    <h2 class="font-display font-semibold text-xl text-nexa-ink mb-1">{{ $category }}</h2>
                    <p class="font-mono text-[11px] uppercase tracking-widest text-nexa-green mb-6">{{ $items->count() }} {{ Str::plural('item', $items->count()) }}</p>

                    <div class="border-t border-nexa-line">
                        @foreach ($items as $product)
                            <a href="{{ route('products.show', $product) }}" class="grid sm:grid-cols-12 gap-4 sm:gap-8 py-6 border-b border-nexa-line group items-center">
                                <div class="sm:col-span-2">
                                    <span class="font-mono text-xs text-nexa-green">{{ $product->sku }}</span>
                                </div>
                                <div class="sm:col-span-4">
                                    <h3 class="font-display font-semibold text-base sm:text-lg leading-snug text-nexa-ink group-hover:text-nexa-green transition">{{ $product->name }}</h3>
                                </div>
                                <div class="sm:col-span-5">
                                    <p class="text-sm text-nexa-ink/55 leading-relaxed">{{ $product->summary }}</p>
                                </div>
                                <div class="sm:col-span-1 text-right">
                                    <span class="text-nexa-ink/30 group-hover:text-nexa-green group-hover:translate-x-1 inline-block transition text-lg">&rarr;</span>
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
            <div class="rounded-2xl bg-nexa-navy p-8 sm:p-10 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <p class="font-display font-semibold text-lg">Can't find what you need?</p>
                    <p class="text-white/55 text-sm mt-1">Our catalog covers more than what's listed here &mdash; ask our sales team directly.</p>
                </div>
                <x-btn :href="route('home').'#contact'" variant="primary" size="sm" class="shrink-0">Request a Quote</x-btn>
            </div>
        </div>
    </section>
</x-marketing-layout>
