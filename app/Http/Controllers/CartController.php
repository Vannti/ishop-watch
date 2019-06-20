<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function __construct()
    {
        //
    }

    public function addProduct(Request $request)
    {
        $id  = !empty($_GET['id']) ? (int)$_GET['id'] : null;
        $qty = !empty($_GET['qty']) ? (int)$_GET['qty'] : null;

        if ($id){
            $product = Product::findOrFail($id);
            if (!$product){
                return false;
            }
            $cart = new Cart();
            $cart->addToCart($product, $qty);
        }

        if ($request->ajax()){
            return view('cart.modal');
        }

        return redirect()->back();
    }
}
