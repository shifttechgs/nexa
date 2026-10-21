<x-marketing-layout
    :title="'Articles'"
    :description="'Articles from Nexa Mining and Engineering Services on compliance, fuel logistics, safety and supply.'"
>
    <section class="bg-nexa-navy">
        <div class="site-container pt-28 sm:pt-32 pb-14">
            <nav aria-label="Breadcrumb" class="text-sm text-white/45">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="mx-2 text-white/25">/</span>
                <span class="text-white/75" aria-current="page">Articles</span>
            </nav>
            <h1 class="mt-6 font-display font-medium text-4xl sm:text-5xl lg:text-6xl tracking-tightest text-white">Articles.</h1>
            <p class="mt-5 text-white/60 max-w-xl leading-relaxed">
                Notes from our team on compliance, logistics, safety and supply.
            </p>
        </div>
    </section>

    <section class="bg-nexa-bone py-16 sm:py-20">
        <div class="site-container">
            @if ($posts->isEmpty())
                <p class="text-nexa-ink/60">No articles published yet.</p>
            @else
                <div class="grid gap-4 lg:gap-6 md:grid-cols-2 lg:grid-cols-3">
                    @foreach ($posts as $post)
                        <x-post-card :post="$post" />
                    @endforeach
                </div>
            @endif
        </div>
    </section>
</x-marketing-layout>
