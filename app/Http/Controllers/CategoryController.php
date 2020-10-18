<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    //
    public function index()
    {
        $categories = Category::with('gameItems')->get();

        return view('categories.index', compact('categories'));
    }
}
