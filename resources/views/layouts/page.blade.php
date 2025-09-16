<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title', config('app.name', 'CAMFEBA Academy'))</title>

    <meta name="description" content="@yield('description', 'CAMFEBA Academy offers professional training in Cambodia.')">
    <meta name="keywords" content="@yield('keywords', 'training, Cambodia, courses, CAMFEBA')">
    <meta name="author" content="CAMFEBA">
    <link rel="canonical" href="{{ url()->current() }}">

    <!-- Open Graph -->
    <meta property="og:title" content="@yield('title', 'CAMFEBA Academy')" />
    <meta property="og:description" content="@yield('description', 'Professional training in Cambodia')" />
    <meta property="og:type" content="website" />
    <meta property="og:url" content="{{ url()->current() }}" />
    <meta property="og:image" content="@yield('image', asset('images/logo.png'))" />

    <!-- Twitter Card -->
    <meta name="twitter:card" content="summary_large_image">
    <meta name="twitter:title" content="@yield('title', 'CAMFEBA Academy')">
    <meta name="twitter:description" content="@yield('description', 'Professional training in Cambodia')">
    <meta name="twitter:image" content="@yield('image', asset('images/logo.png'))">

    <!-- Structured Data -->
    @php
        $schemaData = [
            "@context" => "https://schema.org",
            "@type" => "Organization",
            "name" => "CAMFEBA Academy",
            "url" => url('/'),
            "logo" => asset('images/logo-academy.jpg'),
            "sameAs" => [
                "https://web.facebook.com/profile.php?id=100063664806283"
            ]
        ];
        @endphp

        <script type="application/ld+json">
        {!! json_encode($schemaData, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE) !!}
        </script>

    <!-- Fonts & Styles -->
    <link rel="preconnect" href="https://fonts.bunny.net">
    <link href="https://fonts.bunny.net/css?family=figtree:400,500,600&display=swap" rel="stylesheet" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    @vite(['resources/css/app.css', 'resources/js/app.js'])

    @stack('head')
</head>
<body class="font-sans text-gray-900 antialiased bg-gray-100 dark:bg-gray-900">

    <!-- Header -->
    <header class="w-full bg-white dark:bg-gray-800 shadow">
        <div class="container mx-auto flex justify-between items-center px-4 py-3">
            <a href="/" class="flex items-center gap-2">
                <x-application-logo class="w-10 h-10 fill-current text-gray-500" />
                <span class="font-bold text-lg text-gray-700 dark:text-gray-200">CAMFEBA ACADEMY</span>
            </a>

            <button id="menu-toggle" class="md:hidden text-gray-600 dark:text-gray-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" stroke-width="2"
                     viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>

            <nav id="menu" class="hidden md:flex gap-6" aria-label="Main navigation">
                <a href="/home" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Home</a>
                <a href="/category" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Trainings</a>
                <a href="/aboutus" class="text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">About</a>
            </nav>
        </div>

        <div id="mobile-menu" class="md:hidden hidden px-4 pb-4">
            <a href="/home" class="block py-2 text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Home</a>
            <a href="/category" class="block py-2 text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">Trainings</a>
            <a href="/aboutus" class="block py-2 text-gray-600 hover:text-gray-900 dark:text-gray-300 dark:hover:text-white">About</a>
        </div>

        <script>
            document.getElementById('menu-toggle').addEventListener('click', () => {
                document.getElementById('mobile-menu').classList.toggle('hidden');
            });
        </script>
    </header>

    <!-- Main Content -->
    <main class="container mx-auto px-4 py-8">
        @yield('content')
    </main>

    <!-- Footer -->
    <footer class="w-full bg-white dark:bg-gray-800 shadow mt-12">
        <div class="container mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm text-gray-600 dark:text-gray-300">
            
            <!-- Contact Info -->
            <div>
                <h3 class="font-semibold text-gray-700 dark:text-gray-200 mb-3">Contact</h3>
                <p>Page: <a href="https://web.facebook.com/profile.php?id=100063664806283" class="hover:text-blue-600 dark:hover:text-blue-400">CAMFEBA ACADEMY</a></p>
                <p>Email: <a href="mailto:training@camfeba.com" class="hover:text-blue-600 dark:hover:text-blue-400">training@camfeba.com</a></p>
                <p>Phone: <a href="tel:+85523230022" class="hover:text-blue-600 dark:hover:text-blue-400">+855 23 230 022</a></p>
                <p>Address: Business Development Center (BDC), 8th floor, OCIC Blvd, 12110, Phnom Penh, Cambodia</p>
                <div class="mt-4">
                    <iframe
                        src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d6762.437255392454!2d104.92328022106935!3d11.596839768436004!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x31095118b9d04dfb%3A0xf411c3d39a129c30!2sCambodian%20Federation%20of%20Employers%20and%20Business%20Associations%20(CAMFEBA)!5e0!3m2!1sen!2skh!4v1758032316365!5m2!1sen!2skh"
                        width="100%" height="150" style="border:0;" allowfullscreen="" loading="lazy"
                        referrerpolicy="no-referrer-when-downgrade"
                        class="rounded shadow-sm">
                    </iframe>
                </div>
            </div>

            <!-- Site Map -->
            <div>
                <h3 class="font-semibold text-gray-700 dark:text-gray-200 mb-3">Site Map</h3>
                <ul class="space-y-2">
                    <li><a href="/home" class="hover:text-blue-600 dark:hover:text-blue-400">Home</a></li>
                    <li><a href="/category" class="hover:text-blue-600 dark:hover:text-blue-400">Trainings</a></li>
                    <li><a href="/aboutus" class="hover:text-blue-600 dark:hover:text-blue-400">About Us</a></li>
                </ul>
            </div>

            <!-- Branding -->
            <div class="text-center md:text-right">
                <x-application-logo class="w-10 h-10 mx-auto md:mx-0 fill-current text-gray-500 mb-2" />
                <p class="font-bold text-gray-700 dark:text-gray-200">CAMFEBA ACADEMY</p>
                <p class="mt-2 text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} {{ config('app.name', 'CAMFEBA Academy') }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr