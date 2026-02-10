@extends('layouts.app')

@section('title','Products')

@section('content')
@php
    $placeholder = asset('images/placeholder.png');
@endphp

<div class="space-y-6">

    {{-- Header --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-900">Products</h1>
            <p class="text-gray-500">Manage your cosmetic products</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('products.create') }}"
               class="px-5 py-2.5 bg-purple-600 text-white rounded-xl hover:bg-purple-700 shadow-sm">
                + Add Product
            </a>
        </div>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-500 text-white px-5 py-3 rounded-xl flex justify-between items-center shadow-sm">
            <span>{{ session('success') }}</span>
            <button class="w-8 h-8 rounded-lg bg-white/20 hover:bg-white/30"
                    onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-xl flex justify-between items-center shadow-sm">
            <span>{{ session('error') }}</span>
            <button class="w-8 h-8 rounded-lg bg-white/20 hover:bg-white/30"
                    onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif

    {{-- Toolbar (Upgraded Design) --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 p-6">

        <div class="flex items-center justify-between gap-3 mb-4">
            <div>
                <h2 class="text-lg font-bold text-gray-900">Search & Filters</h2>
                <p class="text-sm text-gray-500">Use filters to quickly find products.</p>
            </div>

            <div class="hidden md:flex items-center gap-2 text-xs text-gray-500">
              
                </span>
            </div>
        </div>

        <form method="GET" action="{{ route('products.index') }}" class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">

            {{-- Search --}}
            <div class="md:col-span-2">
                <label class="block text-sm font-semibold text-gray-700 mb-2">Search</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🔍</span>
                    <input type="text"
                           name="search"
                           value="{{ request('search') }}"
                           placeholder="Search by name..."
                           class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-300 focus:ring-2 focus:ring-purple-200 outline-none" />
                </div>
            </div>

            {{-- Category --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Category</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🏷️</span>
                    <select name="category_id"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-300 focus:ring-2 focus:ring-purple-200 outline-none">
                        <option value="">All Categories</option>
                        @foreach($categories as $cat)
                            <option value="{{ $cat->id }}" {{ (string)request('category_id') === (string)$cat->id ? 'selected' : '' }}>
                                {{ $cat->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Supplier --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Supplier</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🚚</span>
                    <select name="supplier_id"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-300 focus:ring-2 focus:ring-purple-200 outline-none">
                        <option value="">All Suppliers</option>
                        @foreach($suppliers as $sup)
                            <option value="{{ $sup->id }}" {{ (string)request('supplier_id') === (string)$sup->id ? 'selected' : '' }}>
                                {{ $sup->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
            </div>

            {{-- Mode --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Match</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">🧩</span>
                    <select name="mode"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-300 focus:ring-2 focus:ring-purple-200 outline-none">
                        <option value="any" {{ request('mode','any') === 'any' ? 'selected' : '' }}>
                            Match ANY
                        </option>
                        <option value="all" {{ request('mode') === 'all' ? 'selected' : '' }}>
                            Match ALL
                        </option>
                    </select>
                </div>
            </div>

            {{-- Sort --}}
            <div>
                <label class="block text-sm font-semibold text-gray-700 mb-2">Sort</label>
                <div class="relative">
                    <span class="absolute left-3 top-1/2 -translate-y-1/2 text-gray-400">↕️</span>
                    <select name="sort"
                            class="w-full pl-10 pr-4 py-2.5 rounded-xl border border-gray-200 bg-gray-50 focus:bg-white focus:border-purple-300 focus:ring-2 focus:ring-purple-200 outline-none">
                        <option value="created_at_desc" {{ request('sort','created_at_desc') === 'created_at_desc' ? 'selected' : '' }}>
                            Newest → Oldest
                        </option>
                        <option value="created_at_asc" {{ request('sort') === 'created_at_asc' ? 'selected' : '' }}>
                            Oldest → Newest
                        </option>

                        @if(!empty($hasPrice))
                            <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                                Price: Low → High
                            </option>
                            <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                                Price: High → Low
                            </option>
                        @endif

                        <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>
                            Name: A → Z
                        </option>
                        <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>
                            Name: Z → A
                        </option>
                    </select>
                </div>
            </div>

            {{-- Actions --}}
            <div class="md:col-span-6 flex flex-col md:flex-row md:items-center md:justify-between gap-3 mt-2">
                <div class="flex flex-wrap items-center gap-2">
                    @if(request('search'))
                        <span class="px-3 py-1.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200 text-xs">
                            🔍 {{ request('search') }}
                        </span>
                    @endif

                    @if(request('category_id'))
                        <span class="px-3 py-1.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200 text-xs">
                            🏷️ Category Selected
                        </span>
                    @endif

                    @if(request('supplier_id'))
                        <span class="px-3 py-1.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200 text-xs">
                            🚚 Supplier Selected
                        </span>
                    @endif

                    @if(request('mode') === 'all')
                        <span class="px-3 py-1.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200 text-xs">
                            🧩 Match ALL
                        </span>
                    @endif
                </div>

                <div class="flex items-center gap-2">
                    <button type="submit"
                            class="px-5 py-2.5 bg-purple-600 text-white rounded-xl hover:bg-purple-700 font-semibold shadow-sm">
                        Apply
                    </button>

                    <a href="{{ route('products.index') }}"
                       class="px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 font-semibold border border-gray-200">
                        Reset
                    </a>
                </div>
            </div>

        </form>

        <p class="mt-4 text-sm text-gray-500">
            Tip: <span class="font-medium">Match ANY</span> shows results that match any option.
            <span class="font-medium">Match ALL</span> requires all selected options.
        </p>
    </div>

    {{-- Table Card --}}
    <div class="bg-white rounded-2xl shadow-sm border border-gray-100 overflow-hidden">

        {{-- Top Bar --}}
        <div class="px-6 py-4 border-b border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
            <div class="flex items-center gap-3">
                <div class="w-10 h-10 rounded-xl bg-purple-50 flex items-center justify-center text-purple-700 font-bold">
                    {{ $products->total() }}
                </div>

                <div>
                    <p class="font-semibold text-gray-900">All Products</p>
                    <p class="text-xs text-gray-500">
                        Showing {{ $products->count() }} of {{ $products->total() }}
                        @if(request('search'))
                            <span class="ml-2 px-2 py-0.5 rounded-full bg-gray-100 text-gray-700 border border-gray-200">
                                Search: "{{ request('search') }}"
                            </span>
                        @endif
                    </p>
                </div>
            </div>
        </div>

        {{-- Table --}}
        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-gray-50">
                    <tr class="text-left text-xs font-semibold text-gray-600 uppercase tracking-wider">
                        <th class="px-6 py-4 w-16">#</th>
                        <th class="px-6 py-4 w-28">Image</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Category</th>
                        <th class="px-6 py-4">Price</th>
                        <th class="px-6 py-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-100">
                @forelse($products as $product)
                    @php
                        $img = $product->image_path ? asset('storage/' . $product->image_path) : $placeholder;
                    @endphp

                    <tr class="hover:bg-purple-50/30 transition">
                        <td class="px-6 py-4 text-sm text-gray-700">
                            {{ $products->firstItem() + $loop->index }}
                        </td>

                        <td class="px-6 py-4">
                            <div class="w-16 h-16 rounded-xl overflow-hidden bg-gray-100 border border-gray-200 shadow-sm">
                                <img src="{{ $img }}"
                                     alt="Product image"
                                     class="w-full h-full object-cover"
                                     onerror="this.onerror=null;this.src='{{ $placeholder }}';">
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex flex-col">
                                <span class="font-semibold text-gray-900">{{ $product->name }}</span>
                                <span class="text-xs text-gray-500">ID #{{ $product->id }}</span>
                            </div>
                        </td>

                        <td class="px-6 py-4">
                            <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 border border-indigo-100">
                                {{ $product->category->name ?? '-' }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <span class="font-bold text-gray-900">
                                ${{ number_format((float)($product->price ?? 0), 2) }}
                            </span>
                        </td>

                        <td class="px-6 py-4">
                            <div class="flex items-center justify-end gap-2">
                                <a href="{{ route('products.show', $product) }}"
                                   class="px-3 py-2 rounded-lg bg-purple-50 text-purple-700 hover:bg-purple-100 text-sm font-semibold">
                                    View
                                </a>

                                @can('update', $product)
                                    <a href="{{ route('products.edit', $product) }}"
                                       class="px-3 py-2 rounded-lg bg-blue-50 text-blue-700 hover:bg-blue-100 text-sm font-semibold">
                                        Edit
                                    </a>
                                @endcan

                                @can('delete', $product)
                                    <form method="POST" action="{{ route('products.destroy', $product) }}" class="m-0">
                                        @csrf
                                        @method('DELETE')
                                        <button type="button"
                                                class="px-3 py-2 rounded-lg bg-red-50 text-red-700 hover:bg-red-100 text-sm font-semibold delete-btn"
                                                data-name="{{ $product->name }}">
                                            Delete
                                        </button>
                                    </form>
                                @endcan
                            </div>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="6" class="px-6 py-14 text-center">
                            <div class="mx-auto max-w-md">
                                <div class="w-14 h-14 mx-auto rounded-2xl bg-gray-100 flex items-center justify-center text-gray-500 text-xl">
                                    🧴
                                </div>
                                <p class="mt-4 font-semibold text-gray-900">
                                    @if(request('search'))
                                        No results for "{{ request('search') }}"
                                    @else
                                        No products found
                                    @endif
                                </p>
                                <p class="text-sm text-gray-500">
                                    @if(request('search'))
                                        Try a different keyword or clear the search.
                                    @else
                                        Add your first product to get started.
                                    @endif
                                </p>

                                <div class="mt-5 flex items-center justify-center gap-2">
                                    @if(request('search'))
                                        <a href="{{ route('products.index') }}"
                                           class="inline-flex px-5 py-2.5 bg-gray-100 text-gray-700 rounded-xl hover:bg-gray-200 border border-gray-200 font-semibold">
                                            Clear Search
                                        </a>
                                    @endif

                                    <a href="{{ route('products.create') }}"
                                       class="inline-flex px-5 py-2.5 bg-purple-600 text-white rounded-xl hover:bg-purple-700 shadow-sm font-semibold">
                                        + Add Product
                                    </a>
                                </div>
                            </div>
                        </td>
                    </tr>
                @endforelse
                </tbody>
            </table>
        </div>

        {{-- Pagination --}}
        <div class="px-6 py-4 border-t border-gray-100">
            {{ $products->links() }}
        </div>
    </div>

</div>

{{-- Delete Modal --}}
<div id="deleteModal" class="fixed inset-0 hidden z-50">
    <div id="deleteBackdrop" class="absolute inset-0 bg-black/50"></div>

    <div class="relative min-h-screen flex items-center justify-center p-4">
        <div class="w-full max-w-md bg-white rounded-2xl shadow-2xl overflow-hidden border border-gray-100">
            <div class="p-6">
                <div class="flex items-start justify-between gap-4">
                    <div class="flex items-start gap-3">
                        <div class="w-10 h-10 rounded-xl bg-red-50 flex items-center justify-center text-red-700 text-lg">!</div>
                        <div>
                            <h3 class="text-lg font-bold text-gray-900">Confirm Deletion</h3>
                            <p class="text-sm text-gray-500 mt-1">
                                Are you sure you want to delete
                                <span class="font-semibold text-gray-900" id="deleteProductName"></span>?
                            </p>
                            <p class="text-xs text-gray-400 mt-2">This action cannot be undone.</p>
                        </div>
                    </div>

                    <button type="button" id="closeDeleteModal"
                            class="w-9 h-9 rounded-xl bg-gray-100 text-gray-700 hover:bg-gray-200 flex items-center justify-center">
                        ✕
                    </button>
                </div>
            </div>

            <div class="px-6 py-4 bg-gray-50 flex items-center justify-end gap-3">
                <button type="button" id="cancelDelete"
                        class="px-5 py-2 bg-gray-200 text-gray-800 rounded-xl hover:bg-gray-300 font-semibold">
                    Cancel
                </button>

                <button type="button" id="confirmDelete"
                        class="px-5 py-2 bg-red-600 text-white rounded-xl hover:bg-red-700 font-semibold">
                    Yes, Delete
                </button>
            </div>
        </div>
    </div>
</div>

<script>
let deleteForm = null;

function openDeleteModal(name, form) {
    deleteForm = form;
    document.getElementById('deleteProductName').innerText = name || 'this product';
    document.getElementById('deleteModal').classList.remove('hidden');
}

function closeDeleteModal() {
    document.getElementById('deleteModal').classList.add('hidden');
    deleteForm = null;
}

document.querySelectorAll('.delete-btn').forEach(btn => {
    btn.addEventListener('click', function () {
        const form = this.closest('form');
        openDeleteModal(this.dataset.name, form);
    });
});

document.getElementById('cancelDelete').addEventListener('click', closeDeleteModal);
document.getElementById('closeDeleteModal').addEventListener('click', closeDeleteModal);
document.getElementById('deleteBackdrop').addEventListener('click', closeDeleteModal);

document.getElementById('confirmDelete').addEventListener('click', function () {
    if (deleteForm) deleteForm.submit();
});
</script>

@endsection