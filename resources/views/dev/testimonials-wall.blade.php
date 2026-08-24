{{--
    Dev-only preview of the 3-column auto-scrolling testimonials wall (see
    partials/testimonials-wall.blade.php). Only routed when APP_DEBUG=true —
    not linked from anywhere on the live site. Swap this in for the static
    grid on the home page once there are enough real testimonials to fill
    three columns without repeating content.
--}}
<x-marketing-layout :title="'Dev Preview — Testimonials Wall'">
    <section class="py-24 bg-white">
        <div class="max-w-6xl mx-auto px-4 sm:px-6 lg:px-8">
            <div class="max-w-2xl">
                <p class="font-label text-sm uppercase tracking-[0.2em] text-nexa-green mb-4">What Clients Say</p>
                <h2 class="font-display font-bold text-3xl sm:text-4xl text-nexa-ink">Trusted on site.</h2>
            </div>

            <div class="mt-12">
                @include('partials.testimonials-wall', ['testimonials' => $testimonials])
            </div>
        </div>
    </section>
</x-marketing-layout>
