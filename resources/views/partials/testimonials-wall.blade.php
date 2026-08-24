{{--
    "Wall of love" style auto-scrolling testimonials, inspired by Framer's Testimonials Pro
    marketplace component. Built as a preview only (see routes/web.php, /dev/testimonials-wall,
    app.debug-gated) — not wired into the live home page yet. With only 3 placeholder
    testimonials in the database today, a 3-column wall would visibly repeat the same quote
    across columns; wire this into home.blade.php once there are enough real testimonials
    (roughly 9+, so each column has distinct content) to fill it properly.
--}}
@props(['testimonials'])

@php
    $perColumn = (int) ceil(max($testimonials->count(), 1) / 3);
    $columns = $testimonials->chunk($perColumn)->values();
    while ($columns->count() < 3) {
        $columns->push(collect());
    }
    $durations = ['58s', '72s', '50s'];
    $reverse = [false, true, false];
@endphp

<div class="relative">
    <div class="pointer-events-none absolute inset-x-0 top-0 h-20 bg-gradient-to-b from-white to-transparent z-10"></div>
    <div class="pointer-events-none absolute inset-x-0 bottom-0 h-20 bg-gradient-to-t from-white to-transparent z-10"></div>

    <div class="grid sm:grid-cols-2 lg:grid-cols-3 gap-6 h-[640px]">
        @foreach ($columns as $i => $column)
            @continue($column->isEmpty())
            <div class="overflow-hidden h-full {{ $i === 1 ? 'hidden lg:block' : '' }}">
                <div
                    class="testimonial-marquee-track flex flex-col gap-6"
                    style="animation-duration: {{ $durations[$i] ?? '65s' }}; animation-direction: {{ ($reverse[$i] ?? false) ? 'reverse' : 'normal' }};"
                >
                    <div class="flex flex-col gap-6">
                        @foreach ($column as $testimonial)
                            <x-testimonial-card :testimonial="$testimonial" />
                        @endforeach
                    </div>
                    <div class="flex flex-col gap-6 motion-reduce:hidden" aria-hidden="true">
                        @foreach ($column as $testimonial)
                            <x-testimonial-card :testimonial="$testimonial" />
                        @endforeach
                    </div>
                </div>
            </div>
        @endforeach
    </div>
</div>
