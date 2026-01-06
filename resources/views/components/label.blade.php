@props([
    'value' => null,
])

@php
    $props = $attributes->merge([
        'class' => implode(' ', ['block text-sm font-medium mb-1']),
    ]);
@endphp

<label {{ $props }}>
    {{ $value ?? $slot }}
</label>
