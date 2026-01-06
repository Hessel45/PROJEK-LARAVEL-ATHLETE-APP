@props([
    'value' => null,
    'disabled' => false,
])

@php
    $props = $attributes->merge([
        'class' => implode(' ', [
            'w-full bg-zinc-50 text-sm form-input p-4 file:hidden',
            'border-primary focus:border-primary focus:ring-0 rounded-lg',
        ]),
    ]);
@endphp

<div class="space-y-4" x-data="{
    file: null,
    input: null,
    preview: null,

    init() {
        this.file = null;
        this.input = this.$refs.input;
        this.preview = this.$refs.preview;

        const value = {{ json_encode($value) }};
        if (value) {
            this.file = true;
            this.preview.src = value;
        }
    },
    open() {
        this.input.click();
    },
    upload(e) {
        this.file = e.target.files[0];
        this.preview.src = URL.createObjectURL(this.file);
    },
    remove() {
        this.file = null;
        this.preview.src = null;
    },
}" x-on:click="open">
    <figure class="overflow-hidden rounded-lg cursor-pointer border-primary aspect-thumbnail bg-zinc-50">
        <img x-show="file" x-ref="preview" class="object-cover object-center w-full h-full" />
    </figure>

    <input @if ($disabled) disabled @endif {{ $props }} x-ref="input"
        x-on:change="upload($event)" />
</div>
