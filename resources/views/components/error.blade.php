@props([
    'errors' => null,
])

@php
    $props = $attributes->merge([
        'class' => implode(' ', ['text-sm text-red-600 space-y-1']),
    ]);
@endphp

@if ($errors)
    <ul {{ $props }}>
        @foreach ((array) $errors as $error)
            <li>{{ $error }}</li>
        @endforeach
    </ul>
@endif
