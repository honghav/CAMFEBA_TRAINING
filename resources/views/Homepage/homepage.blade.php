@extends('layouts.page')
@section('title', 'Home | CAMFEBA Academy')
@section('description', 'Join CAMFEBA Academy and take professional courses in Cambodia to advance your career.')
@section('keywords', 'CAMFEBA, training, courses, Cambodia')
@section('image', asset('images/banner-homepage.jpg'))
@section('content')
<div class="px-10">
    <div class="relative bg-gradient-to-r bg-gray-100 text-white rounded-xl ">
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
                        class="w-full max-w-lg mx-auto rounded-xl">
                </div>
            </div>
        </div>
    </div>
    <hr>
    {{-- About Camfeba --}}
    <section class="py-12 my-8 bg-gray-100 rounded-xl">
        <div class="max-w-7xl mx-auto px-6 lg:grid lg:grid-cols-2 lg:gap-12 items-center">
            <div>
                <h2 class="text-3xl font-bold">About Our Training</h2>
                <p class="mt-6 text-lg text-gray-600">
                    We conducted 650+ consultancy and training programs and successfully trained 10,000+ participants.
                </p>
            </div>
            <img src="{{ asset('images/aboutus.jpg') }}" alt="About" class="rounded-2xl  mt-10 lg:mt-0">
        </div>
    </section>
    <hr>
    {{-- Service of Camfeba Academy --}}
    <div class="py-12 my-8 bg-gray-100 rounded-xl ">
    <h2 class="text-2xl font-bold text-center mb-8">Our Training Program</h2>

    <!-- Flex container to center cards -->
    <div class="flex flex-wrap justify-center gap-6">
        @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" 
               class="w-64 bg-white dark:bg-gray-800 rounded-xl hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col">
               
                {{-- Cover Image --}}
                <img src="{{ asset('storage/' .$category->cover) }}" 
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