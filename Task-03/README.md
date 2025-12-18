# Laravel Basic Database Operations Project

## Project Overview
This project is a Laravel web application that demonstrates basic database operations.
It implements full CRUD (Create, Read, Update, Delete) functionality for managing products using a MySQL database.

---

## Project Requirements
- Create Product Model, Migration, and Seeder
- Implement full CRUD operations (Create, Read, Update, Delete)
- Use MySQL database for data storage
- Create a simple user interface for product management
- Insert at least 5 sample products into the database

---

## Installation & Setup

### Step 1: Database Configuration
Edit the `.env` file:
```env
DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task3_db
DB_USERNAME=root
DB_PASSWORD=


⸻

Step 2: Run Migrations and Seeders

php artisan migrate
php artisan db:seed


⸻

Step 3: Start the Development Server

php artisan serve

Visit:

http://localhost:8000


⸻

Project Structure

myapp/
├── app/
│   ├── Models/Product.php
│   └── Http/Controllers/ProductController.php
├── database/
│   ├── migrations/2025_xx_xx_create_products_table.php
│   └── seeders/ProductSeeder.php
├── resources/views/products/
│   ├── index.blade.php
│   ├── create.blade.php
│   ├── edit.blade.php
│   └── show.blade.php
└── routes/web.php


⸻

Features Implemented

CRUD Operations
	•	Create: Add new products
	•	Read: Display all products and view product details
	•	Update: Edit existing products
	•	Delete: Remove products

Database Operations
	•	Product model with mass assignment protection
	•	Migration for products table
	•	Seeder with 5 sample products
	•	MySQL database integration

⸻

Database Schema

Table: products

Column	Type	Description
id	bigint unsigned	Primary key
name	varchar(191)	Product name
price	decimal(8,2)	Product price
created_at	timestamp	Creation time
updated_at	timestamp	Last update time


⸻

Sample Products

#	Product Name	Price
1	Sunglasses	99.99
2	Tote Bag	59.99
3	Perfume	550.70
4	Scarf	30.50
5	Hair Clips	29.00


⸻

Testing with Tinker

php artisan tinker

Product::all();
Product::count();
Product::find(1);


⸻

Common Artisan Commands

php artisan migrate:fresh --seed
php artisan migrate
php artisan db:seed --class=ProductSeeder
php artisan cache:clear
php artisan config:clear
php artisan route:clear


⸻

References
	•	Laravel Migrations Documentation
https://laravel.com/docs/migrations
	•	Laravel Database Seeding Documentation
https://laravel.com/docs/seeding
	•	Laravel Controllers Documentation
https://laravel.com/docs/controllers


