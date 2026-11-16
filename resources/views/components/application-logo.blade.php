@props(['mark' => false, 'transparent' => false])

@if ($mark)
    <img src="{{ asset('images/favicon-512.png') }}" width="512" height="512" alt="Nexa" {{ $attributes->merge(['class' => 'object-contain']) }} />
@elseif ($transparent)
    <img src="{{ asset('images/nexa-logo.webp') }}" width="360" height="147" alt="Nexa Mining and Engineering Services" {{ $attributes->merge(['class' => 'object-contain']) }} />
@else
    <img src="{{ asset('images/nexa-logo.jpg') }}" width="616" height="252" alt="Nexa Mining and Engineering Services" {{ $attributes->merge(['class' => 'object-contain']) }} />
@endif
