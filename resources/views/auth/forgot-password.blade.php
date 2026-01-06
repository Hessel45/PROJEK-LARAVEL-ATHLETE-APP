<x-guest-layout>
    <x-header>
        <x-slot name="title">
            {{ __('Forgot Password') }}
        </x-slot>
        <x-slot name="description">
            Forgot your password? No problem. Just let us know your email address and we will
            email you a password reset link that will allow you to choose a new one.
        </x-slot>
    </x-header>

    <form method="POST" action="{{ route('password.email') }}">
        @csrf

        <div>
            <x-label for="email" :value="__('Email')" />
            <x-input id="email" type="email" name="email" :value="old('email')" required autofocus />
            <x-error :errors="$errors->get('email')" />
        </div>

        <x-button variant="primary" class="w-full mt-4">
            {{ __('Send Link') }}
        </x-button>
    </form>
</x-guest-layout>
