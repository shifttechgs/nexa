{{-- Design concept for the 404 page, in the same route language as dev/concept. --}}
<x-marketing-layout
    :title="'Page not found'"
    :description="'This page could not be found.'"
>
    <section data-no-reveal class="relative flex overflow-hidden bg-nexa-navy-dark text-white min-h-screen min-h-[100svh]">
        <x-contours class="concept-contours absolute inset-0 h-full w-full text-white/[0.07]" />
        <div class="relative z-10 site-container flex flex-col justify-center pt-32 pb-20">
            <p class="font-label text-xs uppercase tracking-[0.05em] text-nexa-copper rise-in" style="--i: 0">Error 404 &middot; No delivery on record</p>
            <h1 class="mt-7 max-w-4xl font-display font-medium text-[clamp(2.75rem,6vw,6.5rem)] leading-[1.02] tracking-tightest text-balance rise-in" style="--i: 1">
                This page didn&rsquo;t make it to site.
            </h1>
            <p class="mt-8 max-w-lg text-lg text-white/70 leading-relaxed rise-in" style="--i: 2">
                The link may be old or mistyped. Everything we supply is still a click away.
            </p>
            <div class="mt-10 flex flex-wrap items-center gap-x-8 gap-y-5 rise-in" style="--i: 3">
                <a href="{{ route('home') }}" class="btn-stamp btn-stamp--light">Back to the home page</a>
                <a href="{{ route('services.index') }}" class="font-label text-xs uppercase tracking-[0.05em] text-white/70 hover:text-white border-b border-white/25 hover:border-white pb-1 transition-colors">See what we supply</a>
            </div>
            <div class="stamp stamp--light is-stamped mt-16 self-start rise-in" style="--i: 4" aria-hidden="true">Return to sender</div>
        </div>
    </section>
</x-marketing-layout>
