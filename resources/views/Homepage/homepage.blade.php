@extends('layouts.page')
@section('content')
<div class="px-10">
    <div class="relative bg-gradient-to-r bg-gray-100 text-white rounded-xl shadow-lg">
        <div class="max-w-7xl mx-auto px-6 lg:px-8 py-20">
            <div class="lg:grid lg:grid-cols-12 lg:gap-8 items-center">
                <!-- Text Content -->
                <div class="sm:text-center md:max-w-2xl md:mx-auto lg:col-span-6 lg:text-left">
                    <h1 class="text-4xl font-extrabold tracking-tight sm:text-5xl text-black">
                        Welcome to <span class="text-[#002870]">CAMFEBA ACADEMY</span>
                    </h1>
                    <p class="mt-6 text-lg leading-8 text-black">
                        CAMFEBA training refers to professional courses and consultancy services offered by the Cambodian Federation of Employers and Business Associations (CAMFEBA) to help Cambodian businesses and their employees develop skills, ensure legal compliance, and foster sound industrial and labor relations practices
                    </p>
                    
                </div>

                <!-- Banner Image -->
                <div class="mt-10 relative lg:mt-0 lg:col-span-6">
                    <img src="{{ asset('images/banner-homepage.jpg') }}" 
                        alt="App preview" 
                        class="w-full max-w-lg mx-auto drop-shadow-2xl rounded-xl">
                </div>
            </div>
        </div>
    </div>
    {{-- About Camfeba --}}
    <section class="py-12 my-8 bg-gray-100 rounded-xl shadow-lg">
        <div class="max-w-7xl mx-auto px-6 lg:grid lg:grid-cols-2 lg:gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold">About Us</h2>
                <p class="mt-6 text-lg text-gray-600">
                    Our mission is to make technology simple and accessible.  
                    We focus on user-friendly solutions that save time and deliver results.
                </p>
            </div>
            <img src="{{ asset('images/banner-homepage.jpg') }}" alt="About" class="rounded-2xl shadow-lg mt-10 lg:mt-0">
        </div>
    </section>

    {{-- Service of Camfeba Academy --}}
    <div class="py-12 my-8 bg-gray-100 rounded-xl shadow-lg">
    <h2 class="text-2xl font-bold text-center mb-8">Our Training Program</h2>
    <!-- Flex container to center cards -->
    <div class="flex flex-wrap justify-center gap-6">
        @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" 
               class="w-64 bg-white dark:bg-gray-800 rounded-xl hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col">
               
                {{-- Cover Image --}}
                <img src="{{ asset($category->cover) }}" 
                     alt="{{ $category->name }}" 
                     class="w-full h-40 object-contain rounded-t-xl">

                {{-- Card Content --}}
                <div class="p-4 flex-1 flex flex-col text-center">
                    <h3 class="text-lg font-semibold text-gray-900 dark:text-white mb-2">
                        {{ $category->name }}
                    </h3>
                    <p class="text-sm text-gray-600 dark:text-gray-300 flex-1">
                        {{ Str::limit($category->description, 80) }}
                    </p>
                </div>
            </a>
        @endforeach
    </div>
</div>
</div>
@endsection