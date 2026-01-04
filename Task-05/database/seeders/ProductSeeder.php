<?php

namespace Database\Seeders;

use App\Models\Product;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Category;

class ProductSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // ! Step 03: Create Seeder class and add dummy Data in it
        $products = [
            ['name' => 'Sunglasses', 'price' => 99.99],
            ['name' => 'Tote Bage', 'price' => 59.99],
            ['name' => 'Perfume', 'price' => 550.70],
            ['name' => 'Scarf', 'price' => 30.50],
            ['name' => 'Hair Clips', 'price' => 29.00]
        ];

        foreach ($products as $product) {
            Product::create($product);
        }
    }
}