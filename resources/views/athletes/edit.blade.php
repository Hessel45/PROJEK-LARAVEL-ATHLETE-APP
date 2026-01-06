<x-app-layout>
  <section class="py-20 w-content">
    <div class="space-y-8">
      <x-header class="[&>h2]:text-4xl">
        <x-slot name="title">
          {{ __('Edit Details of Athlete') }}
        </x-slot>
        <x-slot name="description">
          Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum
          dolorum!
        </x-slot>
      </x-header>

      <form action="{{ route('athletes.update', $athlete) }}" method="post" class="p-8 bg-white border-primary rounded-xl"
        enctype="multipart/form-data">
        @csrf
        @method('patch')

        <div class="grid gap-8 lg:grid-cols-2">
          <div>
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" type="text" name="name" :value="old('name') ?? $athlete->name" required />
            <x-error :errors="$errors->get('name')" />
          </div>

          <div>
            <x-label for="country" :value="__('Country')" />
            <x-input id="country" type="text" name="country" :value="old('country') ?? $athlete->country" required />
            <x-error :errors="$errors->get('country')" />
          </div>

          <div>
            <x-label for="sport" :value="__('Sport')" />
            <x-input id="sport" type="text" name="sport" :value="old('sport') ?? $athlete->sport" required />
            <x-error :errors="$errors->get('sport')" />
          </div>

          <div class="hidden lg:block"></div>

          <div>
            <x-label for="birthdate" :value="__('Birthdate')" />
            <x-input id="birthdate" type="date" name="birthdate" :value="old('birthdate') ?? $athlete->birthdate->format('Y-m-d')" required />
            <x-error :errors="$errors->get('birthdate')" />
          </div>

          <div>
            <x-label for="debut" :value="__('Debut Date')" />
            <x-input id="debut" type="date" name="debut" :value="old('debut') ?? $athlete->debut->format('Y-m-d')" required />
            <x-error :errors="$errors->get('debut')" />
          </div>

          <div>
            <x-label for="photo" :value="__('Photo')" />
            <x-file id="photo" type="file" name="photo" accept="image/*" :value="old('photo') ?? $athlete->photo ? asset($athlete->photo) : null" />
            <x-error :errors="$errors->get('photo')" />
          </div>

          <div class="flex items-center justify-end col-span-full">
            <x-button variant="primary">
              {{ __('Update Athlete') }}
            </x-button>
          </div>
        </div>
      </form>
    </div>
  </section>
</x-app-layout>
