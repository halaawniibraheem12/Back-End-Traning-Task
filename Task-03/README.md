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
Open the .env file in your project directory and update the database connection settings according to your local MySQL setup.  
Ensure you specify the database name, username, and password correctly. For example, set the database name to task3_db and confirm this database exists in MySQL. This allows Laravel to connect properly to the database.

---

### Step 2: Run Migrations and Seeders
After configuring the database, run Laravel migrations to create the products table.  
Then, run the seeder to insert at least five sample products into the table.

---

### Step 3: Start the Development Server
Use the command php artisan serve to start the Laravel development server.  
Open your browser and visit http://localhost:8000 to access the application.

---

## Project Structure

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


---

## Features Implemented

### CRUD Operations
- Create: Add new products
- Read: Display all products and view product details
- Update: Edit existing products
- Delete: Remove products

### Database Operations
- Product model with mass assignment protection
- Migration for products table
- Seeder with 5 sample products
- MySQL database integration

### User Interface
- Simple and clean layout
- Responsive design
- Form validation
- Success and error messages

---

## Database Schema

*Table: products*

| Column       | Type            | Description        |
|--------------|-----------------|--------------------|
| id           | bigint unsigned | Primary key        |
| name         | varchar(191)    | Product name       |
| price        | decimal(8,2)    | Product price      |
| created_at  | timestamp       | Creation time      |
| updated_at  | timestamp       | Last update time   |

---

## Sample Products

| # | Product Name | Price |
|---|--------------|-------|
| 1 | Sunglasses   | 99.99 |
| 2 | Tote Bag     | 59.99 |
| 3 | Perfume      | 550.70|
| 4 | Scarf        | 30.50 |
| 5 | Hair Clips   | 29.00 |

---

## Testing with Tinker
Use Laravel Tinker to interact with the database and verify the products table:

bash
php artisan tinker


Inside Tinker:
- Product::all(); – View all products  
- Product::count(); – Count the products  
- Product::find(1); – Find a product by ID

---

## Common Artisan Commands
bash
php artisan migrate:fresh --seed
php artisan migrate
php artisan db:seed --class=ProductSeeder
php artisan cache:clear
php artisan config:clear
php artisan route:clear


---

## References
- Laravel Migrations Documentation  
  https://laravel.com/docs/migrations

- Laravel Database Seeding Documentation  
  https://laravel.com/docs/seeding

- Laravel Controllers Documentation  
  https://laravel.com/docs/controllers

---

## Author
University assignment demonstrating Laravel basic database operations and CRUD functionality.
