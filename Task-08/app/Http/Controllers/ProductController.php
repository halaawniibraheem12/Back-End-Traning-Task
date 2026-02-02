<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use App\Models\Supplier;
use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;

class ProductController extends Controller
{
    public function __construct()
    {
        // Protect product management routes
        $this->middleware('auth')->only([
            'create', 'store', 'edit', 'update', 'destroy'
        ]);
    }

    /**
     * Display a listing of the resource (Cosmetics Management).
     */
    public function index()
{
    $cosmeticCategories = ['Makeup','Skincare','Fragrance','Accessories','Bags'];

    $query = Product::with(['category', 'suppliers', 'user'])
        ->withCount('suppliers')
        ->whereHas('category', function ($q) use ($cosmeticCategories) {
            $q->whereIn('name', $cosmeticCategories);
        });

    if (request()->filled('category')) {
        $query->whereHas('category', function ($q) {
            $q->where('name', request('category'));
        });
    }

 
    $products = $query->latest()->paginate(10)->withQueryString();

    return view('products.index', compact('products'));
}


    /**
     * Show the form for creating a new product.
     */
    public function create()
    {
        $categories = Category::orderBy('name')->get();
        $suppliers  = Supplier::orderBy('name')->get();

        return view('products.create', compact('categories', 'suppliers'));
    }

    /**
     * Store a newly created product in storage.
     */
    public function store(StoreProductRequest $request)
    {
        $validated = $request->validated();

        //  Ownership assigned internally (no user_id in form/request)
        $product = Product::create([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
            'user_id' => auth()->id(),
        ]);

        // Task 06: pivot sync
        $syncData = [];
        foreach (($request->input('suppliers') ?? []) as $supplierId => $data) {
            if (!empty($data['selected'])) {
                $syncData[$supplierId] = [
                    'cost_price' => $data['cost_price'],
                    'lead_time_days' => $data['lead_time_days'],
                ];
            }
        }

        $product->suppliers()->sync($syncData);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product created successfully!');
    }

    /**
     * Display the specified product.
     */
    public function show(Product $product)
    {
        $product->load(['category', 'suppliers', 'user']); // ✅ add user

        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified product.
     */
    public function edit(Product $product)
    {
        //  Authorization (owner or admin via policy)
        $this->authorize('update', $product);

        $categories = Category::orderBy('name')->get();
        $suppliers  = Supplier::orderBy('name')->get();

        $product->load('suppliers');

        return view('products.edit', compact('product', 'categories', 'suppliers'));
    }

    /**
     * Update the specified product in storage.
     */
    public function update(UpdateProductRequest $request, Product $product)
    {
        //  Authorization (owner or admin via policy)
        $this->authorize('update', $product);

        $validated = $request->validated();

        $product->update([
            'name' => $validated['name'],
            'price' => $validated['price'],
            'category_id' => $validated['category_id'],
        ]);

        $syncData = [];
        foreach (($request->input('suppliers') ?? []) as $supplierId => $data) {
            if (!empty($data['selected'])) {
                $syncData[$supplierId] = [
                    'cost_price' => $data['cost_price'],
                    'lead_time_days' => $data['lead_time_days'],
                ];
            }
        }

        $product->suppliers()->sync($syncData);

        return redirect()
            ->route('products.index')
            ->with('success', 'Product updated successfully!');
    }

    /**
     * Remove the specified product from storage.
     */
    public function destroy(Product $product)
    {
        //  Authorization (owner or admin via policy)
        $this->authorize('delete', $product);

        $product->delete();

        return redirect()
            ->route('products.index')
            ->with('success', 'Product deleted!');
    }
}