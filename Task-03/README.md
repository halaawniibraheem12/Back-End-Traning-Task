Laravel CRUD Application – Task 3

📌 Project Description

This project is a Laravel web application designed to demonstrate basic CRUD operations (Create, Read, Update, Delete) for managing products.
The application includes database setup, models, migrations, seeders, controllers, routes, and user-friendly views.

⸻

⚙️ Requirements
	•	PHP >= 8.0
	•	Composer
	•	Laravel >= 10.x
	•	MySQL
	•	XAMPP (Apache & MySQL)

⸻

🛠 Environment Setup
	1.	Start XAMPP and run Apache and MySQL.
	2.	Open CMD inside the project directory:

cd C:\xampp\htdocs\myapp

	3.	Verify Laravel installation:

php artisan --version


⸻

🗄 Database Setup
	1.	Create the database:

mysql -u root
CREATE DATABASE task3_db;
EXIT;

	2.	Update the .env file:

DB_CONNECTION=mysql
DB_HOST=127.0.0.1
DB_PORT=3306
DB_DATABASE=task3_db
DB_USERNAME=root
DB_PASSWORD=


⸻

🔧 Model, Migration & Seeder
	1.	Create Product model with migration:

php artisan make:model Product -m

	2.	Edit migration file:

$table->decimal('price', 8, 2);

	3.	Run migration:

php artisan migrate

	4.	Create seeder:

php artisan make:seeder ProductSeeder

	5.	Add sample data:

Product::create(['name' => 'Sunglasses', 'price' => 99.99]);
Product::create(['name' => 'Tote Bag', 'price' => 59.99]);

	6.	Run seeder:

php artisan db:seed --class=ProductSeeder


⸻

🎯 CRUD Operations
	1.	Create resource controller:

php artisan make:controller ProductController --resource

	2.	Implement methods:

	•	index() – List all products
	•	create() – Show create form
	•	store() – Save new product
	•	show() – Display product details
	•	edit() – Show edit form
	•	update() – Update product
	•	destroy() – Delete product

	3.	Define routes:

Route::resource('products', ProductController::class);


⸻

🎨 Views

Create the following files inside resources/views/products:
	•	index.blade.php – List products
	•	create.blade.php – Add new product
	•	edit.blade.php – Edit product
	•	show.blade.php – View product details

⸻

🚀 Running the Project

php artisan serve

Open in browser:

http://127.0.0.1:8000/products


⸻

✅ Testing
	•	Create product ✔
	•	Read products ✔
	•	Update product ✔
	•	Delete product ✔

Verify data:

php artisan tinker
Product::all()


⸻

📝 Notes
	•	All CRUD operations were tested successfully.
	•	Seeder can be extended with more sample data.
	•	UI can be enhanced using Bootstrap or Tailwind CSS.
