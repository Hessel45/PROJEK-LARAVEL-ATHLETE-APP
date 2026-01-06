<nav class="py-8">
    <div class="flex items-center justify-between w-content">
        <a href="{{ route('home') }}">
            <x-logo />
        </a>

        <ul class="flex items-center space-x-6 font-medium">
            <li><a href="{{ route('athletes.index') }}">List Athletes</a></li>
            <li>
                @auth
                    <form method="POST" action="{{ route('logout') }}">
                        @csrf
                        <x-button>
                            Log Out
                        </x-button>
                    </form>
                @else
                    <a href="{{ route('login') }}">
                        <x-button variant="primary">
                            Log In
                        </x-button>
                    </a>
                @endauth
            </li>
        </ul>
    </div>
</nav>
