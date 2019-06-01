<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use App\Models\Product;
use Illuminate\Http\Request;

class MainController extends Controller
{

    public function index()
    {
        $brands = Brand::all()->take(3);

        $hits = Product::all()->where('hit','=','1')->take(8);

        return view('main', [
            'brands' => $brands,
            'hits' => $hits
        ]);
    }

}
