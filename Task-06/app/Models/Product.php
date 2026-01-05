<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;
use App\Models\Supplier;

class Product extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'price',
        'category_id',
    ];

    /**
     * Get the category that the product belongs to.
     *
     * One Product belongs to one Category
     */
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    /**
     * The suppliers that supply this product.
     *
     * Many-to-Many relationship with pivot data
     */
    public function suppliers()
    {
        return $this->belongsToMany(Supplier::class)
            ->withPivot(['cost_price', 'lead_time_days'])
            ->withTimestamps();
    }
}