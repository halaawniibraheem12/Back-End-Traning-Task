# Laravel Basic Database Operations Project

## Project Overview
This project is a Laravel web application that demonstrates basic database operations using Laravel.
It includes full CRUD (Create, Read, Update, Delete) functionality for managing products using a MySQL database.

---

## Project Requirements
- Create Product Model, Migration, and Seeder
- Implement full CRUD operations (Create, Read, Update, Delete)
- Use MySQL database for data storage
- Create a simple user interface for product management
- Insert at least 5 sample products into the database

---

## Installation & Setup

### Step 1: Clone the Repository and Install Dependencies
```bash
git clone [your-repository-url]
cd myapp
composer install


⸻

Step 2: Database Configuration

Edit the .env file and update the database settings:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task3_db
DB_USERNAME=root
DB_PASSWORD=

Make sure the database task3_db exists in MySQL.

⸻

Step 3: Run Migrations and Seeders

php artisan migrate
php artisan db:seed

This will create the products table and insert sample product data.

⸻

Step 4: Start the Development Server

php artisan serve

Open your browser and visit:

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
	•	Create: Add new products using a form
	•	Read: Display all products and view single product details
	•	Update: Edit existing product information
	•	Delete: Remove products from the database

Database Operations
	•	Product model with mass assignment protection
	•	Migration defining the products table schema
	•	Seeder inserting 5 sample products
	•	MySQL database integration

User Interface
	•	Simple and clean layout
	•	Responsive design
	•	Form validation
	•	Success and error messages

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
	1.	Sunglasses – 99.99
	2.	Tote Bag – 59.99
	3.	Perfume – 550.70
	4.	Scarf – 30.50
	5.	Hair Clips – 29.00

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

Troubleshooting

Database Connection Error
	•	Ensure MySQL service is running
	•	Verify database credentials in the .env file
	•	Confirm that the database exists

