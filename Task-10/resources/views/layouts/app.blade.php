{{-- resources/views/layouts/app.blade.php --}}
<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta name="csrf-token" content="{{ csrf_token() }}">

<title>@yield('title','Cosmetics Management')</title>

<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
<script src="https://cdn.tailwindcss.com"></script>

<style>
body{
    font-family: 'Poppins', sans-serif;
    background: linear-gradient(135deg,#f9f5ff,#f0edf7);
}

.nav-link{
    display:flex;
    align-items:center;
    gap:8px;
    padding:10px 18px;
    color:white;
    border-radius:12px;
    transition:.3s;
}

.nav-link:hover{
    background:rgba(255,255,255,.2);
}

.active-nav{
    background:rgba(255,255,255,.3);
}

.mobile-link{
    display:flex;
    gap:10px;
    padding:12px;
    border-radius:10px;
}

.mobile-link:hover{
    background:#ede9fe;
}
</style>
</head>

<body>

<!-- ================= NAVBAR ================= -->
<nav class="bg-gradient-to-r from-purple-600 to-pink-600 shadow-lg sticky top-0 z-50">
<div class="max-w-7xl mx-auto px-6 h-20 flex justify-between items-center">

<!-- Logo -->
<div class="flex items-center gap-3">
    <div class="w-10 h-10 bg-white/20 rounded-full flex items-center justify-center">
        <i class="fas fa-spa text-white"></i>
    </div>
    <div>
        <h1 class="text-white text-xl font-bold">Cosmetic Hub</h1>
        <p class="text-xs text-white/70">Management System</p>
    </div>
</div>

<!-- Desktop Links -->
<div class="hidden md:flex gap-2">

<a href="{{ route('dashboard') }}"
   class="nav-link {{ request()->routeIs('dashboard')?'active-nav':'' }}">
<i class="fas fa-gauge-high"></i> Dashboard
</a>

<a href="{{ route('products.index') }}"
   class="nav-link {{ request()->routeIs('products.*')?'active-nav':'' }}">
<i class="fas fa-box"></i> Products
</a>

<a href="{{ route('categories.index') }}"
   class="nav-link {{ request()->routeIs('categories.*')?'active-nav':'' }}">
<i class="fas fa-tags"></i> Categories
</a>

<a href="{{ route('suppliers.index') }}"
   class="nav-link {{ request()->routeIs('suppliers.*')?'active-nav':'' }}">
<i class="fas fa-truck"></i> Suppliers
</a>

</div>

<!-- User Dropdown -->
<div class="relative group">

<button class="flex items-center gap-3 bg-white/10 px-4 py-2 rounded-xl">
    <div class="w-9 h-9 bg-pink-400 rounded-full flex items-center justify-center">
        <i class="fas fa-user text-white"></i>
    </div>
    <div class="text-left">
        <p class="text-white text-sm font-semibold">
            {{ Auth::user()->name }}
        </p>
        <p class="text-xs text-white/70">Logged In</p>
    </div>
    <i class="fas fa-chevron-down text-white/70"></i>
</button>

<!-- Dropdown -->
<div class="absolute right-0 mt-2 w-60 bg-white rounded-xl shadow-xl
            opacity-0 invisible group-hover:opacity-100 group-hover:visible transition">

<div class="p-4 border-b flex items-center gap-3">
    <div class="w-12 h-12 bg-purple-500 rounded-full flex items-center justify-center">
        <i class="fas fa-user-cog text-white"></i>
    </div>
    <div>
        <p class="font-bold">{{ Auth::user()->name }}</p>
        <p class="text-sm text-gray-500">Administrator</p>
    </div>
</div>

<div class="p-2">

<a href="{{ route('profile.edit') }}"
   class="flex gap-3 px-4 py-2 hover:bg-purple-50 rounded-lg">
<i class="fas fa-user text-purple-500"></i> My Profile
</a>

<a href="{{ route('settings') }}"
   class="flex gap-3 px-4 py-2 hover:bg-purple-50 rounded-lg">
<i class="fas fa-cog text-purple-500"></i> Settings
</a>

</div>

<div class="border-t p-2">
<form method="POST" action="{{ route('logout') }}">
@csrf
<button class="w-full flex gap-3 px-4 py-2 text-red-600 hover:bg-red-50 rounded-lg">
<i class="fas fa-sign-out-alt"></i> Logout
</button>
</form>
</div>

</div>
</div>

</div>
</nav>
<!-- ================= END NAVBAR ================= -->

<!-- Flash Messages -->
<div class="max-w-7xl mx-auto px-6 mt-6">

@if(session('success'))
<div class="bg-green-500 text-white px-5 py-3 rounded-lg mb-3">
{{ session('success') }}
</div>
@endif

@if(session('error'))
<div class="bg-red-500 text-white px-5 py-3 rounded-lg mb-3">
{{ session('error') }}
</div>
@endif

@if($errors->any())
<div class="bg-orange-500 text-white px-5 py-3 rounded-lg mb-3">
<ul class="list-disc ml-6">
@foreach($errors->all() as $err)
<li>{{ $err }}</li>
@endforeach
</ul>
</div>
@endif

</div>

<!-- Page Content -->
<main class="max-w-7xl mx-auto px-6 py-6">
@yield('content')
@include('partials.quick-links')
</main>

<!-- Footer -->
<footer class="bg-white/70 border-t mt-10">
<div class="max-w-7xl mx-auto px-6 py-6 text-center text-gray-500">
© {{ date('Y') }} Cosmetics Hub - All Rights Reserved
</div>
</footer>

</body>
</html>
