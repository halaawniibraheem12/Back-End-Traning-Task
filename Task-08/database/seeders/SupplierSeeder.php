<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Supplier;

class SupplierSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $suppliers = [
            [
                'name'  => 'Glamour Wholesale',
                'email' => 'glamour@suppliers.com',
            ],
            [
                'name'  => 'Beauty Supply Co',
                'email' => 'beauty@suppliers.com',
            ],
            [
                'name'  => 'Cosmetics Hub',
                'email' => 'hub@suppliers.com',
            ],
            [
                'name'  => 'Aroma Distribution',
                'email' => 'aroma@suppliers.com',
            ],
            [
                'name'  => 'Pink Line Trading',
                'email' => 'pinkline@suppliers.com',
            ],
        ];

        foreach ($suppliers as $supplier) {
            Supplier::updateOrCreate(
                ['email' => $supplier['email']], 
                ['name'  => $supplier['name']]   
            );
        }

        $this->command->info(' Suppliers seeded successfully.');
    }
}