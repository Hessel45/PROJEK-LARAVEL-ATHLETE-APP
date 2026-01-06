<x-guest-layout>
    <x-header>
        <x-slot name="title">
            {{ __('Register') }}
        </x-slot>
        <x-slot name="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum dolorum! Quos.
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('register') }}">
        @csrf

        <div>
            <x-label for="name" :value="__('Name')" />
            <x-input id="name" type="text" name="name" :value="old('name')" required autofocus
                autocomplete="name" />
            <x-error :errors="$errors->get('name')" />
        </div>

        <div class="mt-4">
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" type="email" name="email" :value="old('email')" required autocomplete="username" />
            <x-error :errors="$errors->get('email')" />
        </div>

        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" type="password" name="password" required autocomplete="new-password" />
            <x-error :errors="$errors->get('password')" />
        </div>

        <div class="mt-4">
            <x-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-input id="password_confirmation" type="password" name="password_confirmation" required
                autocomplete="new-password" />
            <x-error :errors="$errors->get('password_confirmation')" />
        </div>

        <x-button variant="primary" class="w-full mt-4">
            {{ __('Register') }}
        </x-button>

        <div class="mt-4">
            <p class="text-center">
                Already registered? <a href="{{ route('login') }}" class="link">Log in</a>
            </p>
        </div>
    </form>
</x-guest-layout>
