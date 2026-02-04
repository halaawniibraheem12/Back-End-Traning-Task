<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Product;

class Supplier extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'email',
    ];

    /**
     * Many Suppliers belong to many Products
     */
    public function products()
    {
        return $this->belongsToMany(Product::class)
            ->withPivot(['cost_price', 'lead_time_days'])
            ->withTimestamps();
    }
}
