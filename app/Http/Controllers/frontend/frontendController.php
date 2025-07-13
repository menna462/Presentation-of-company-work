<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\Product;
use App\Models\Service;
use Illuminate\Http\Request;

class frontendController extends Controller
{
        public function index()
    {
        $services = Service::take(3)->get();
         $products = Product::take(4)->get();
        return view('welcome' , compact('services','products'));
    }
public function allProducts()
{
    $categories = Category::all();
    $products = Product::all();
    return view('include.allproducts', compact('categories', 'products'));
}

public function allServices()
{
        $services = Service::all();

    return view('include.allservices', compact('services'));
}

public function showProduct($id)
{
    $product = Product::with('images')->findOrFail($id);
    return view('include.productdetils', compact('product'));
}
}
