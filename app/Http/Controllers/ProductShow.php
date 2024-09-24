<?php

namespace App\Http\Controllers;
use App\Models\Product;
use App\Models\Category;

use Illuminate\Http\Request;

class ProductShow extends Controller
{
    public function show()
    {
        // Fetch all products with their associated category and paginate them
        $products = Product::with('category')->paginate(5);
        return view('welcome', compact('products'));
    }
}
