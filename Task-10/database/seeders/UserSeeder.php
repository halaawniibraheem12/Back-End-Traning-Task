<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Admin User
        User::create([
            'name' => 'Admin User',
            'email' => 'admin@gmail.com',
            'password' => '12346789',
            'is_admin' => true,
        ]);

        // Owners / Normal Users
        User::create([
            'name' => 'Mona Ali',
            'email' => 'mona.ali@gmail.com',
            'password' => '12346789',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Lina Khaled',
            'email' => 'lina.khaled@gmail.com',
            'password' => '12346789',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Sara Ahmed',
            'email' => 'sara.ahmed@gmail.com',
            'password' => '12346789',
            'is_admin' => false,
        ]);

        User::create([
            'name' => 'Noor Hassan',
            'email' => 'noor.hassan@gmail.com',
            'password' => '12346789',
            'is_admin' => false,
        ]);
    }
}