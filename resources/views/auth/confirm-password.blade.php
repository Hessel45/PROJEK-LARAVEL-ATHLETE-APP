<x-guest-layout>
    <x-header>
        <x-slot name="title">
            {{ __('Confirm Password') }}
        </x-slot>
        <x-slot name="description">
            This is a secure area of the application. Please confirm your password before continuing.
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('password.confirm') }}">
        @csrf

        <div>
            <x-label for="password" :value="__('Password')" />
            <x-input id="password" type="password" name="password" required autocomplete="current-password" />
            <x-error :errors="$errors->get('password')" />
        </div>

        <x-button variant="primary" class="w-full mt-4">
            {{ __('Confirm') }}
        </x-button>
    </form>
</x-guest-layout>
