<x-marketing-layout
    :title="$product->name"
    :description="$product->summary"
>
    <section class="bg-nexa-navy">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8 pt-28 sm:pt-32 pb-16">
            <a href="{{ route('products.index') }}" class="font-mono text-xs uppercase tracking-widest text-white/40 hover:text-white transition">
                &larr; All products
            </a>

            <div class="mt-8 flex items-center gap-4">
                <span class="font-mono text-[11px] uppercase tracking-widest text-nexa-green">{{ $product->category }}</span>
                <span class="font-mono text-[11px] text-white/35">{{ $product->sku }}</span>
            </div>

            <h1 class="mt-4 font-display font-medium text-3xl sm:text-5xl tracking-tight text-white leading-tight">{{ $product->name }}</h1>
            <p class="mt-4 text-white/60 max-w-xl leading-relaxed">{{ $product->summary }}</p>
        </div>
    </section>

    <section class="py-20">
        <div class="max-w-3xl mx-auto px-4 sm:px-6 lg:px-8">
            @if ($product->description)
                <div class="text-lg">
                    @foreach (explode("\n\n", $product->description) as $paragraph)
                        <p class="text-nexa-ink/75 leading-relaxed mb-6">{{ $paragraph }}</p>
                    @endforeach
                </div>
            @endif

            @if ($related->isNotEmpty())
                <div class="mt-4 border-t border-nexa-line pt-10">
                    <x-section-label text="Related in {{ $product->category }}" class="mb-6" />
                    <div class="border-t border-nexa-line">
                        @foreach ($related as $item)
                            <a href="{{ route('products.show', $item) }}" class="grid sm:grid-cols-12 gap-4 sm:gap-8 py-5 border-b border-nexa-line group items-center">
                                <div class="sm:col-span-2">
                                    <span class="font-mono text-xs text-nexa-green">{{ $item->sku }}</span>
                                </div>
                                <div class="sm:col-span-4">
                                    <h3 class="font-display font-semibold text-base sm:text-lg leading-snug text-nexa-ink group-hover:text-nexa-green transition">{{ $item->name }}</h3>
                                </div>
                                <div class="sm:col-span-6">
                                    <p class="text-sm text-nexa-ink/55 leading-relaxed">{{ $item->summary }}</p>
                                </div>
                            </a>
                        @endforeach
                    </div>
                </div>
            @endif

            <div class="mt-14 rounded-2xl bg-nexa-navy p-8 sm:p-10 text-white flex flex-col sm:flex-row items-center justify-between gap-6">
                <div>
                    <p class="font-display font-semibold text-lg">Interested in {{ $product->name }}?</p>
                    <p class="text-white/60 text-sm mt-1">Get pricing and availability from our sales team.</p>
                </div>
                <x-btn :href="route('home').'#contact'" variant="primary" size="sm" class="shrink-0">Request a Quote</x-btn>
            </div>
        </div>
    </section>
</x-marketing-layout>
