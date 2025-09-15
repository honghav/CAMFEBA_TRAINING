<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />

    <!-- Bootstrap CSS (for components if you want to mix with Tailwind) -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Tailwind + App Styles/JS -->
    {{-- @vite(['resources/css/app.css', 'resources/js/app.js']) --}}
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Navbar -->
    <header class="w-full bg-white dark:bg-gray-800 shadow">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <a href="/" class="flex items-center gap-2">
                <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                <span class="font-bold text-lg text-gray-700 dark:text-gray-200">
                    {{-- {{ config('app.name', 'Laravel') }} --}}
                    CAMFEBA ACADEMY
                </span>
            </a>

            <!-- Example nav links -->
            <nav class="hidden md:flex gap-6">
                <a href="/home" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Home</a>
                <a href="/category" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Trainings</a>
                <a href="/aboutus" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">About</a>
            </nav>
        </div>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full bg-white dark:bg-gray-800 shadow mt-12">
        <div class="container mx-auto px-4 py-6 text-center text-gray-500 dark:text-gray-400 text-sm">
            © {{ date('Y') }} {{ config('app.name') }}. All rights reserved.
        </div>
    </footer>

    <!-- Bootstrap Bundle JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
