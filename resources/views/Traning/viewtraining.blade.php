@extends('layouts.page')
@section('content')
<div>
<section class="relative bg-gradient-to-r text-black py-4 px-6 rounded-2xl">
    <div class="max-w-6xl mx-auto flex flex-col items-center text-center space-y-10">
        
        <!-- Image on Top with 4:3 Aspect Ratio -->
        <div class="w-[1000px] h-[500px] aspect-[4/3]">
            <img src="{{ asset($category->cover) }}" 
                 alt="Training Courses" 
                 class="w-full h-full object-contain rounded-xl shadow-2xl">
        </div>

        <!-- Name and Description Below -->
        <div class="py-12 my-8 bg-gray-100 rounded-xl shadow-lg px-4">
            <h1 class="text-2xl font-extrabold sm:text-3xl lg:text-4xl ">
                {{ $category->name }}
            </h1>
            <p class="mt-6 text-xl sm:text-xl text-start">
                {{ $category->description }}
            </p>
        </div>
        
    </div>
</section>





    <div class="container mx-auto px-4 py-6">
        <div class="flex flex-wrap justify-center gap-6">
        @foreach ($training as $train)
        
            <div class="bg-white w-[350px] rounded-2xl shadow-md hover:shadow-lg transition p-4 flex flex-col">
                {{-- Training Image --}}
                <img src="{{ asset($train->cover) }}" 
                alt="{{ $train->title }}" 
                class="w-full h-40 object-contain rounded-lg mb-3">


                {{-- Title --}}
                <h3 class="text-lg font-semibold mb-2">{{ $train->title }}</h3>

                {{-- Detail --}}
                <p class="text-sm text-gray-600 flex-1">{{ Str::limit($train->detail, 80) }}</p>

                {{-- Location --}}
                <p class="text-xs text-gray-500 mt-2">📍 {{ $train->location }}</p>

                {{-- Price --}}
                <div class="mt-3">
                    <p class="text-sm text-gray-700">Member: 
                        <span class="font-semibold text-green-600">${{ $train->member_price }}</span>
                    </p>
                    <p class="text-sm text-gray-700">Non-Member: 
                        <span class="font-semibold text-red-600">${{ $train->price }}</span>
                    </p>
                </div>

                {{-- Trainer Name --}}
                <p class="mt-3 text-sm text-gray-800">👨‍🏫 {{ $train->name }}</p>

                {{-- Button --}}
                <button class="mt-4 bg-blue-600 text-white py-2 px-4 rounded-lg hover:bg-blue-700 transition">
                    <a href="{{route('training.show', $train->id)}}">View Details</a>
                </button>
            </div>
        @endforeach
</div>
</div>

</div>
@endsection