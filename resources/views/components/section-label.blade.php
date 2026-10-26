@props(['text' => null, 'dark' => false])

<p {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 font-label text-xs uppercase tracking-[0.05em] leading-[1.4] '.($dark ? 'text-white' : 'text-nexa-ink')]) }}>
    <span class="inline-block h-1.5 w-1.5 shrink-0 bg-nexa-green" aria-hidden="true"></span>
    {{ $text ?? $slot }}
</p>
