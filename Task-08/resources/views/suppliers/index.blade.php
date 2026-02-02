@extends('layouts.app')

@section('title', 'Suppliers')

@section('content')
<div class="space-y-8">

    <!-- Header -->
    <div class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">
                Suppliers
            </h1>
            <p class="text-gray-500">Manage your suppliers</p>
        </div>

        <a href="{{ route('suppliers.create') }}"
           class="px-5 py-2 bg-green-600 text-white rounded-lg hover:bg-green-700">
            + Add Supplier
        </a>
    </div>

    <!-- Flash -->
    @if(session('success'))
        <div class="p-4 bg-green-100 text-green-800 rounded">
            {{ session('success') }}
        </div>
    @endif

    <!-- Table -->
    <div class="bg-white rounded-xl shadow overflow-hidden">
        <table class="w-full">
            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Email</th>
                    <th class="p-3 text-left">Products</th>
                    <th class="p-3 text-right">Actions</th>
                </tr>
            </thead>

            <tbody>
                @forelse($suppliers as $supplier)
                    <tr class="border-t hover:bg-gray-50">
                        <td class="p-3">{{ $supplier->id }}</td>

                        <td class="p-3 font-semibold">
                            {{ $supplier->name }}
                        </td>

                        <td class="p-3">
                            {{ $supplier->email ?? '-' }}
                        </td>

                        <td class="p-3">
                            {{ $supplier->products_count ?? 0 }}
                        </td>

                        <td class="p-3">
                            <div class="flex justify-end gap-2">

                                <!-- Edit -->
                                <a href="{{ route('suppliers.edit', $supplier) }}"
                                   class="px-3 py-1 bg-blue-100 text-blue-700 rounded hover:bg-blue-200">
                                    Edit
                                </a>

                                <!-- Delete (Modal) -->
                                <button type="button"
                                        data-action="{{ route('suppliers.destroy', $supplier) }}"
                                        class="open-delete-modal px-3 py-1 bg-red-100 text-red-700 rounded hover:bg-red-200">
                                    Delete
                                </button>

                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="5" class="p-6 text-center text-gray-500">
                            No suppliers found.
                        </td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </div>

    <!-- Pagination -->
    <div>
        {{ $suppliers->links() }}
    </div>

</div>

<!-- DELETE MODAL -->
<div id="deleteModal" class="fixed inset-0 z-50 hidden">
    <div id="deleteBackdrop" class="fixed inset-0 bg-black/50"></div>

    <div class="fixed inset-0 flex items-center justify-center p-4">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md">

            <div class="p-6">
                <h3 class="text-lg font-bold">Confirm Delete</h3>
                <p class="text-gray-600 mt-2">
                    Are you sure you want to delete this supplier?
                </p>
            </div>

            <div class="px-6 pb-6 flex justify-end gap-3">

                <button id="cancelDelete"
                        type="button"
                        class="px-4 py-2 bg-gray-200 rounded hover:bg-gray-300">
                    Cancel
                </button>

                <form id="deleteForm" method="POST">
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

<!-- Scripts -->
<script>
document.addEventListener('DOMContentLoaded', function () {

    const modal = document.getElementById('deleteModal');
    const backdrop = document.getElementById('deleteBackdrop');
    const cancelBtn = document.getElementById('cancelDelete');
    const form = document.getElementById('deleteForm');

    document.querySelectorAll('.open-delete-modal').forEach(btn => {
        btn.addEventListener('click', function () {
            form.action = this.dataset.action;
            modal.classList.remove('hidden');
        });
    });

    function closeModal() {
        modal.classList.add('hidden');
        form.action = '';
    }

    cancelBtn.addEventListener('click', closeModal);
    backdrop.addEventListener('click', closeModal);

    document.addEventListener('keydown', function(e){
        if(e.key === 'Escape'){
            closeModal();
        }
    });

});
</script>
@endsection
