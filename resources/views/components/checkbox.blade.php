@props([
    'disabled' => false,
])

@php
    $props = $attributes->merge([
        'class' => implode(' ', ['border-gray-300 rounded shadow-sm text-primary-600 focus:ring-primary-500']),
    ]);
@endphp

<input {{ $props }} @if ($disabled) disabled @endif>
