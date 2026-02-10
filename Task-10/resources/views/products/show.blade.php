@extends('layouts.app')

@section('title', 'View Product')

@section('content')
<div class="space-y-6">

    {{-- Page Header --}}
    <div class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Product Details</h1>
            <p class="text-gray-500">View full information about this product</p>
        </div>

        <div class="flex items-center gap-2">
            <a href="{{ route('products.index') }}"
               class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
                ← Back
            </a>

            @can('update', $product)
            <a href="{{ route('products.edit', $product) }}"
               class="px-4 py-2 bg-blue-600 text-white rounded-lg hover:bg-blue-700">
                Edit
            </a>
            @endcan

            @can('delete', $product)
            <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline-block">
                @csrf
                @method('DELETE')
                <button type="button"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 delete-btn"
                        data-name="{{ $product->name }}">
                    Delete
                </button>
            </form>
            @endcan
        </div>
    </div>

    @php
        $imageSrc = $product->image_path
            ? asset('storage/' . $product->image_path)
            : asset('images/placeholder.png');
    @endphp

    {{-- Product Image --}}
    <div class="bg-white rounded-xl shadow p-6">
        <div class="flex items-center justify-between mb-4">
            <h3 class="text-lg font-bold text-gray-800">Product Image</h3>

            @if($product->image_path)
                <a href="{{ $imageSrc }}" target="_blank"
                   class="px-4 py-2 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                    View Full Image
                </a>
            @endif
        </div>

        <div class="image-box">
            <img src="{{ $imageSrc }}" alt="Product Image" class="product-img">
        </div>

        @if(!$product->image_path)
            <p class="text-sm text-gray-500 mt-2">
                No image uploaded for this product. Showing placeholder.
            </p>
        @endif
    </div>

    {{-- Product Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Main Info --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 space-y-5">

            <div class="flex items-start justify-between">
                <div>
                    <h2 class="text-xl font-bold">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500">
                        Created: {{ $product->created_at->diffForHumans() }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-sm text-gray-500">Price</p>
                    <p class="text-2xl font-bold text-purple-700">
                        ${{ number_format((float)$product->price,2) }}
                    </p>
                </div>
            </div>

            <hr>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500">Category</p>
                    <p class="font-semibold">{{ $product->category->name ?? '-' }}</p>
                </div>

                <div class="bg-gray-50 p-4 rounded-lg">
                    <p class="text-sm text-gray-500">Owner</p>
                    <p class="font-semibold">
                        {{ $product->user->name ?? '-' }}
                        @if($product->user?->email)
                            <span class="text-sm text-gray-500">({{ $product->user->email }})</span>
                        @endif
                    </p>
                </div>

            </div>

            {{-- Suppliers --}}
            <div>
                <p class="text-sm text-gray-500 mb-2">Suppliers</p>

                @if($product->suppliers->count())
                    <div class="border rounded-lg overflow-x-auto">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 text-left">Supplier</th>
                                    <th class="p-3 text-left">Email</th>
                                    <th class="p-3 text-left">Cost Price</th>
                                    <th class="p-3 text-left">Lead Time (days)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->suppliers as $supplier)
                                    <tr class="border-t">
                                        <td class="p-3">{{ $supplier->name }}</td>
                                        <td class="p-3">{{ $supplier->email }}</td>
                                        <td class="p-3">${{ number_format((float)$supplier->pivot->cost_price,2) }}</td>
                                        <td class="p-3">{{ $supplier->pivot->lead_time_days }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="bg-yellow-50 text-yellow-700 p-3 rounded-lg">
                        This product has no suppliers.
                    </div>
                @endif

            </div>

        </div>

        {{-- Side Info --}}
        <div class="bg-white rounded-xl shadow p-6 space-y-4">

            <h3 class="text-lg font-bold">Quick Info</h3>

            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500">Product ID</p>
                <p class="font-semibold">#{{ $product->id }}</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500">Suppliers Count</p>
                <p class="font-semibold">{{ $product->suppliers->count() }}</p>
            </div>

            <div class="bg-gray-50 p-4 rounded-lg">
                <p class="text-sm text-gray-500">Last Update</p>
                <p class="font-semibold">{{ $product->updated_at->diffForHumans() }}</p>
            </div>

        </div>

    </div>
</div>

{{-- Delete Modal --}}
<div id="deleteModal" class="fixed inset-0 hidden z-50">
    <div class="absolute inset-0 bg-black/50"></div>

    <div class="relative min-h-screen flex items-center justify-center">
        <div class="bg-white rounded-xl shadow-xl w-full max-w-md p-6">

            <h3 class="text-lg font-bold text-gray-800">Confirm Deletion</h3>
            <p class="text-sm text-gray-500 mt-2">
                Are you sure you want to delete
                <span id="deleteProductName" class="font-semibold"></span> ?
            </p>

            <div class="flex justify-end gap-3 mt-6">
                <button id="cancelDelete"
                        class="px-5 py-2 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel
                </button>

                <button id="confirmDelete"
                        class="px-5 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700">
                    Yes, Delete
                </button>
            </div>

        </div>
    </div>
</div>

{{-- Styles --}}
<style>
.image-box{
    width:100%;
    height:320px;
    border-radius:14px;
    overflow:hidden;
    background:#f3f4f6;
    border:1px solid #e5e7eb;
    display:flex;
    align-items:center;
    justify-content:center;
}

.product-img{
    width:100%;
    height:100%;
    object-fit:contain;
}
</style>

{{-- Scripts --}}
<script>
let deleteForm = null;

document.querySelectorAll('.delete-btn').forEach(btn=>{
    btn.addEventListener('click',function(){
        deleteForm = this.closest('form');
        document.getElementById('deleteProductName').innerText = this.dataset.name;
        document.getElementById('deleteModal').classList.remove('hidden');
    });
});

document.getElementById('cancelDelete').addEventListener('click',()=>{
    document.getElementById('deleteModal').classList.add('hidden');
    deleteForm = null;
});

document.getElementById('confirmDelete').addEventListener('click',()=>{
    if(deleteForm){
        deleteForm.submit();
    }
});
</script>

@endsection