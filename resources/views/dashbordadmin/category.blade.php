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
              <button class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#editCategoryModal-{{ $category->id }}">
                Edit
              </button>
            </td>
            <td class="border px-4 py-2">
              <button class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#deleteCategoryModal-{{ $category->id }}">
                Delete
              </button>
            </td>
          </tr>

          {{-- Edit & Delete Modals (your previous modal code here) --}}
        @endforeach
      </x-bladewind::table>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.7/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
</x-app-layout>
