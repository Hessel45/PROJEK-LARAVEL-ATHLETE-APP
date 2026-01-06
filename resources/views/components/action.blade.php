@props([
    'label' => null,
    'variant' => null,
])

@php
    $variants = match ($variant) {
        'primary' => 'bg-primary-600 text-white border-transparent',
        'outline' => 'bg-transparent text-primary-600 border-primary-600',
        'danger' => 'bg-zinc-200 text-zinc-600 hover:bg-red-600 hover:text-white border-transparent',
        'ghost' => 'bg-zinc-200 text-zinc-600 border-transparent',
        default => 'bg-zinc-800 text-white border-transparent',
    };

    $props = $attributes->merge([
        'class' => implode(' ', [
            'size-8 font-medium text-sm',
            'inline-flex items-center justify-center',
            'transition ease-in-out duration-150',
            'border-2 rounded-lg',
            $variants,
        ]),
    ]);
@endphp

<button {{ $props }} title="{{ $label }}">
    {{ $slot }}
    <span class="sr-only">{{ $label }}</span>
</button>
