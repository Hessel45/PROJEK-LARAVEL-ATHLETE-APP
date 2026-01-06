<x-app-layout>
  <section class="py-20 w-content">
    <div class="space-y-8">
      <x-header class="[&>h2]:text-4xl">
        <x-slot name="title">
          {{ __('List of Athletes') }}
        </x-slot>
        <x-slot name="description">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum
          dolorum!
        </x-slot>
      </x-header>


      <div class="flex flex-col items-center justify-between gap-4 lg:flex-row">
        <a href="{{ route('athletes.create') }}" class="w-full lg:w-auto">
          <x-button variant="primary" class="w-full">
            <i data-lucide="plus" class="mr-1 -ml-1 size-5"></i>
            {{ __('Athlete') }}
          </x-button>
        </a>

        <form action="{{ route('athletes.index') }}" method="get"
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

      <div class="grid gap-8 md:grid-cols-2 lg:grid-cols-4">
        @foreach ($athletes as $athlete)
          <a href="{{ route('athletes.show', $athlete) }}"
            class="relative items-start overflow-hidden bg-white rounded-xl border-primary">

            <figure class="w-full border-b aspect-thumbnail bg-zinc-50 border-zinc-200">
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

            <div class="p-6 border-b border-zinc-200">
              <h3 class="font-bold">
                {{ $athlete->name }}
              </h3>
              <span class="block font-medium opacity-50">
                {{ $athlete->country }}
              </span>
            </div>

            <div class="px-6 py-4">
              <span class="block font-medium opacity-50">
                {{ $athlete->debut->diff(now())->format('%y Years %m Month Career') }}
              </span>
            </div>
          </a>
        @endforeach
      </div>

      {{ $athletes->links() }}
  </section>
</x-app-layout>
