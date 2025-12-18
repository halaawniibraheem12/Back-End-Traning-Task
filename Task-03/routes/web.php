
<?php

use Illuminate\Support\Facades\Route;
use App\Models\Product;

use App\Http\Controllers\ProductController;

Route::get('/', function () {
    return view('welcome');
})->name('index');

Route::resource('products', ProductController::class);