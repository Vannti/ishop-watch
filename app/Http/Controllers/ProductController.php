<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $brands = Brand::all();
        $products = Product::orderBy('alias')->paginate(6);
        return view('product.index', [
            'products' => $products,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }

    public function show($alias)
    {
        $categories = Category::all();
        $brands = Brand::all();
        $product = Product::where('alias', $alias)->first();
        return view('product.show', [
            'product' => $product,
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}
