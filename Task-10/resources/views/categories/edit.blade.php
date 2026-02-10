{{-- resources/views/categories/edit.blade.php --}}
@extends('layouts.app')

@section('title', 'Edit Category')

@section('content')

<div class="max-w-xl mx-auto space-y-6">

    <!-- Header -->
    <div class="bg-white p-6 rounded-lg shadow">
        <h1 class="text-2xl font-bold text-gray-800">Edit Category</h1>
        <p class="text-gray-500 mt-1">Update category name</p>
    </div>

    <!-- Validation Errors -->
    @if ($errors->any())
        <div class="bg-red-100 text-red-700 p-4 rounded">
            <ul class="list-disc list-inside">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <!-- Update Form -->
    <div class="bg-white p-6 rounded-lg shadow">
        <form method="POST" action="{{ route('categories.update', $category) }}">
            @csrf
            @method('PUT')

            <div class="mb-6">
                <label class="block mb-2 font-semibold">Category Name</label>

                <input type="text"
                       name="name"
                       value="{{ old('name', $category->name) }}"
                       required
                       class="w-full border rounded px-4 py-2 focus:ring-2 focus:ring-blue-500">

                @error('name')
                    <p class="text-red-600 text-sm mt-1">{{ $message }}</p>
                @enderror
            </div>

            <div class="flex justify-end gap-3">
                <a href="{{ route('categories.index') }}"
                   class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </a>

                <button type="submit"
                        class="px-4 py-2 bg-blue-600 text-white rounded hover:bg-blue-700">
                    Update
                </button>
            </div>
        </form>
    </div>

    <!-- Delete Section -->
    <div class="bg-white p-6 rounded-lg shadow flex justify-between items-center">
        <div>
            <p class="font-semibold text-gray-800">Delete Category</p>
            <p class="text-sm text-gray-500">This action cannot be undone.</p>
        </div>

        <!-- Open Modal Button (no browser confirm) -->
        <button type="button"
                id="openDeleteModalBtn"
                class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
            Delete
        </button>
    </div>

</div>

<!-- Delete Modal -->
<div id="deleteModal"
     class="fixed inset-0 z-50 hidden"
     aria-labelledby="modal-title"
     role="dialog"
     aria-modal="true">

    <!-- Backdrop -->
    <div id="deleteModalBackdrop" class="fixed inset-0 bg-black/50"></div>

    <!-- Modal panel -->
    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white w-full max-w-md rounded-xl shadow-2xl overflow-hidden">
            <div class="p-6">
                <h3 id="modal-title" class="text-lg font-bold text-gray-900">
                    Confirm Delete
                </h3>
                <p class="mt-2 text-gray-600">
                    Are you sure you want to delete this category?
                </p>
            </div>

            <div class="px-6 pb-6 flex justify-end gap-3">
                <button type="button"
                        id="cancelDeleteBtn"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </button>

                <form method="POST" action="{{ route('categories.destroy', $category) }}">
                    @csrf
                    @method('DELETE')
                    <button type="submit"
                            class="px-4 py-2 bg-red-600 text-white rounded hover:bg-red-700">
                        Yes, Delete
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        const modal = document.getElementById('deleteModal');
        const openBtn = document.getElementById('openDeleteModalBtn');
        const cancelBtn = document.getElementById('cancelDeleteBtn');
        const backdrop = document.getElementById('deleteModalBackdrop');

        function openModal() {
            modal.classList.remove('hidden');
        }

        function closeModal() {
            modal.classList.add('hidden');
        }

        openBtn.addEventListener('click', openModal);
        cancelBtn.addEventListener('click', closeModal);
        backdrop.addEventListener('click', closeModal);

        // Close on ESC
        document.addEventListener('keydown', function (e) {
            if (e.key === 'Escape' && !modal.classList.contains('hidden')) {
                closeModal();
            }
        });
    });
</script>

@endsection
