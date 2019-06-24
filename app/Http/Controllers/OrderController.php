<?php

namespace App\Http\Controllers;

use App\Models\Currency;
use App\Models\Order;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class OrderController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function index()
    {
        $orders = Order::orderBy('created_at', 'desc')->paginate(5);
        return view('order.index', [
            'orders' => $orders
        ]);
    }

    public function add()
    {
        $cart = isset($_SESSION['cart']) ? $_SESSION['cart'] : null;
        $currency = isset($_SESSION['cart.currency']) ? $_SESSION['cart.currency'] : null;
        $cart_sum = isset($_SESSION['cart.sum']) ? $_SESSION['cart.sum'] : null;
        $cart_qty = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] : null;

        if (!$cart){
            return redirect()->back();
        }

        return view('order.add', [
            'cart' => $cart,
            'currency' => $currency,
            'cart_sum' => $cart_sum,
            'cart_qty' => $cart_qty
        ]);
    }

    public function makeOrder(Request $request)
    {
        $base_curr = Currency::where('base', '1')->first();

        // Add new order
        $order = Order::create([
            'user_id' => Auth::user()->id,
            'currency_id' => isset($_SESSION['cart.currency']) ?
                $_SESSION['cart.currency']->id :
                $base_curr->id,
            'status' => "1",
            'note' => $request->get('note'),
            'price' => $_SESSION['cart.sum']
        ]);

        if (!$order){
            return redirect()->back();
        }

        // Attach product, qty, price to Orders_Products
        foreach ($_SESSION['cart'] as $id => $item){
            $product = Product::where('id', $id)->first();
            $order->products()->attach($product, [
                'qty' => $item['qty'],
                'price' => $item['price']
            ]);
        }

        $request->session()->flash('flash_message', 'Order successfully processed');

        return redirect()->route('orders');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);
        if (!$order->delete()){
            return redirect()->back()->withErrors('Cancel Error');
        }

        session()->flash('flash_message', "Order by id: {$id} is canceled");
        return redirect()->back();
    }

}
