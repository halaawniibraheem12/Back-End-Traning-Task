<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Product;
use App\Models\Supplier;
use App\Models\User;

class ProductSupplierSeeder extends Seeder
{
    public function run(): void
    {
        $products  = Product::all();
        $suppliers = Supplier::all();
        $users     = User::all();

        if ($products->isEmpty() || $suppliers->isEmpty()) {
            $this->command->warn('No products or suppliers found. Run ProductSeeder and SupplierSeeder first.');
            return;
        }

        if ($users->isEmpty()) {
            $this->command->warn('No users found. Run UserSeeder first.');
            return;
        }

        foreach ($products as $product) {

            if (!$product->user_id) {
                $product->update([
                    'user_id' => $users->random()->id,
                ]);
            }

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

        $this->command->info('Products successfully linked with suppliers (pivot data added).');
    }
}