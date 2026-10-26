<x-marketing-layout
    :title="'Mining supply in '.$region->inSentence()"
    :description="$region->intro"
>
    <section class="bg-nexa-navy">
        <div class="site-container pt-28 sm:pt-32 pb-14">
            <nav aria-label="Breadcrumb" class="text-sm text-white/45">
                <a href="{{ route('home') }}" class="hover:text-white transition">Home</a>
                <span class="mx-2 text-white/25">/</span>
                <a href="{{ route('home') }}#regions" class="hover:text-white transition">Regions</a>
                <span class="mx-2 text-white/25">/</span>
                <span class="text-white/75" aria-current="page">{{ $region->name }}</span>
            </nav>
            <h1 class="mt-6 font-display font-medium text-4xl sm:text-5xl lg:text-6xl tracking-tightest text-white rise-in" style="--i: 0">{{ $region->name }}.</h1>
            <p class="mt-5 text-white/60 max-w-2xl leading-relaxed rise-in" style="--i: 1">{{ $region->intro }}</p>
        </div>
    </section>

    <!-- Mining areas + office, map alongside -->
    <section class="py-16 sm:py-24">
        <div class="site-container grid lg:grid-cols-2 gap-12 lg:gap-16 items-start">
            <div class="scroll-rise">
                <h2 class="font-display font-medium text-3xl sm:text-4xl tracking-tight text-nexa-ink">Where the mines are</h2>
                <p class="mt-4 text-nexa-ink/65 leading-relaxed max-w-md">The main mining areas we deliver to in {{ $region->inSentence() }}, and what comes out of the ground there.</p>

                <dl class="mt-8 border-t border-nexa-line">
                    @foreach ($region->areas as $area => $commodities)
                        <div class="flex justify-between gap-6 border-b border-nexa-line py-4">
                            <dt class="font-display font-medium text-nexa-ink">{{ $area }}</dt>
                            <dd class="text-sm text-nexa-ink/60 text-right">{{ $commodities }}</dd>
                        </div>
                    @endforeach
                </dl>

                <div class="mt-10 text-sm">
                    @if ($region->address)
                        <p class="text-nexa-ink/50">{{ $region->isHeadOffice() ? 'Head office' : $region->city.' office' }}</p>
                        <address class="mt-1 not-italic text-nexa-ink leading-relaxed">
                            @foreach ($region->address as $line)
                                {{ $line }}@if (! $loop->last)<br>@endif
                            @endforeach
                        </address>
                    @else
                        <p class="text-nexa-ink/50">Supplied from</p>
                        <p class="mt-1 text-nexa-ink">Head office, Lubumbashi</p>
                    @endif
                </div>
            </div>

            <div class="bg-nexa-bone p-8 sm:p-10" x-data="{ active: @js($region->code), revealed: true }">
                <div class="relative w-full max-w-[520px] mx-auto">
                    @include('partials.africa-map')
                </div>
            </div>
        </div>
    </section>

    <!-- Services: every line is available in every country -->
    <section class="bg-nexa-bone py-16 sm:py-24">
        <div class="site-container grid lg:grid-cols-12 gap-10 lg:gap-16">
            <div class="lg:col-span-4 scroll-rise">
                <h2 class="font-display font-medium text-3xl sm:text-4xl tracking-tight text-nexa-ink">What we supply in {{ $region->inSentence() }}</h2>
                <p class="mt-4 text-nexa-ink/65 leading-relaxed">All six service lines, on the same terms as the rest of the region.</p>
            </div>

            <ul class="lg:col-span-8 border-t border-nexa-line">
                @foreach ($services as $service)
                    <li class="flex flex-col sm:flex-row sm:items-baseline sm:justify-between gap-2 sm:gap-8 border-b border-nexa-line py-5">
                        <div>
                            <a href="{{ route('services.index') }}#{{ $service->slug }}" class="font-display font-medium text-lg text-nexa-ink hover:text-nexa-green transition-colors">{{ $service->title }}</a>
                            <p class="mt-1 text-sm text-nexa-ink/55">{{ implode(', ', $service->includes) }}</p>
                        </div>
                        <a href="{{ route('contact', ['service' => $service->title]) }}" class="shrink-0 text-sm font-semibold text-nexa-ink border-b border-nexa-ink/30 hover:border-nexa-ink pb-0.5 transition self-start sm:self-auto">Ask about this</a>
                    </li>
                @endforeach
            </ul>
        </div>
    </section>

    <!-- Other countries -->
    <section class="py-16 sm:py-20">
        <div class="site-container">
            <h2 class="font-display font-medium text-2xl sm:text-3xl tracking-tight text-nexa-ink">Other countries we supply</h2>
            <div class="mt-8 grid sm:grid-cols-3 border-t border-nexa-line">
                @foreach ($others as $other)
                    <a href="{{ route('regions.show', $other->slug) }}" class="group flex items-baseline justify-between gap-4 border-b sm:border-b-0 sm:border-r last:border-r-0 border-nexa-line py-6 sm:px-6 sm:first:pl-0">
                        <span>
                            <span class="block font-display font-medium text-xl text-nexa-ink group-hover:text-nexa-green transition-colors">{{ $other->name }}</span>
                            <span class="mt-1 block text-sm text-nexa-ink/50">{{ $other->presence }}{{ $other->city ? ', '.$other->city : '' }}</span>
                        </span>
                        <span class="text-nexa-ink/40 transition-transform duration-200 group-hover:translate-x-1" aria-hidden="true">&rarr;</span>
                    </a>
                @endforeach
            </div>
        </div>
    </section>

    <x-sales-cta
        tone="light"
        light-bg="bg-nexa-bone"
        :heading="'Supplying a site in '.$region->inSentence().'?'"
        copy="Tell us where the site is and what you need. Our sales team will come back with pricing and delivery times."
    />
</x-marketing-layout>
