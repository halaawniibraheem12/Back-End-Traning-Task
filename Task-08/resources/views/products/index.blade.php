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

    {{-- Products Table --}}
    <div class="bg-white rounded-xl shadow overflow-x-auto">

        <table class="w-full">

            <thead class="bg-gray-100">
                <tr>
                    <th class="p-3 text-left">#</th>
                    <th class="p-3 text-left">Name</th>
                    <th class="p-3 text-left">Category</th>
                    <th class="p-3 text-left">Price</th>
                    <th class="p-3 text-left">Suppliers</th>
                    <th class="p-3 text-left">Owner</th>
                    <th class="p-3 text-left">Actions</th>
                </tr>
            </thead>

            <tbody>

            @forelse($products as $product)

                <tr class="border-t hover:bg-gray-50">

                    <td class="p-3">{{ $loop->iteration }}</td>

                    <td class="p-3 font-semibold">
                        {{ $product->name }}
                    </td>

                    <td class="p-3">
                        {{ $product->category->name ?? '-' }}
                    </td>

                    <td class="p-3">
                        ${{ number_format($product->price,2) }}
                    </td>

                    <td class="p-3">
                        {{ $product->suppliers_count ?? $product->suppliers->count() }}
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
                    <td colspan="7" class="p-6 text-center text-gray-500">
                        No products found.
                    </td>
                </tr>
            @endforelse

            </tbody>

        </table>

    </div>

    {{-- Pagination --}}
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
        if(confirm("Are you sure you want to delete this product: "+name+"?")){  
            this.closest('form').submit();
        }
    });
});
</script>

@endsection
