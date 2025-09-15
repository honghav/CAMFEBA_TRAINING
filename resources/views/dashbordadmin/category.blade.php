<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Admin Dashboard Category') }}
        </h2>
    </x-slot>

<div class="w-full py-4 flex justify-center">
  <div class="w-[1400px]">
    <button type="button" class="btn btn-primary mb-4" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Insert Category
    </button>

    <!-- Categories Table -->
    <div class="py-4 flex justify-center">
      <x-bladewind::table bordered="false" class="w-auto" striped="true">
        <x-slot name="header">
          <tr class="text-center">
            <th class="border px-4 py-2">No</th>
            <th class="border px-4 py-2">Image</th>
            <th class="border px-4 py-2">Category Name</th>
            <th class="border px-4 py-2">Description</th>
            <th class="border px-4 py-2">Edit</th>
            <th class="border px-4 py-2">Delete</th>
          </tr>
        </x-slot>
    
        @foreach($categories as $index => $category)
          <tr class="text-center">
            <td class="border px-4 py-2">{{ $index + 1 }}</td>
            <td class="border px-4 py-2">
              @if($category->cover)
                <img src="{{ asset('storage/' . $category->cover) }}" alt="Category Image" width="80" class="rounded">
              @else
                <span class="text-muted">No image</span>
              @endif
            </td>
            <td class="border px-4 py-2">{{ $category->name }}</td>
            <td class="border px-4 py-2">{{ $category->description }}</td>
            <td class="border px-4 py-2">
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#manageCategoryModal-{{ $category->id }}">
                Edit
              </button>
            </td>
            <td class="border px-4 py-2">
              <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal-{{ $category->id }}">
                Delete
              </button>
            </td>
          </tr>

          {{-- Manage Category Modal --}}
          <div class="modal fade" id="manageCategoryModal-{{ $category->id }}" tabindex="-1" aria-labelledby="manageCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('tablecategory.update', $category->id) }}" method="POST" enctype="multipart/form-data">
                  @csrf
                  @method('PUT')
                  <div class="modal-header">
                    <h5 class="modal-title" id="manageCategoryModalLabel-{{ $category->id }}">Manage Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <!-- Category Name -->
                    <div class="mb-3">
                      <label for="name-{{ $category->id }}" class="form-label">Category Name</label>
                      <input type="text" class="form-control" id="name-{{ $category->id }}" name="name" value="{{ $category->name }}" required>
                    </div>
                    <!-- Description -->
                    <div class="mb-3">
                      <label for="description-{{ $category->id }}" class="form-label">Description</label>
                      <textarea class="form-control" id="description-{{ $category->id }}" name="description" rows="3" required>{{ $category->description }}</textarea>
                    </div>
                    <!-- Cover Image -->
                    <div class="mb-3">
                      @if($category->cover)
                        <div class="mb-2">
                          <img src="{{ asset('storage/' . $category->cover) }}" alt="Category Image" class="img-fluid rounded" style="max-height:100px;">
                        </div>
                      @endif
                      <label for="cover-{{ $category->id }}" class="form-label">Cover Image</label>
                      <input type="file" class="form-control" id="cover-{{ $category->id }}" name="cover" accept="image/*">
                    </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save Changes</button>
                  </div>
                </form>
              </div>
            </div>
          </div>

          {{-- Delete Category Modal --}}
          <div class="modal fade" id="deleteCategoryModal-{{ $category->id }}" tabindex="-1" aria-labelledby="deleteCategoryModalLabel-{{ $category->id }}" aria-hidden="true">
            <div class="modal-dialog">
              <div class="modal-content">
                <form action="{{ route('tablecategory.destroy', $category->id) }}" method="POST">
                  @csrf
                  @method('DELETE')
                  <div class="modal-header">
                    <h5 class="modal-title" id="deleteCategoryModalLabel-{{ $category->id }}">Delete Category</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                  </div>
                  <div class="modal-body">
                    <p>Are you sure you want to delete the category "<strong>{{ $category->name }}</strong>"?</p>
                    <p>This action cannot be undone.</p>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                    <button type="submit" class="btn btn-danger">Delete Category</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        @endforeach
      </x-bladewind::table>
    </div>
  </div>
</div>

{{-- Insert Category Modal --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="insertCategoryLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <form action="{{ route('tablecategory.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="modal-header">
          <h5 class="modal-title" id="insertCategoryLabel">Insert Category</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <!-- Category Name -->
          <div class="mb-3">
            <label for="name" class="form-label">Category Name <span class="text-danger">*</span></label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Enter category name" required>
          </div>
          <!-- Description -->
          <div class="mb-3">
            <label for="description" class="form-label">Description <span class="text-danger">*</span></label>
            <textarea class="form-control" id="description" name="description" rows="3" placeholder="Enter description" required></textarea>
          </div>
          <!-- Cover Image -->
          <div class="mb-3">
            <label for="cover" class="form-label">Cover Image</label>
            <input type="file" class="form-control" id="cover" name="cover" accept="image/*">
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Save Category</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</x-app-layout>
