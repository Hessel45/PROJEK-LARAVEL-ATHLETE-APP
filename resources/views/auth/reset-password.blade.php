<x-guest-layout>
    <x-header>
        <x-slot name="title">
            {{ __('Reset Password') }}
        </x-slot>
        <x-slot name="description">
            Lorem, ipsum dolor sit amet consectetur adipisicing elit. Repellendus error quam itaque earum dolorum! Quos.
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" type="email" name="email" :value="old('email', $request->email)" required autofocus
                autocomplete="username" />
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
            {{ __('Reset Password') }}
        </x-button>
    </form>
</x-guest-layout>
