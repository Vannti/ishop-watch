<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index()
    {
        $query = !empty(trim($_GET['s'])) ? trim($_GET['s']) : null;
        if ($query){
            $products = Product::where('title', 'LIKE', "%{$query}%")->paginate(6);
            return view('product.index', ['products' => $products]);
        }
        return redirect()->back();
    }

    public function typeahead(Request $request)
    {
        if ($request->ajax()){
            $query = !empty(trim($_GET['query'])) ? trim($_GET['query']) : null;
            if ($query){
                $products = Product::where('title', 'LIKE', "%{$query}%")->take(10);
                json_encode($products);
            }
        }
        die;
    }
}
