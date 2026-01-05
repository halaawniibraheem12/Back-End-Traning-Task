<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Supplier;

class ProductSupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $products = Product::all();
        $suppliers = Supplier::all();

        if ($products->isEmpty() || $suppliers->isEmpty()) {
            $this->command->warn(' No products or suppliers found. Run ProductSeeder and SupplierSeeder first.');
            return;
        }

        foreach ($products as $product) {

            $selectedSuppliers = $suppliers->random(rand(1, 3));

            $syncData = [];

            foreach ($selectedSuppliers as $supplier) {
                $syncData[$supplier->id] = [

                    'cost_price' => rand(50, 500) / 10, 

                    'lead_time_days' => rand(1, 14),
                ];
            }

            $product->suppliers()->sync($syncData);
        }

        $this->command->info(' Products successfully linked with suppliers (pivot data added).');
    }
}