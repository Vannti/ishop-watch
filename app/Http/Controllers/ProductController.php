<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class ProductController extends Controller
{
    public function index()
    {
        if (isset($_GET['brand']) && !empty(trim($_GET['brand']))){
            $query_brand = trim($_GET['brand']);
            $brand = Brand::where('alias', $query_brand)->first();
            $products = Product::where('brand_id', $brand->id)->paginate(6);
            return view('product.index', ['products' => $products]);
        }

        if (isset($_GET['category']) && !empty(trim($_GET['category']))){
            $query_category = trim($_GET['category']);
            $category = Category::where('alias', $query_category)->first();
            $products = $category->products()->paginate(6);
            return view('product.index', ['products' => $products]);
        }

        $products = Product::orderBy('alias')->paginate(6);
        return view('product.index', [
            'products' => $products,
        ]);
    }

    public function show($alias)
    {
        $product = Product::where('alias', $alias)->first();
        return view('product.show', [
            'product' => $product,
        ]);
    }
}
