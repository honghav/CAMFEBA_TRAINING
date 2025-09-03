@extends('layouts.page')
@section('content')
<div class="">
    {{-- {{$training->id}} --}}
    {{-- <div class="container mx-auto px-4 py-8">
    <div class="grid grid-cols-1 sm:grid-cols-2 md:grid-cols-3 lg:grid-cols-5 gap-6"> --}}
        {{-- @foreach ($training as $train) --}}
            <div class="bg-white dark:bg-gray-800 rounded-2xl shadow hover:shadow-lg transition flex flex-col p-12">
                
                {{-- Cover Image --}}
                <div class="w-full h-80">

                    <img src="{{ asset('storage/' . $training->cover) }}" 
                    alt="{{ $training->title }}" 
                    class="w-full h-full object-contain rounded-lg mb-3">
                </div>
                    
                {{-- Title --}}
                <h3 class="text-2xl font-semibold text-gray-900 dark:text-white mb-2 text-center mt-4">
                    {{ $training->title }}
                </h3>

                {{-- Detail --}}
                <div class="text-sm text-gray-700 dark:text-gray-300 mb-2 py-2">
                    {!! $training->detail !!}
                </div>

                {{-- Location --}}
                <p class="text-xs text-gray-500 mb-1">📍 {{ $training->location }}</p>

                {{-- Prepared By --}}
                <p class="text-xs text-gray-500 mb-3">👨‍🏫 {{ $training->prepare_by }}</p>

                {{-- Prices --}}
                <div class="mt-auto">
                    <p class="text-sm text-gray-700 dark:text-gray-200">
                        Member: <span class="font-semibold text-green-600">${{ $training->member_price }}</span>
                    </p>
                    <p class="text-sm text-gray-700 dark:text-gray-200">
                        Non-Member: <span class="font-semibold text-red-600">${{ $training->price }}</span>
                    </p>
                </div>

                {{-- Drive Link --}}
                @if($training->drive_link)
                <button >
                    <a href="{{ $training->drive_link }}" target="_blank" 
                       class="mt-3 inline-block bg-blue-600 text-white text-sm px-4 py-2 rounded-lg hover:bg-blue-700 transition">
                        Read More Detail
                    </a>
                </button>
                @endif
                <h1 class="my-2 text-center">Activity</h1>
                <div class="flex flex-wrap justify-center items-center gap-4 mt-4">
                    @foreach ($sources as $sou)
                        @if($sou->image)
                            <div class="w-48 h-48 bg-gray-200 p-2 rounded-lg flex justify-center items-center cursor-pointer">
                                <img src="{{ asset('storage/' . $sou->image) }}" 
                                    alt="Preview Image" 
                                    class="w-full h-full object-contain rounded-lg"
                                    data-bs-toggle="modal" 
                                    data-bs-target="#previewModal-{{ $sou->id }}">
                            </div>

                            <!-- Image Preview Modal -->
                            <div class="modal fade" id="previewModal-{{ $sou->id }}" tabindex="-1" aria-hidden="true">
                            <div class="modal-dialog modal-dialog-centered modal-lg">
                                <div class="modal-content">
                                <div class="modal-body p-0">
                                    <img src="{{ asset('storage/' . $sou->image) }}" 
                                        alt="Preview Image" 
                                        class="w-full h-full object-contain">
                                </div>
                                <div class="modal-footer justify-between">
                                    <!-- Download Button -->
                                    <a href="{{ asset('storage/' . $sou->image) }}" 
                                    download 
                                    class="btn btn-success">
                                        Download
                                    </a>
                                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                                        Close
                                    </button>
                                </div>
                                </div>
                            </div>
                            </div>
                        @endif
                    @endforeach
                </div>

                <!-- Bootstrap 5 JS -->
                <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>

            </div>
        {{-- @endforeach --}}
    {{-- </div>
</div> --}}

</div>
@endsection
