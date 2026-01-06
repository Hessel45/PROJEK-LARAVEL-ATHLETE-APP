@props([
    'size' => 'md',
])

@php
    $csize = match ($size) {
        'sm' => 'text-base [&>i]:size-4',
        'md' => 'text-lg [&>i]:size-6',
        'lg' => 'text-xl [&>i]:size-8',
        default => 'text-lg [&>i]:size-10',
    };

    $props = $attributes->merge([
        'class' => implode(' ', ['flex items-center gap-x-2 w-full font-bold text-primary-600', $csize]),
    ]);
@endphp

<span {{ $props }}>
    <i data-lucide="layers-2"></i>
    {{ config('app.name', 'Laravel') }}
</span>
