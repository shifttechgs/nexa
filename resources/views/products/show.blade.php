<x-marketing-layout
    :title="$product->name"
    :description="$product->summary"
>
    <section class="bg-nexa-navy">
        <div class="site-container pt-28 sm:pt-32 pb-14">
            <nav aria-label="Breadcrumb" class="text-sm text-white/45">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="mx-2 text-white/25">/</span>
                <a href="{{ route('products.index') }}" class="hover:text-white transition">Products</a>
                <span class="mx-2 text-white/25">/</span>
                <a href="{{ route('products.index', ['category' => $product->category]) }}" class="hover:text-white transition">{{ $product->category }}</a>
            </nav>
        </div>
    </section>

    <section class="pb-20">
        <div class="site-container">
            <div class="-mt-6 grid lg:grid-cols-12 gap-10 lg:gap-16">
                <div class="lg:col-span-7">
                    <div class="relative aspect-[4/3] overflow-hidden bg-nexa-mist">
                        <img src="{{ $product->imageUrl() }}" alt="{{ $product->name }}" class="absolute inset-0 h-full w-full object-cover">
                    </div>
                </div>

                <div class="lg:col-span-5 lg:pt-14">
                    <p class="text-sm font-medium text-nexa-green">{{ $product->category }}</p>
                    <h1 class="mt-2 font-display font-medium text-3xl sm:text-4xl lg:text-5xl tracking-tight text-nexa-ink leading-tight">{{ $product->name }}</h1>
                    <p class="mt-5 text-lg text-nexa-ink/70 leading-relaxed">{{ $product->summary }}</p>

                    <dl class="mt-8 text-sm border-b border-nexa-line">
                        <div class="flex justify-between gap-6 border-t border-nexa-line py-3">
                            <dt class="text-nexa-ink/50">Product code</dt>
                            <dd class="text-nexa-ink">{{ $product->sku }}</dd>
                        </div>
                        @foreach ($product->specs as $label => $value)
                            <div class="flex justify-between gap-6 border-t border-nexa-line py-3">
                                <dt class="text-nexa-ink/50">{{ $label }}</dt>
                                <dd class="text-right text-nexa-ink">{{ $value }}</dd>
                            </div>
                        @endforeach
                    </dl>

                    <div class="mt-8 flex flex-wrap items-center gap-x-6 gap-y-4">
                        <x-quote-toggle :product="$product" class="!px-6 !py-3.5" />
                        <a href="{{ route('contact') }}#quote-form" class="text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition">Go to quote form</a>
                    </div>

                    @if ($product->description)
                        <div class="mt-10">
                            @foreach (explode("\n\n", $product->description) as $paragraph)
                                <p class="text-nexa-ink/70 leading-relaxed mb-5">{{ $paragraph }}</p>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>

        </div>
    </section>

    @if ($related->isNotEmpty())
        <section class="bg-nexa-bone py-20">
            <div class="site-container">
                <div class="flex items-end justify-between gap-4">
                    <h2 class="font-display font-medium text-2xl sm:text-3xl tracking-tight text-nexa-ink">More in {{ $product->category }}</h2>
                    <a href="{{ route('products.index', ['category' => $product->category]) }}" class="shrink-0 text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition">View all</a>
                </div>
                <div class="mt-8 grid gap-4 lg:gap-6 sm:grid-cols-2 lg:grid-cols-4">
                    @foreach ($related as $item)
                        <x-product-card :product="$item" />
                    @endforeach
                </div>
            </div>
        </section>
    @endif
</x-marketing-layout>
