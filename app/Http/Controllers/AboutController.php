<?php

// app/Http/Controllers/PageController.php
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function home()
    {
        return view('about'); // Displays resources/views/home.blade.php
    }
}