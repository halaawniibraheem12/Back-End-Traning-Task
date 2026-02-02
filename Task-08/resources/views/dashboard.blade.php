@extends('layouts.app')

@section('title','Dashboard')

@section('content')
<div class="space-y-8">

    <!-- Header -->
    <div class="bg-white rounded-2xl shadow p-6 border border-gray-100 flex flex-col md:flex-row md:items-center md:justify-between gap-4">
        <div>
            <h1 class="text-3xl font-bold text-gray-900">Dashboard</h1>
            <p class="text-gray-500 mt-1">
                Welcome back, <span class="font-semibold text-purple-700">{{ auth()->user()->name ?? auth()->user()->email }}</span>
            </p>
        </div>

        <div class="flex flex-wrap gap-3">
            <a href="{{ route('products.create') }}"
               class="px-4 py-2 rounded-xl bg-gradient-to-r from-pink-500 to-purple-600 text-white shadow hover:opacity-95 transition flex items-center gap-2">
                <i class="fas fa-plus-circle"></i>
                <span>Add Product</span>
            </a>

            <a href="{{ route('products.index') }}"
               class="px-4 py-2 rounded-xl bg-purple-100 text-purple-700 hover:bg-purple-200 transition flex items-center gap-2">
                <i class="fas fa-boxes-stacked"></i>
                <span>View Products</span>
            </a>
        </div>
    </div>

    <!-- Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">

        <!-- Products -->
        <div class="bg-white rounded-2xl shadow border p-6 overflow-hidden relative">
            <div class="absolute -top-10 -right-10 w-28 h-28 rounded-full bg-purple-100"></div>

            <div class="flex items-center justify-between relative">
                <div>
                    <p class="text-sm text-gray-500">Total Products</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalProducts }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-purple-100 text-purple-600 flex items-center justify-center">
                    <i class="fas fa-boxes-stacked text-xl"></i>
                </div>
            </div>

            <!-- Bonus Quick Link -->
            <a href="{{ route('products.index') }}"
               class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-purple-700 hover:text-purple-800">
                View Products <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Categories -->
        <div class="bg-white rounded-2xl shadow border p-6 overflow-hidden relative">
            <div class="absolute -top-10 -right-10 w-28 h-28 rounded-full bg-blue-100"></div>

            <div class="flex items-center justify-between relative">
                <div>
                    <p class="text-sm text-gray-500">Total Categories</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalCategories }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-blue-100 text-blue-600 flex items-center justify-center">
                    <i class="fas fa-tags text-xl"></i>
                </div>
            </div>

            <!-- Bonus Quick Link -->
            <a href="{{ route('categories.index') }}"
               class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-blue-700 hover:text-blue-800">
                View Categories <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

        <!-- Suppliers -->
        <div class="bg-white rounded-2xl shadow border p-6 overflow-hidden relative">
            <div class="absolute -top-10 -right-10 w-28 h-28 rounded-full bg-green-100"></div>

            <div class="flex items-center justify-between relative">
                <div>
                    <p class="text-sm text-gray-500">Total Suppliers</p>
                    <p class="text-3xl font-bold text-gray-900 mt-1">{{ $totalSuppliers }}</p>
                </div>
                <div class="w-12 h-12 rounded-xl bg-green-100 text-green-600 flex items-center justify-center">
                    <i class="fas fa-truck text-xl"></i>
                </div>
            </div>

            <!-- Bonus Quick Link -->
            <a href="{{ route('suppliers.index') }}"
               class="mt-5 inline-flex items-center gap-2 text-sm font-semibold text-green-700 hover:text-green-800">
                View Suppliers <i class="fas fa-arrow-right text-xs"></i>
            </a>
        </div>

    </div>

    <!-- Latest Products -->
    <div class="bg-white rounded-2xl shadow border overflow-hidden">
        <div class="p-6 border-b bg-gray-50 flex items-center justify-between">
            <div>
                <h2 class="text-xl font-bold text-gray-900 flex items-center gap-2">
                    <i class="fas fa-clock text-purple-600"></i>
                    Latest Products
                </h2>
                <p class="text-sm text-gray-500 mt-1">Last 5 products added (newest first)</p>
            </div>

            <a href="{{ route('products.index') }}"
               class="px-4 py-2 rounded-xl bg-purple-100 text-purple-700 hover:bg-purple-200 transition text-sm font-semibold">
                View All
            </a>
        </div>

        <div class="overflow-x-auto">
            <table class="w-full">
                <thead class="bg-white">
                    <tr class="text-left text-gray-500 text-sm border-b">
                        <th class="p-4">Name</th>
                        <th class="p-4">Category</th>
                        <th class="p-4">Supplier</th>
                        <th class="p-4">Owner</th>
                        <th class="p-4 text-right">Actions</th>
                    </tr>
                </thead>

                <tbody class="divide-y">
                    @forelse($latestProducts as $product)
                        <tr class="hover:bg-gray-50 transition">
                            <td class="p-4 font-semibold text-gray-900">
                                {{ $product->name }}
                            </td>

                            <td class="p-4">
                                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-purple-100 text-purple-700">
                                    {{ $product->category->name ?? '-' }}
                                </span>
                            </td>

                            <td class="p-4">
                                {{ $product->supplier_name ?? '-' }}
                            </td>

                            <td class="p-4">
                                {{ $product->user->name ?? ($product->user->email ?? '-') }}
                            </td>

                            <td class="p-4">
                                <div class="flex justify-end gap-2">
                                    <a href="{{ route('products.show', $product) }}"
                                       class="px-3 py-1 rounded-lg bg-purple-100 text-purple-700 hover:bg-purple-200 text-sm">
                                        View
                                    </a>

                                    @can('update',$product)
                                        <a href="{{ route('products.edit', $product) }}"
                                           class="px-3 py-1 rounded-lg bg-blue-100 text-blue-700 hover:bg-blue-200 text-sm">
                                            Edit
                                        </a>
                                    @endcan
                                </div>
                            </td>
                        </tr>
                    @empty
                        <tr>
                            <td colspan="5" class="p-8 text-center text-gray-500">
                                No products yet.
                            </td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>
    </div>

</div>
@endsection