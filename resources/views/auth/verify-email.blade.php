<x-guest-layout>
    <x-header>
        <x-slot name="title">
            {{ __('Login') }}
        </x-slot>
        <x-slot name="description">
            Thanks for signing up! Before getting started, could you verify your email address by clicking on the link
            we just emailed to you? If you didn\'t receive the email, we will gladly send you another.
        </x-slot>
    </x-header>

    <div class="flex items-center justify-between mt-4">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <x-button variant="primary" class="w-full mt-4">
                {{ __('Resend Email') }}
            </x-button>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <x-button variant="primary" class="w-full mt-4">
                {{ __('Log Out') }}
            </x-button>
        </form>
    </div>
</x-guest-layout>
