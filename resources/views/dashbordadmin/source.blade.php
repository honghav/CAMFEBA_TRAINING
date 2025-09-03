<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard Source Of Training ') }}
        </h2>
    </x-slot>

    <!-- Add Training Images Trigger -->
    <div class="my- p-4">
        <button data-bs-toggle="modal" data-bs-target="#uploadModal" 
            class="px-5 py-2 bg-blue-600 text-white rounded-lg shadow hover:bg-blue-700 transition">
            + Add Training Images
        </button>
    </div>

    <!-- Table -->
    <div class="bg-white shadow rounded-lg overflow-hidden p-4">
        <x-bladewind::table bordered="true" class="w-auto">
        <x-slot name="header">
          <tr class="text-center border">
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Title Training</th>
            <th class="border px-4 py-2">Location</th>
            </tr>
        </x-slot>

            @foreach ($sources as $sou)
                <tr class="text-center hover:bg-gray-50 transition">
                    {{-- No --}}
                    <td class="text-center border p-4">
                        {{ $loop->iteration }}
                    </td>
                    <!-- Image -->
                    <td class=" border p-4">
                        @if($sou->image)
                            <div class="w-[160px] h-[100px] mx-auto">
                                <img src="{{ asset('storage/' . $sou->image) }}" 
                                    alt="Source Image" 
                                    class="object-cover w-full h-full rounded shadow-sm">
                            </div>
                        @else
                            <span class="text-gray-400">No image</span>
                        @endif
                    </td>

                    <!-- Training Title -->
                    <td class="p-4 font-medium border text-gray-700">
                        {{ $sou->training->title ?? 'N/A' }}
                    </td>

                    <!-- Delete Button -->
                    <td class=" border p-4">
                        <button class="px-3 py-1 text-sm rounded bg-red-600 text-white hover:bg-red-700 transition"
                                data-bs-toggle="modal" 
                                data-bs-target="#deleteModal-{{ $sou->id }}">
                            Delete
                        </button>
                    </td>
                </tr>

                <!-- Delete Confirmation Modal -->
                <div class="modal fade" id="deleteModal-{{ $sou->id }}" tabindex="-1" aria-hidden="true">
                  <div class="modal-dialog modal-dialog-centered">
                    <div class="modal-content shadow-lg">
                      
                      <div class="modal-header border-0">
                        <h5 class="modal-title fw-bold">Delete Confirmation</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                      </div>
                      
                      <div class="modal-body text-center">
                        <p class="text-gray-600">Are you sure you want to delete this image?</p>
                      </div>
                      
                      <div class="modal-footer border-0 d-flex justify-content-center gap-2">
                        <form method="POST" action="{{ route('tablesource.destroy', $sou->id) }}">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger px-4">Yes, Delete</button>
                        </form>
                        <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">
                            Cancel
                        </button>
                      </div>
                    </div>
                  </div>
                </div>
            @endforeach
        </x-bladewind::table>
    </div>

    <!-- Upload Modal -->
    <div class="modal fade" id="uploadModal" tabindex="-1" aria-hidden="true">
      <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content p-4 shadow-lg rounded-lg">
          <div class="modal-header border-0">
            <h5 class="modal-title fw-bold">Upload Training Images</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
          </div>

          <div class="modal-body">
            <form method="POST" action="{{ route('tablesource.store') }}" enctype="multipart/form-data">
                @csrf

                <!-- Multi Image Upload -->
                <div class="mb-4">
                    <label for="images" class="form-label fw-bold">Upload Images</label>
                    <input type="file" name="images[]" id="images" 
                        accept=".jpg,.jpeg,.png,.gif,.webp"
                        multiple
                        class="form-control @error('images') is-invalid @enderror">
                    @error('images')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                    @error('images.*')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Detail -->
                <div class="mb-4">
                    <label for="detail" class="form-label fw-bold">Detail (Optional)</label>
                    <input type="text" name="detail" id="detail" 
                        value="{{ old('detail') }}"
                        maxlength="255"
                        class="form-control @error('detail') is-invalid @enderror">
                    @error('detail')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Training Select -->
                <div class="mb-4">
                    <label for="training_id" class="form-label fw-bold">Select Training</label>
                    <input type="text" name="training_id" id="training_id" 
                        value="{{ $training }}"
                        readonly
                        class="form-control bg-light @error('training_id') is-invalid @enderror" required>
                    @error('training_id')
                        <div class="invalid-feedback">{{ $message }}</div>
                    @enderror
                </div>

                <!-- Actions -->
                <div class="d-flex justify-content-end gap-2">
                    <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-primary px-4">Save</button>
                </div>
            </form>
          </div>
        </div>
      </div>
    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
