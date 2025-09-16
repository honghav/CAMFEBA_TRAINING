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

        <!-- Scripts -->
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    </head>
    <body class="font-sans antialiased">
        <div class="min-h-screen bg-gray-100 dark:bg-gray-900">
            @include('layouts.navigation')

            <!-- Page Heading -->
            @isset($header)
                <header class="bg-white dark:bg-gray-800 shadow">
                    <div class="max-w-7xl mx-auto py-6 px-4 sm:px-6 lg:px-8">
                        {{ $header }}
                    </div>
                </header>
            @endisset

            <!-- Page Content -->
            <main>
                {{ $slot }}
            </main>
            <!-- Footer -->
    <footer class="w-full bg-white dark:bg-gray-800 shadow mt-12">
        <div class="container mx-auto px-4 py-10 grid grid-cols-1 md:grid-cols-3 gap-8 text-sm text-gray-600 dark:text-gray-300">
             <!-- Contact Info -->
            <div>
                <h3 class="font-semibold text-gray-700 dark:text-gray-200 mb-3">Contact</h3>
                <p>Page: <a href="https://web.facebook.com/profile.php?id=100063664806283" class="hover:text-blue-600 dark:hover:text-blue-400">CAMFEBA ACADEMY</a></p>
                <p>Email: <a href="mailto:training@camfeba.com" class="hover:text-blue-600 dark:hover:text-blue-400">training@camfeba.com</a></p>
                <p>Phone: <a href="tel:+85523 230 022" class="hover:text-blue-600 dark:hover:text-blue-400">+855 23 230 022</a></p>
                
            </div>

            <!-- Site Map -->
            <div>
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

            <!-- Branding & Copyright -->
            <div class="text-center md:text-right">
                <x-application-logo class="w-10 h-10 mx-auto md:mx-0 fill-current text-gray-500 mb-2" />
                <p class="font-bold text-gray-700 dark:text-gray-200">CAMFEBA ACADEMY</p>
                <p class="mt-2 text-gray-500 dark:text-gray-400">
                    © {{ date('Y') }} {{ config('app.name', 'CAMFEBA Academy') }}. All rights reserved.
                </p>
            </div>
        </div>
    </footer>

        </div>
    </body>
</html>
