@extends('layouts.app')

@section('title', 'Add New Product')

@section('content')
<div class="space-y-6">

    {{-- Header --}}
    <div class="bg-white rounded-xl shadow p-6 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-2xl font-bold text-gray-800">Add New Product</h1>
            <p class="text-gray-500">Create a new cosmetic product</p>
        </div>

        <a href="{{ route('products.index') }}"
           class="px-4 py-2 bg-gray-100 text-gray-700 rounded-lg hover:bg-gray-200">
            ← Back to Products
        </a>
    </div>

    {{-- General Error Summary (optional) --}}
    @if ($errors->any())
        <div class="bg-red-50 border border-red-200 text-red-800 px-5 py-4 rounded-lg">
            <p class="font-semibold mb-2">Please fix the following errors:</p>
            <ul class="list-disc list-inside space-y-1 text-sm">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    {{-- Flash --}}
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

    {{-- Form --}}
    <form action="{{ route('products.store') }}" method="POST" class="space-y-6 bg-white rounded-xl shadow p-6">
        @csrf

        {{-- Name --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Product Name</label>
            <input type="text" name="name" value="{{ old('name') }}"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            @error('name')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Category --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Category</label>
            <select name="category_id"
                    class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
                <option value="">Select Category</option>
                @foreach($categories as $category)
                    <option value="{{ $category->id }}" {{ old('category_id') == $category->id ? 'selected' : '' }}>
                        {{ $category->name }}
                    </option>
                @endforeach
            </select>
            @error('category_id')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Price --}}
        <div>
            <label class="block text-sm font-semibold text-gray-700 mb-1">Price</label>
            <input type="number" name="price" step="0.01" value="{{ old('price') }}"
                   class="w-full p-3 border border-gray-300 rounded-lg focus:ring-2 focus:ring-purple-500 focus:border-purple-500">
            @error('price')
                <p class="text-red-500 text-sm mt-1">{{ $message }}</p>
            @enderror
        </div>

        {{-- Suppliers --}}
        <div>
            <div class="flex items-center justify-between mb-2">
                <label class="block text-sm font-semibold text-gray-700">Suppliers</label>
                <span class="text-xs text-gray-500">Select at least one supplier</span>
            </div>

            @error('suppliers')
                <p class="text-red-500 text-sm mb-2">{{ $message }}</p>
            @enderror

            <div class="overflow-x-auto border border-gray-200 rounded-lg">
                <table class="w-full">
                    <thead class="bg-gray-100">
                        <tr>
                            <th class="p-3 text-left text-sm">Select</th>
                            <th class="p-3 text-left text-sm">Supplier</th>
                            <th class="p-3 text-left text-sm">Cost Price</th>
                            <th class="p-3 text-left text-sm">Lead Time (days)</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($suppliers as $supplier)
                            @php
                                $oldSelected = old("suppliers.$supplier->id.selected");
                                $oldCost = old("suppliers.$supplier->id.cost_price");
                                $oldLead = old("suppliers.$supplier->id.lead_time_days");
                            @endphp
                            <tr class="border-t">
                                <td class="p-3">
                                    <input type="checkbox"
                                           class="supplier-check"
                                           name="suppliers[{{ $supplier->id }}][selected]"
                                           {{ $oldSelected ? 'checked' : '' }}>
                                </td>
                                <td class="p-3 font-semibold text-gray-800">
                                    {{ $supplier->name }}
                                    <div class="text-xs text-gray-500">{{ $supplier->email ?? '' }}</div>
                                </td>
                                <td class="p-3">
                                    <input type="number" step="0.01"
                                           name="suppliers[{{ $supplier->id }}][cost_price]"
                                           value="{{ $oldCost }}"
                                           class="w-full p-2 border border-gray-300 rounded-lg supplier-input"
                                           placeholder="e.g. 10.00">
                                    @error("suppliers.$supplier->id.cost_price")
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </td>
                                <td class="p-3">
                                    <input type="number"
                                           name="suppliers[{{ $supplier->id }}][lead_time_days]"
                                           value="{{ $oldLead }}"
                                           class="w-full p-2 border border-gray-300 rounded-lg supplier-input"
                                           placeholder="e.g. 3">
                                    @error("suppliers.$supplier->id.lead_time_days")
                                        <p class="text-red-500 text-xs mt-1">{{ $message }}</p>
                                    @enderror
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="4" class="p-4 text-center text-gray-500">
                                    No suppliers found. Please add suppliers first.
                                </td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>

        {{-- Actions --}}
        <div class="flex items-center gap-3">
            <button type="submit"
                    class="px-6 py-3 bg-purple-600 text-white rounded-lg hover:bg-purple-700">
                Add Product
            </button>

            <a href="{{ route('products.index') }}"
               class="px-6 py-3 bg-gray-200 text-gray-700 rounded-lg hover:bg-gray-300">
                Cancel
            </a>
        </div>
    </form>
</div>

{{-- Small UX: disable cost/lead unless checked --}}
<script>
document.addEventListener('DOMContentLoaded', function () {
    function toggleRow(row) {
        const check = row.querySelector('.supplier-check');
        const inputs = row.querySelectorAll('.supplier-input');
        inputs.forEach(inp => {
            inp.disabled = !check.checked;
            inp.classList.toggle('bg-gray-100', !check.checked);
        });
    }

    document.querySelectorAll('tbody tr').forEach(row => {
        if (row.querySelector('.supplier-check')) {
            toggleRow(row);
            row.querySelector('.supplier-check').addEventListener('change', () => toggleRow(row));
        }
    });
});
</script>
@endsection