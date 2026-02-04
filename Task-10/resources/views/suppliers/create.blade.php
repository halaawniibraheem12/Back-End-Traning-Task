@extends('layouts.app')

@section('title', 'Add New Supplier')

@section('content')
<div class="max-w-xl mx-auto space-y-6">

    <div class="bg-white rounded-xl shadow p-6">
        <h1 class="text-2xl font-bold text-gray-800">Add New Supplier</h1>
        <p class="text-gray-500 mt-1">Create a new supplier</p>
    </div>

    <div class="bg-white rounded-xl shadow p-6">

        {{-- Error Summary --}}
        @if ($errors->any())
            <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                <ul class="list-disc list-inside">
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form method="POST" action="{{ route('suppliers.store') }}">
            @csrf

            <!-- Name -->
            <div class="mb-5">
                <label class="block mb-2 font-semibold text-gray-700">Supplier Name</label>
                <input type="text"
                       name="name"
                       value="{{ old('name') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       placeholder="Enter supplier name"
                       required>
                @error('name')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Email -->
            <div class="mb-6">
                <label class="block mb-2 font-semibold text-gray-700">Email </label>
                <input type="email"
                       name="email"
                       value="{{ old('email') }}"
                       class="w-full border border-gray-300 rounded-lg px-4 py-3 focus:ring-2 focus:ring-green-500 focus:border-green-500"
                       placeholder="example@email.com">
                @error('email')
                    <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                @enderror
            </div>

            <!-- Actions -->
            <div class="flex justify-end gap-3">
                <a href="{{ route('suppliers.index') }}"
                   class="px-5 py-2.5 bg-gray-200 rounded-lg hover:bg-gray-300">
                    Cancel
                </a>

                <button type="submit"
                        class="px-5 py-2.5 bg-green-600 text-white rounded-lg hover:bg-green-700">
                    Save Supplier
                </button>
            </div>
        </form>

    </div>
</div>
@endsection
