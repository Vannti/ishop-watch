<?php

namespace App\Http\Controllers\Admin;

use App\Models\Brand;
use App\Models\Category;
use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class SearchController extends Controller
{
    public function brand()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $brands = Brand::where('title', 'LIKE', "%{$query}%")->paginate(5);
            return view('admin.brand.index', ['brands' => $brands]);
        }
        return redirect()->back();
    }

    public function brands(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $brands = Brand::where('title', 'LIKE', "%{$query}%")->take(10)->get();
                echo json_encode($brands);
            }
        }
        die;
    }

    public function category()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $categories = Category::where('title', 'LIKE', "%{$query}%")->paginate(5);
            return view('admin.category.index', ['categories' => $categories]);
        }
        return redirect()->back();
    }

    public function categories(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $categories = Category::where('title', 'LIKE', "%{$query}%")->take(10)->get();
                echo json_encode($categories);
            }
        }
        die;
    }

    public function currency()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $currencies = Currency::where('code', 'LIKE', "%{$query}%")->paginate(5);
            return view('admin.currency.index', ['currencies' => $currencies]);
        }
        return redirect()->back();
    }

    public function currencies(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $currencies = Currency::where('code', 'LIKE', "%{$query}%")->take(10)->get();
                echo json_encode($currencies);
            }
        }
        die;
    }

    public function product()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $brands = Brand::all();
            $categories = Category::all();
            $products = Product::where('title', 'LIKE', "%{$query}%")->paginate(5);
            return view('admin.product.index', [
                'products' => $products,
                'brands' => $brands,
                'categories' => $categories
            ]);
        }
        return redirect()->back();
    }

    public function products(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $products = Product::where('title', 'LIKE', "%{$query}%")->take(10)->get();
                echo json_encode($products);
            }
        }
        die;
    }

    public function order()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $orders = Order::where('id', (int)$query)->paginate(5);
            return view('admin.order.index', ['orders' => $orders]);
        }
        echo redirect()->back();
    }

    public function orders(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $orders = Order::where('id', 'LIKE', "%{$query}%")->take(10)->get();
                echo json_encode($orders);
            }
        }
        die;
    }

    public function user()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $users = User::where('login', 'LIKE', "%{$query}%")->paginate(5);
            return view('admin.user.index', ['users' => $users]);
        }
        echo redirect()->back();
    }

    public function users(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $users = User::where('login', 'LIKE', "%{$query}%")->take(10)->get();
                echo json_encode($users);
            }
        }
        die;
    }
}
