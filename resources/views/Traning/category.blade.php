@extends('layouts.page')
@section('content')
<div>
<div class="container mx-auto px-4 py-8">
    <h2 class="text-2xl font-bold text-center mb-8">Categories</h2>
    <!-- Flex container to center cards -->
    <div class="flex flex-wrap justify-center gap-6">
        @foreach ($categories as $category)
            <a href="{{ route('category.show', $category->id) }}" 
               class="w-64 bg-white dark:bg-gray-800 rounded-xl shadow-md hover:shadow-lg transition transform hover:-translate-y-1 flex flex-col">
               
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