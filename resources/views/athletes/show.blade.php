<x-app-layout>
    <section class="py-20 w-content">
        <div class="space-y-8">
            <x-header class="[&>h2]:text-4xl">
                <x-slot name="title">
                    {{ __('Details of Athlete') }}
                </x-slot>
                <x-slot name="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum
                    dolorum!
                </x-slot>
            </x-header>

            <div class="relative grid items-start overflow-hidden bg-white lg:grid-cols-2 rounded-xl border-primary">
                <figure
                    class="w-full h-full border-b aspect-square lg:border-b-0 lg:border-r bg-zinc-50 border-zinc-200">
                    @if ($athlete->photo)
                        <img class="object-cover object-center w-full h-full" src="{{ asset($athlete->photo) }}"
                            alt="{{ $athlete->name }}">
                    @endif
                </figure>

                <div class="absolute top-0 left-0 m-4">
                    <span class="px-3 py-1 text-sm font-medium text-white rounded-full bg-primary-600">
                        {{ $athlete->sport }}
                    </span>
                </div>

                <div class="p-8 space-y-4">
                    <x-header>
                        <x-slot name="title">
                            {{ __('About Athlete') }}
                        </x-slot>
                        <x-slot name="description">
                            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque
                            earum dolorum! Quos.
                        </x-slot>
                    </x-header>

                    <div>
                        <x-label for="name" :value="__('Name')" />
                        <x-input id="name" type="text" name="name" :value="$athlete->name" readonly />
                    </div>

                    <div>
                        <x-label for="country" :value="__('Country')" />
                        <x-input id="country" type="text" name="country" :value="$athlete->country" readonly />
                    </div>

                    <div>
                        <x-label for="sport" :value="__('Sport')" />
                        <x-input id="sport" type="text" name="sport" :value="$athlete->sport" readonly />
                    </div>

                    <div>
                        <x-label for="birthdate" :value="__('Birthdate')" />
                        <x-input id="birthdate" type="date" name="birthdate" :value="$athlete->birthdate->format('Y-m-d')" readonly />
                    </div>

                    <div>
                        <x-label for="debut" :value="__('Debut Date')" />
                        <x-input id="debut" type="date" name="debut" :value="$athlete->debut->format('Y-m-d')" readonly />
                    </div>

                    <div class="flex items-center justify-end space-x-4">
                        <form action="{{ route('athletes.destroy', $athlete) }}" method="post">
                            @csrf
                            @method('delete')

                            <x-button variant="danger">
                                {{ __('Delete Athlete') }}
                            </x-button>
                        </form>

                        <a href="{{ route('athletes.edit', $athlete) }}">
                            <x-button variant="primary">
                                {{ __('Edit Details') }}
                            </x-button>
                        </a>
                    </div>
                </div>
            </div>

            <x-header>
                <x-slot name="title">
                    {{ $athlete->name . ' Achievements' }}
                </x-slot>
                <x-slot name="description">
                    Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum
                    dolorum!
                </x-slot>
            </x-header>

            <div class="flex flex-col items-center justify-between gap-4 lg:flex-row">
                <a href="{{ route('athletes.achievements.create', ['athlete' => $athlete]) }}"
                    class="w-full lg:w-auto">
                    <x-button variant="primary" class="w-full">
                        <i data-lucide="plus" class="mr-1 -ml-1 size-5"></i>
                        {{ __('Achievement') }}
                    </x-button>
                </a>

                <form action="{{ route('athletes.show', $athlete) }}" method="get"
                    class="flex items-center justify-end w-full space-x-4 lg:w-auto">
                    <div class="w-full">
                        <x-label for="search" :value="__('Search')" class="sr-only" />
                        <x-input id="search" type="text" name="search" :value="$search" autofocus />
                    </div>

                    <x-button>
                        {{ __('Submit') }}
                    </x-button>
                </form>
            </div>

            <div class="w-full overflow-hidden bg-white border-primary rounded-xl">
                <table class="w-full">
                    <thead>
                        <tr
                            class="*:px-4 *:py-3 *:text-sm *:text-start bg-zinc-100 font-medium border-b border-zinc-200">
                            <th>{{ __('ID') }}</th>
                            <th>{{ __('Athlete Name') }}</th>
                            <th>{{ __('Title') }}</th>
                            <th>{{ __('Date of Achievement') }}</th>
                            <th>{{ __('Actions') }}</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($achievements as $achievement)
                            <tr class="*:px-4 *:py-2 *:text-sm *:text-start *:border-b *:border-zinc-200">
                                <td class="whitespace-nowrap">{{ $achievement->id }}</td>
                                <td class="whitespace-nowrap">{{ $athlete->name }}</td>
                                <td class="whitespace-nowrap">{{ $achievement->title }}</td>
                                <td class="whitespace-nowrap">{{ $achievement->date->format('Y-m-d') }}</td>
                                <td>
                                    <div class="flex items-center space-x-2">
                                        <form
                                            action="{{ route('athletes.achievements.destroy', ['athlete' => $athlete, 'achievement' => $achievement]) }}"
                                            method="post">
                                            @csrf
                                            @method('delete')
                                            <x-action variant="danger" label="Delete">
                                                <i data-lucide="trash" class="size-5"></i>
                                            </x-action>
                                        </form>

                                        <a
                                            href="{{ route('athletes.achievements.edit', ['athlete' => $athlete, 'achievement' => $achievement]) }}">
                                            <x-action variant="ghost" label="Edit">
                                                <i data-lucide="settings-2" class="size-5"></i>
                                            </x-action>
                                        </a>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr class="*:p-4 *:text-sm *:text-center *:border-b *:border-zinc-200">
                                <td colspan="5" class="whitespace-nowrap">
                                    {{ __('No achievements yet') }}
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            {{ $achievements->links() }}
    </section>
</x-app-layout>
