<x-app-layout>
    <section class="py-20 w-content">
        <div class="grid items-center gap-8 lg:grid-cols-2">
            <div class="space-y-6">
                <h1 class="text-6xl font-bold font-heading text-balance">
                    All in one place to track your <span class="text-primary-600">Athletes</span> Achievements.
                </h1>
                <p>
                    Lorem ipsum dolor sit amet consectetur adipisicing elit. Quibusdam optio eos nihil dicta. Sequi
                    harum ducimus expedita veritatis alias inventore!
                </p>

                <a href="{{ route('athletes.index') }}" class="block">
                    <x-button variant="primary">
                        Dashboard
                    </x-button>
                </a>
            </div>

            <figure class="w-full mx-auto rounded-full aspect-square max-w-[500px] p-4 border-primary bg-white">
                <img class="object-cover object-center w-full h-full rounded-full" src="{{ asset('images/hero.jpg') }}"
                    alt="Image of a person running">
            </figure>
        </div>
    </section>

    <section class="py-20 w-content">
        <div class="space-y-8">
            <x-header class="text-center">
                <x-slot name="title">
                    {{ __('Features') }}
                </x-slot>
                <x-slot name="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum
                    dolorum!
                    Quos.
                </x-slot>
            </x-header>

            <div class="grid gap-8 lg:grid-cols-3">
                @foreach ($features as $feature)
                    <div class="items-start p-6 space-y-4 bg-white rounded-xl border-primary">
                        <i data-lucide="{{ $feature['icon'] }}" class="text-primary-600 size-8"></i>
                        <div>
                            <h3 class="font-bold">
                                {{ $feature['title'] }}
                            </h3>
                            <p>
                                {{ $feature['description'] }}
                            </p>
                        </div>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
</x-app-layout>
