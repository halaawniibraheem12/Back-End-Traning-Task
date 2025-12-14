<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function(){
    $name = "Ali";
    return view('home' , ['name' => $name]);
});