<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=bree-serif:400" rel="stylesheet" />
    <link href="https://fonts.bunny.net/css?family=inter:400,500,600,700" rel="stylesheet" />

    <!-- Scripts -->
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>

<body>
    <div class="flex flex-col items-center justify-center min-h-screen w-content">
        <div class="w-full max-w-lg space-y-8">
            <a href="{{ route('home') }}" class="inline-flex">
                <x-logo size="lg" />
            </a>

            <x-status value="{{ session('success') }}" variant="success" />
            <x-status value="{{ session('error') }}" variant="danger" />

            <div class="p-8 space-y-6 overflow-hidden bg-white border-primary rounded-xl">
                {{ $slot }}
            </div>
        </div>
    </div>

    <!-- Lucide Icons -->
    <script src="https://unpkg.com/lucide@latest"></script>
    <script>
        lucide.createIcons();
    </script>
</body>

</html>
