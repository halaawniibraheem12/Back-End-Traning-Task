@extends('layouts.app')

@section('title','Products')

@section('content')

<div class="space-y-6">

    {{-- Page Header --}}
    <div class="bg-white rounded-xl shadow p-6 flex justify-between items-center">
        <div>
            <h1 class="text-2xl font-bold">Products</h1>
            <p class="text-gray-500">Manage your cosmetic products</p>
        </div>

        <a href="{{ route('products.create') }}"
           class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
            + Add Product
        </a>
    </div>

    {{-- Flash Messages --}}
    @if(session('success'))
        <div class="bg-green-500 text-white px-5 py-3 rounded-lg flex justify-between">
            <span>{{ session('success') }}</span>
            <button onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif

    @if(session('error'))
        <div class="bg-red-500 text-white px-5 py-3 rounded-lg flex justify-between">
            <span>{{ session('error') }}</span>
            <button onclick="this.parentElement.remove()">✕</button>
        </div>
    @endif

    {{-- Toolbar: Search + Filters + Mode + Sort --}}
    <div class="bg-white rounded-xl shadow p-6">
        <form method="GET" action="{{ route('products.index') }}"
              class="grid grid-cols-1 md:grid-cols-6 gap-4 items-end">

            {{-- Search --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Search</label>
                <input type="text"
                       name="search"
                       value="{{ request('search') }}"
                       placeholder="Search by name..."
                       class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500" />
            </div>

            {{-- Category Filter (category_id) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Category</label>
                <select name="category_id"
                        class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                    <option value="">All Categories</option>
                    @foreach($categories as $cat)
                        <option value="{{ $cat->id }}" {{ (string)request('category_id') === (string)$cat->id ? 'selected' : '' }}>
                            {{ $cat->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Supplier Filter (supplier_id) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Supplier</label>
                <select name="supplier_id"
                        class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                    <option value="">All Suppliers</option>
                    @foreach($suppliers as $sup)
                        <option value="{{ $sup->id }}" {{ (string)request('supplier_id') === (string)$sup->id ? 'selected' : '' }}>
                            {{ $sup->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Mode Dropdown (ANY / ALL) --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Match</label>
                <select name="mode"
                        class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">
                    <option value="any" {{ request('mode','any') === 'any' ? 'selected' : '' }}>
                        Match ANY 
                    </option>
                    <option value="all" {{ request('mode') === 'all' ? 'selected' : '' }}>
                        Match ALL 
                    </option>
                </select>
            </div>

            {{-- Sort Dropdown --}}
            <div>
                <label class="block text-sm font-medium text-gray-700 mb-1">Sort</label>
                <select name="sort"
                        class="w-full rounded-lg border-gray-300 focus:border-purple-500 focus:ring-purple-500">

                    {{-- Date --}}
                    <option value="created_at_desc" {{ request('sort','created_at_desc') === 'created_at_desc' ? 'selected' : '' }}>
                        Newest → Oldest
                    </option>
                    <option value="created_at_asc" {{ request('sort') === 'created_at_asc' ? 'selected' : '' }}>
                        Oldest → Newest
                    </option>

                    {{-- Price (only if exists) --}}
                    @if(!empty($hasPrice))
                        <option value="price_asc" {{ request('sort') === 'price_asc' ? 'selected' : '' }}>
                            Price: Low → High
                        </option>
                        <option value="price_desc" {{ request('sort') === 'price_desc' ? 'selected' : '' }}>
                            Price: High → Low
                        </option>
                    @endif

                    {{-- Name fallback --}}
                    <option value="name_asc" {{ request('sort') === 'name_asc' ? 'selected' : '' }}>
                        Name: A → Z
                    </option>
                    <option value="name_desc" {{ request('sort') === 'name_desc' ? 'selected' : '' }}>
                        Name: Z → A
                    </option>

                </select>
            </div>

            {{-- Buttons --}}
            <div class="flex gap-2">
                <button type="submit"
                        class="px-5 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                    Apply
                </button>

                <a href="{{ route('products.index') }}"
                   class="px-5 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                    Reset
                </a>
            </div>

        </form>

        {{-- Optional helper text --}}
        <p class="mt-3 text-sm text-gray-500">
            Tip: <span class="font-medium">Match ANY</span> shows results that match any option.
            <span class="font-medium">Match ALL</span> requires all selected options.
        </p>
    </div>

    {{-- Products Table --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Category</th>

                    {{-- Price header only if exists --}}
                    @if(!empty($hasPrice))
                        <th class="p-3 text-left">Price</th>
                    @endif

                    <th class="p-3 text-left">Suppliers</th>
                    <th class="p-3 text-left">Owner</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($products as $product)

                <tr class="border-t hover:bg-gray-50">

                    {{-- consistent numbering with pagination --}}
                    <td class="p-3">
                        {{ $products->firstItem() + $loop->index }}
                    </td>

                    <td class="p-3 font-semibold">
                        {{ $product->name }}
                    </td>

                    <td class="p-3">
                        {{ $product->category->name ?? '-' }}
                    </td>

                    {{-- Price cell only if exists --}}
                    @if(!empty($hasPrice))
                        <td class="p-3">
                            @if(!is_null($product->price))
                                ${{ number_format((float)$product->price, 2) }}
                            @else
                                -
                            @endif
                        </td>
                    @endif

                    {{-- show suppliers names (from accessor supplier_name) --}}
                    <td class="p-3">
                        {{ $product->supplier_name ?? '-' }}
                    </td>

                    <td class="p-3">
                        {{ $product->user->name ?? '-' }}
                    </td>

                    <td class="p-3">

                        <div class="actions-cell">

                            <a href="{{ route('products.show',$product) }}"
                               class="btn-view">
                                View
                            </a>

                            @can('update',$product)
                            <a href="{{ route('products.edit',$product) }}"
                               class="btn-edit">
                                Edit
                            </a>
                            @endcan

                            @can('delete',$product)
                            <form method="POST"
                                  action="{{ route('products.destroy',$product) }}"
                                  class="delete-form">
                                @csrf
                                @method('DELETE')

                                <button type="submit"
                                        class="btn-delete"
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
                    {{-- colspan dynamic حسب وجود price --}}
                    <td colspan="{{ !empty($hasPrice) ? 7 : 6 }}" class="p-6 text-center text-gray-500">
                        No products found matching your criteria.
                    </td>
                </tr>
            @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination (keeps query options automatically because controller uses withQueryString()) --}}
    <div>
        {{ $products->links() }}
    </div>

</div>

{{-- Styles --}}
<style>
.actions-cell{
    display:flex;
    gap:8px;
    align-items:center;
    flex-wrap:nowrap;
}

.delete-form{
    margin:0;
}

.btn-view{
    background:#ede9fe;
    color:#6b21a8;
    padding:6px 12px;
    border-radius:6px;
}

.btn-edit{
    background:#dbeafe;
    color:#1d4ed8;
    padding:6px 12px;
    border-radius:6px;
}

.btn-delete{
    background:#fee2e2;
    color:#b91c1c;
    padding:6px 12px;
    border-radius:6px;
    border:none;
}

.btn-view:hover{ background:#ddd6fe; }
.btn-edit:hover{ background:#bfdbfe; }
.btn-delete:hover{ background:#fecaca; }
</style>

{{-- Delete Confirmation --}}
<script>
document.querySelectorAll('.btn-delete').forEach(btn=>{
    btn.addEventListener('click',function(e){
        e.preventDefault();
        let name = this.dataset.name;
        if(confirm("Are you sure you want to delete this product: " + name + "?")){
            this.closest('form').submit();
        }
    });
});
</script>

@endsection