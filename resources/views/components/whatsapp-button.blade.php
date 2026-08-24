@props(['message' => "Hello Nexa, I'd like to enquire about your services."])

@php
    $number = preg_replace('/\D/', '', config('services.whatsapp.number') ?? '');
@endphp

@if ($number)
    <a
        href="https://wa.me/{{ $number }}?text={{ urlencode($message) }}"
        target="_blank"
        rel="noopener noreferrer"
        aria-label="Chat with Nexa on WhatsApp"
        class="group fixed bottom-6 right-6 z-40 flex h-14 w-14 items-center justify-center rounded-full bg-[#25D366] text-white shadow-lg shadow-black/20 transition hover:scale-105 hover:bg-[#20BD5A] focus:outline-none focus:ring-4 focus:ring-[#25D366]/40"
    >
        <span class="pointer-events-none absolute right-full mr-3 whitespace-nowrap rounded-md bg-nexa-navy px-3 py-1.5 text-sm font-medium text-white opacity-0 shadow-md transition group-hover:opacity-100">
            Chat on WhatsApp
        </span>

        <svg viewBox="0 0 32 32" class="h-8 w-8 fill-current" aria-hidden="true">
            <path d="M16.004 3C9.377 3 4 8.377 4 15.004c0 2.386.66 4.62 1.807 6.53L4 29l7.64-1.766a11.94 11.94 0 0 0 4.364.82h.005c6.627 0 12.004-5.377 12.004-12.005C28.013 8.377 22.636 3 16.004 3Zm7.03 17.017c-.297.836-1.47 1.531-2.406 1.735-.64.137-1.475.246-4.29-.92-3.6-1.492-5.914-5.147-6.096-5.386-.176-.24-1.458-1.94-1.458-3.7 0-1.76.905-2.622 1.226-2.983.32-.36.7-.45.933-.45.234 0 .467.002.671.013.216.011.505-.082.79.603.297.716.994 2.475 1.081 2.655.088.18.146.39.03.63-.117.24-.176.39-.35.6-.176.21-.37.47-.53.63-.176.176-.36.367-.155.717.204.35.905 1.494 1.943 2.42 1.335 1.19 2.462 1.559 2.813 1.734.35.176.556.147.76-.088.205-.234 1.376-1.606 1.744-2.156.37-.55.74-.457 1.24-.274.5.184 3.19 1.505 3.74 1.778.55.274.916.41 1.05.64.135.234.135 1.352-.163 2.188Z"/>
        </svg>
    </a>
@endif
