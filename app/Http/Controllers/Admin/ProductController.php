<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Models\Brand;
use App\Models\Product;
use App\Models\Category;
use App\Http\Controllers\Controller;

class ProductController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:add-content');
        $this->middleware('can:edit-content');
        $this->middleware('can:delete-content');
    }

    public function index()
    {
        if (isset($_GET['brand']) && !empty(trim($_GET['brand']))){
            $query_brand = trim($_GET['brand']);
            $brand = Brand::where('alias', $query_brand)->first();
            $products = Product::where('brand_id', $brand->id)->paginate(6);
            return view('admin.products', ['products' => $products]);
        }

        if (isset($_GET['category']) && !empty(trim($_GET['category']))){
            $query_category = trim($_GET['category']);
            $category = Category::where('alias', $query_category)->first();
            $products = $category->products()->paginate(6);
            return view('admin.products', ['products' => $products]);
        }

        return view('admin.products');
    }
}
