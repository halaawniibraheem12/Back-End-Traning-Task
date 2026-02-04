<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Supplier;
use App\Models\User;

class Product extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'price',
        'category_id',
        'user_id',
    ];

    // Owner
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Category
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // Suppliers (Many-to-Many)
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)
            ->withPivot(['cost_price', 'lead_time_days'])
            ->withTimestamps();
    }

    // Suppliers names (comma-separated)
    public function getSupplierNameAttribute()
    {
        $suppliers = $this->relationLoaded('suppliers')
            ? $this->suppliers
            : $this->suppliers()->get();

        return $suppliers->pluck('name')->implode(', ') ?: '-';
    }
}
