<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;

class DashboardController extends Controller
{
    /**
     * Display dashboard page
     */
    public function index()
    {
        // Cards counts
        $totalProducts   = Product::count();
        $totalCategories = Category::count();
        $totalSuppliers  = Supplier::count();

        // Latest 5 products with relations (avoid N+1)
        $latestProducts = Product::with(['category', 'suppliers', 'user'])
            ->latest() // created_at DESC
            ->take(5)
            ->get();

        return view('dashboard', compact(
            'totalProducts',
            'totalCategories',
            'totalSuppliers',
            'latestProducts'
        ));
    }
}