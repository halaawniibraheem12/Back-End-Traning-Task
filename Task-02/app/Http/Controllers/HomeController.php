<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    
    public function index()
    {
        return view('home', ['title' => 'Welcome to Home Page!']);
    }

    public function about()
    {
        return view('about', ['info' => 'This is a short description about this page.']);
    }

    public function features()
    {
        $features = [
            'Follow MVC architecture',
            'Authorization',
            'Supports Blade templating',
            'Blade Templating',
            'Routing System'
        ];
        return view('features', ['features' => $features]);
    }

    public function team()
    {
        $team = [
            ['name' => 'Hala', 'role' => ' Backend Developer'],
            ['name' => 'Aya', 'role' => ' Frontend Developer '],
            ['name' => 'lara', 'role' => 'Full stack Developer '],
            ['name' => 'Ahmed', 'role' => 'UI-UX Designer'],
             ['name' => 'Mohamed', 'role' => 'Program Manager']
        ];
        return view('team', ['team' => $team]);
    }
}