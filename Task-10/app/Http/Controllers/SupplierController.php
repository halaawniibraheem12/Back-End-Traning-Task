<?php

namespace App\Http\Controllers;

use App\Models\Supplier;
use Illuminate\Http\Request;

class SupplierController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of suppliers
     */
    public function index()
    {
        $suppliers = Supplier::withCount('products')
            ->latest()
            ->paginate(10);

        $totalSuppliers = Supplier::count();

        $totalProductsFromSuppliers =
            Supplier::withCount('products')->get()->sum('products_count');

        $avgProductsPerSupplier = $totalSuppliers > 0
            ? $totalProductsFromSuppliers / $totalSuppliers
            : 0;

        $suppliersWithProducts = Supplier::has('products')->count();

        $coveragePercentage = $totalSuppliers > 0
            ? ($suppliersWithProducts / $totalSuppliers) * 100
            : 0;

        $activeSuppliers = Supplier::withCount('products')
            ->orderByDesc('products_count')
            ->get();

        return view('suppliers.index', compact(
            'suppliers',
            'totalSuppliers',
            'totalProductsFromSuppliers',
            'avgProductsPerSupplier',
            'coveragePercentage',
            'activeSuppliers'
        ));
    }

    /**
     * Show create form
     */
    public function create()
    {
        return view('suppliers.create');
    }

    /**
     * Store supplier
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'nullable|email',
        ]);

        Supplier::create([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier created successfully');
    }

    /**
     * Show edit form
     */
    public function edit(Supplier $supplier)
    {
        return view('suppliers.edit', compact('supplier'));
    }

    /**
     * Update supplier
     */
    public function update(Request $request, Supplier $supplier)
    {
        $request->validate([
            'name'  => 'required|string|max:255',
            'email' => 'required|email',

        ]);

        $supplier->update([
            'name'  => $request->name,
            'email' => $request->email,
        ]);

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier updated successfully');
    }

    /**
     * Delete supplier
     */
    public function destroy(Supplier $supplier)
    {
        $supplier->delete();

        return redirect()
            ->route('suppliers.index')
            ->with('success', 'Supplier deleted successfully');
    }
}
