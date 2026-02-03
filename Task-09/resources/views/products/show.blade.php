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
            <form method="POST" action="{{ route('products.destroy', $product) }}" class="inline-block delete-form">
                @csrf
                @method('DELETE')
                <button type="submit"
                        class="px-4 py-2 bg-red-600 text-white rounded-lg hover:bg-red-700 btn-delete"
                        data-name="{{ $product->name }}">
                    Delete
                </button>
            </form>
            @endcan
        </div>
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

    {{-- Product Info --}}
    <div class="grid grid-cols-1 lg:grid-cols-3 gap-6">

        {{-- Main Card --}}
        <div class="lg:col-span-2 bg-white rounded-xl shadow p-6 space-y-5">

            <div class="flex items-start justify-between gap-4">
                <div>
                    <h2 class="text-xl font-bold text-gray-800">{{ $product->name }}</h2>
                    <p class="text-sm text-gray-500 mt-1">
                        Created: {{ optional($product->created_at)->diffForHumans() ?? '-' }}
                    </p>
                </div>

                <div class="text-right">
                    <p class="text-sm text-gray-500">Price</p>
                    <p class="text-2xl font-bold text-purple-700">
                        ${{ number_format((float)$product->price, 2) }}
                    </p>
                </div>
            </div>

            <hr>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500 mb-1">Category</p>
                    <p class="font-semibold text-gray-800">
                        {{ $product->category->name ?? '-' }}
                    </p>
                </div>

                <div class="bg-gray-50 rounded-lg p-4">
                    <p class="text-sm text-gray-500 mb-1">Owner</p>
                    <p class="font-semibold text-gray-800">
                        {{ $product->user->name ?? '-' }}
                        @if($product->user?->email)
                            <span class="text-sm text-gray-500">({{ $product->user->email }})</span>
                        @endif
                    </p>
                </div>
            </div>

            {{-- Suppliers --}}
            <div class="space-y-2">
                <p class="text-sm text-gray-500">Suppliers</p>

                @if($product->suppliers && $product->suppliers->count() > 0)
                    <div class="overflow-x-auto bg-white rounded-lg border">
                        <table class="w-full">
                            <thead class="bg-gray-100">
                                <tr>
                                    <th class="p-3 text-left text-sm">Supplier</th>
                                    <th class="p-3 text-left text-sm">Email</th>
                                    <th class="p-3 text-left text-sm">Cost Price</th>
                                    <th class="p-3 text-left text-sm">Lead Time (days)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($product->suppliers as $supplier)
                                    <tr class="border-t">
                                        <td class="p-3 font-semibold">{{ $supplier->name }}</td>
                                        <td class="p-3">{{ $supplier->email ?? '-' }}</td>
                                        <td class="p-3">${{ number_format((float)($supplier->pivot->cost_price ?? 0), 2) }}</td>
                                        <td class="p-3">{{ (int)($supplier->pivot->lead_time_days ?? 0) }}</td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                @else
                    <div class="bg-yellow-50 text-yellow-800 px-4 py-3 rounded-lg">
                        This product has no suppliers.
                    </div>
                @endif
            </div>

        </div>

        {{-- Side Card --}}
        <div class="bg-white rounded-xl shadow p-6 space-y-4">
            <h3 class="text-lg font-bold text-gray-800">Quick Info</h3>

            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-500 mb-1">Product ID</p>
                <p class="font-semibold text-gray-800">#{{ $product->id }}</p>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-500 mb-1">Suppliers Count</p>
                <p class="font-semibold text-gray-800">
                    {{ $product->suppliers_count ?? ($product->suppliers?->count() ?? 0) }}
                </p>
            </div>

            <div class="bg-gray-50 rounded-lg p-4">
                <p class="text-sm text-gray-500 mb-1">Last Update</p>
                <p class="font-semibold text-gray-800">
                    {{ optional($product->updated_at)->diffForHumans() ?? '-' }}
                </p>
            </div>
        </div>

    </div>
</div>

{{-- Delete Confirmation (same style as index) --}}
<script>
document.querySelectorAll('.btn-delete').forEach(btn=>{
    btn.addEventListener('click',function(e){
        e.preventDefault();
        let name = this.dataset.name || 'this product';
        if(confirm("Are you sure you want to delete this product: " + name + "?")){
            this.closest('form').submit();
        }
    });
});
</script>
@endsection
