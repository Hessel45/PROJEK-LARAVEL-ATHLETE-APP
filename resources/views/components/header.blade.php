@php
    $props = $attributes->merge([
        'class' => implode(' ', ['space-y-2', '[&>h2]:text-2xl']),
    ]);
@endphp

<header {{ $props }}>
    <h2 class="font-bold font-heading">
        {{ $title }}
    </h2>
    <p>
        {{ $description }}
    </p>
</header>
