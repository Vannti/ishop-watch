<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Product;

class MainController extends Controller
{

    public function index()
    {
        $brands = Brand::all();

        $hits = Product::all()->where('hit', '=', '1')->take(8);

        $categories = Category::all();

        return view('main', [
            'brands' => $brands,
            'hits' => $hits,
            'categories' => $categories
        ]);
    }

}
