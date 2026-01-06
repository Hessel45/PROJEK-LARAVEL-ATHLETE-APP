<x-app-layout>
    <section class="py-20 w-content">
        <div class="space-y-8">
            <x-header class="[&>h2]:text-4xl">
                <x-slot name="title">
                    {{ __('Add Achievement For ' . $athlete->name) }}
                </x-slot>
                <x-slot name="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum
                    dolorum!
                </x-slot>
            </x-header>

            <form action="{{ route('athletes.achievements.store', $athlete) }}" method="post"
                class="p-8 bg-white border-primary rounded-xl">
                @csrf

                <div class="grid gap-8 lg:grid-cols-2">
                    <div>
                        <x-label for="title" :value="__('Title')" />
                        <x-input id="title" type="text" name="title" :value="old('title')" required />
                        <x-error :errors="$errors->get('title')" />
                    </div>

                    <div>
                        <x-label for="date" :value="__('Date')" />
                        <x-input id="date" type="date" name="date" :value="old('date') ?? now()->format('Y-m-d')" required />
                        <x-error :errors="$errors->get('date')" />
                    </div>

                    <div class="col-span-full">
                        <x-label for="description" :value="__('Description')" />
                        <x-textarea id="description" type="text" name="description" :value="old('description')" rows="5"
                            required />
                        <x-error :errors="$errors->get('description')" />
                    </div>

                    <div class="flex items-center justify-end col-span-full">
                        <x-button variant="primary">
                            {{ __('Add Achievement') }}
                        </x-button>
                    </div>
                </div>
            </form>
        </div>
    </section>
</x-app-layout>
