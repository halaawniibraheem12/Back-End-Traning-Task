<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    // ! Step: 02 
    // * Mass Assignable fields
    protected $fillable = [
        'name',
        'price'
    ];
}