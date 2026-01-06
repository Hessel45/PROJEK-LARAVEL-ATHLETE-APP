@props([
    'value' => null,
    'variant' => null,
])

@php
    $variants = match ($variant) {
        'success' => 'text-primary-600',
        'danger' => 'text-red-600',
        default => 'text-gray-600',
    };

    $props = $attributes->merge([
        'class' => implode(' ', ['font-medium text-sm', $variants]),
    ]);
@endphp

@if ($value)
    <div {{ $props }}>
        {{ $value }}
    </div>
@endif
