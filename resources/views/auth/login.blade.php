<x-guest-layout>
    <x-header>
        <x-slot name="title">
            {{ __('Login') }}
        </x-slot>
        <x-slot name="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum dolorum! Quos.
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" type="email" name="email" :value="old('email')" autofocus autocomplete="username"
                required />
            <x-error :errors="$errors->get('email')" />
        </div>

        <div class="mt-4">
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" type="password" name="password" autocomplete="current-password" required />
            <x-error :errors="$errors->get('password')" />
        </div>

        <div class="mt-4">
            <label for="remember_me" class="inline-flex items-center space-x-2">
                <x-checkbox id="remember_me" type="checkbox" name="remember" :value="old('remember')" />
                <x-label for="remember_me" :value="__('Remember me')" class="mb-0" />
            </label>
        </div>

        <x-button variant="primary" class="w-full mt-4">
            {{ __('Log in') }}
        </x-button>

        <div class="mt-4">
            <p class="text-center">
                Don't have an account? <a href="{{ route('register') }}" class="link">Register</a>
            </p>
        </div>
    </form>
</x-guest-layout>
