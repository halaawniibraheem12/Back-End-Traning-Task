```
# Laravel CRUD Application - Task 3

Project Description:
This project is a web application built with Laravel to manage products.
It implements full CRUD operations (Create, Read, Update, Delete) with simple and user-friendly interfaces.

---

Requirements:
- PHP >= 8.0
- Composer
- Laravel >= 10.x
- MySQL
- XAMPP (Apache + MySQL)

---

Environment Setup:
1. Start XAMPP and run Apache and MySQL.
2. Open CMD inside the project folder:
   cd C:\xampp\htdocs\myapp
3. Verify Laravel is ready:
   php artisan --version

---

Database Setup:
1. Create the database:
   mysql -u root
   CREATE DATABASE task3_db;
   EXIT;
2. Update `.env` file:
   DB_CONNECTION=mysql
   DB_HOST=127.0.0.1
   DB_PORT=3306
   DB_DATABASE=task3_db
   DB_USERNAME=root
   DB_PASSWORD=

---

Creating Model, Migration, and Seeder:
1. Create Model with Migration:
   php artisan make:model Product -m
2. Edit the Migration file (database/migrations/xxxx_create_products_table.php):
   $table->decimal('price', 8, 2);
3. Run Migration:
   php artisan migrate
4. Create Seeder:
   php artisan make:seeder ProductSeeder
5. Edit Seeder to add products:
   Product::create(['name' => 'Sunglasses', 'price' => 99.99]);
   Product::create(['name' => 'Tote Bag', 'price' => 59.99]);
   // Add more products as needed
6. Run Seeder:
   php artisan db:seed --class=ProductSeeder

---

Implementing CRUD Operations:
1. Create Controller:
   php artisan make:controller ProductController --resource
2. Edit ProductController.php to add CRUD methods:
   - index() - Display all products
   - create() - Show create form
   - store() - Save new product
   - show() - Show single product
   - edit() - Show edit form
   - update() - Update product
   - destroy() - Delete product
3. Add Routes in routes/web.php:
   Route::resource('products', ProductController::class);

---

Creating Views:
1. Create folder for product views:
   mkdir resources\views\products
2. Create the following files:
   - index.blade.php : Display all products with View, Edit, Delete buttons and Add New Product button
   - create.blade.php : Form to add a new product
   - edit.blade.php : Form to edit existing product
   - show.blade.php : Display details of a single product

---

Running the Project:
1. Start the Laravel server:
   php artisan serve
2. Open in browser:
   http://127.0.0.1:8000/products

---

Testing CRUD Operations:
- Create: Add new products ✅
- Read: Display all products ✅
- Update: Edit product information ✅
- Delete: Remove a product ✅
Check database entries:
   php artisan tinker
   Product::all()

---

Notes:
- All operations have been successfully tested.
- Seeder can be modified to add more sample products.
- Views are simple and can be improved using Bootstrap or Tailwind CSS.
```