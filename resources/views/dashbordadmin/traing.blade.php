<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard Trainging') }}
        </h2>
    </x-slot>

<div class="w-full py-6 flex justify-center">
  <div class="w-[1200px]">
    <h1 class="text-2xl font-bold mb-4">List All Trainings</h1>
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Insert Training
    </button>

    <!-- Trainings Table -->
    <div class="py-4 flex justify-center">
      <x-bladewind::table bordered="true" class="w-auto">
        <x-slot name="header">
          <tr class="text-center border">
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Title Training</th>
            <th class="border px-4 py-2">Location</th>
            <th class="border px-4 py-2">Category</th>
            <th class="border px-4 py-2">Edit</th>
            <th class="border px-4 py-2">Delete</th>
            <th class="border px-4 py-2">Source</th>
          </tr>
        </x-slot>

        @foreach($cources as $index => $train)
          <tr class="text-center border">
            <!-- No -->
            <td class="border px-4 py-2">{{ $index + 1 }}</td>

            <!-- Image -->
            <td class="border px-4 py-2">
              @if($train->cover)
                <div class="w-[100px] h-[60px] mx-auto">
                  <img src="{{ asset($train->cover) }}" 
                       alt="Training Image" 
                       class="object-cover w-full h-full rounded">
                </div>
              @else
                <span class="text-muted">No image</span>
              @endif
            </td>

            <!-- Title -->
            <td class="border px-4 py-2">{{ $train->title }}</td>

            <!-- Location -->
            <td class="border px-4 py-2">{{ $train->location }}</td>

            <!-- Category -->
            <td class="border px-4 py-2">{{ $train->name }}</td>

            <!-- Edit -->
            <td class="border px-4 py-2">
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editTrainModal-{{ $train->id }}">
                Edit
              </button>
              {{-- Edit Modal --}}
              <div class="modal fade" id="editTrainModal-{{ $train->id }}" tabindex="-1" aria-labelledby="editTrainModalLabel-{{ $train->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title" id="editTrainModalLabel-{{ $train->id }}">Edit Training</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <form action="{{ route('tabletraining.update', $train->id) }}" method="POST" enctype="multipart/form-data">
                      @csrf
                      @method('PUT')
                      <div class="modal-body">
                        <!-- Title -->
                        <div class="mb-3">
                          <label for="title-{{ $train->id }}" class="form-label">Training Title *</label>
                          <input type="text" class="form-control" id="title-{{ $train->id }}" name="title" value="{{ $train->title }}" required>
                        </div>

                        <!-- Cover -->
                        <div class="mb-3">
                          @if($train->cover)
                            <img src="{{ asset($train->cover) }}" alt="Cover" class="mb-2 w-32 h-32 object-cover rounded">
                          @endif
                          <label for="cover-{{ $train->id }}" class="form-label">Cover Image</label>
                          <input type="file" class="form-control" id="cover-{{ $train->id }}" name="cover">
                        </div>

                        <!-- Detail -->
                        <div class="mb-3">
                          <label for="detail-{{ $train->id }}" class="form-label">Detail *</label>
                          <textarea class="form-control" id="detail-{{ $train->id }}" name="detail" rows="4" required>{{ $train->detail }}</textarea>
                        </div>

                        <!-- Price & Member Price -->
                        <div class="row mb-3">
                          <div class="col">
                            <label for="price-{{ $train->id }}" class="form-label">Price</label>
                            <input type="number" class="form-control" id="price-{{ $train->id }}" name="price" value="{{ $train->price }}">
                          </div>
                          <div class="col">
                            <label for="member_price-{{ $train->id }}" class="form-label">Member Price</label>
                            <input type="number" class="form-control" id="member_price-{{ $train->id }}" name="member_price" value="{{ $train->member_price }}">
                          </div>
                        </div>

                        <!-- Location -->
                        <div class="mb-3">
                          <label for="location-{{ $train->id }}" class="form-label">Location</label>
                          <input type="text" class="form-control" id="location-{{ $train->id }}" name="location" value="{{ $train->location }}">
                        </div>

                        <!-- Prepared By -->
                        <div class="mb-3">
                          <label for="prepare_by-{{ $train->id }}" class="form-label">Prepared By *</label>
                          <input type="text" class="form-control" id="prepare_by-{{ $train->id }}" name="prepare_by" value="{{ $train->prepare_by }}">
                        </div>

                        <!-- Drive Link -->
                        <div class="mb-3">
                          <label for="drive_link-{{ $train->id }}" class="form-label">Drive Link</label>
                          <input type="url" class="form-control" id="drive_link-{{ $train->id }}" name="drive_link" value="{{ $train->drive_link }}">
                        </div>

                        <!-- Category -->
                        <div class="mb-3">
                          <label for="category_id-{{ $train->id }}" class="form-label">Category *</label>
                          <select class="form-select" id="category_id-{{ $train->id }}" name="category_id" required>
                            <option value="">-- Select Category --</option>
                            @foreach($categories as $category)
                              <option value="{{ $category->id }}" {{ $train->category_id == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                              </option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Update</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>

            <!-- Delete -->
            <td class="border px-4 py-2">
              <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteTrainModal-{{ $train->id }}">
                Delete
              </button>
              {{-- Delete Modal --}}
              <div class="modal fade" id="deleteTrainModal-{{ $train->id }}" tabindex="-1" aria-labelledby="deleteTrainModalLabel-{{ $train->id }}" aria-hidden="true">
                <div class="modal-dialog">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Delete Training</h5>
                      <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                    </div>
                    <form action="{{ route('tabletraining.destroy', $train->id) }}" method="POST">
                      @csrf
                      @method('DELETE')
                      <div class="modal-body">
                        <p>Are you sure you want to delete <strong>{{ $train->title }}</strong>?</p>
                      </div>
                      <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                        <button type="submit" class="btn btn-danger">Delete</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
            </td>

            <!-- Sources -->
            <td class="border px-4 py-2">
              <a href="{{ route('tabletraining.show', $train->id) }}" class="btn btn-sm btn-info">
                View Sources
              </a>
            </td>
          </tr>
        @endforeach
      </x-bladewind::table>
    </div>
  </div>
</div>

{{-- Insert Training Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title">New Training</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
      </div>
      <form action="{{ route('tabletraining.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-body">
          <!-- Title -->
          <div class="mb-3">
            <label for="title" class="form-label">Training Title *</label>
            <input type="text" class="form-control" id="title" name="title" required>
          </div>

          <!-- Cover -->
          <div class="mb-3">
            <label for="cover" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover" name="cover">
          </div>

          <!-- Detail -->
          <div class="mb-3">
            <label for="detail" class="form-label">Detail *</label>
            <textarea class="form-control" id="detail" name="detail" rows="4" required></textarea>
          </div>

          <!-- Price & Member Price -->
          <div class="row mb-3">
            <div class="col">
              <label for="price" class="form-label">Price</label>
              <input type="number" class="form-control" id="price" name="price">
            </div>
            <div class="col">
              <label for="member_price" class="form-label">Member Price</label>
              <input type="number" class="form-control" id="member_price" name="member_price">
            </div>
          </div>

          <!-- Location -->
          <div class="mb-3">
            <label for="location" class="form-label">Location</label>
            <input type="text" class="form-control" id="location" name="location">
          </div>

          <!-- Prepared By -->
          <div class="mb-3">
            <label for="prepare_by" class="form-label">Prepared By *</label>
            <input type="text" class="form-control" id="prepare_by" name="prepare_by" required>
          </div>

          <!-- Drive Link -->
          <div class="mb-3">
            <label for="drive_link" class="form-label">Drive Link</label>
            <input type="url" class="form-control" id="drive_link" name="drive_link">
          </div>

          <!-- Category -->
          <div class="mb-3">
            <label for="category_id" class="form-label">Category *</label>
            <select class="form-select" id="category_id" name="category_id" required>
              <option value="">-- Select Category --</option>
              @foreach($categories as $category)
                <option value="{{ $category->id }}">{{ $category->name }}</option>
              @endforeach
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Insert Training</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js"></script>
</x-app-layout>
