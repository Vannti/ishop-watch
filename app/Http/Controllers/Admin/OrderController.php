<?php

namespace App\Http\Controllers\Admin;

use App\Models\Currency;
use App\Models\Order;
use App\Models\User;

use App\Http\Controllers\Controller;

class OrderController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('can:add-content');
        $this->middleware('can:edit-content');
        $this->middleware('can:delete-content');
    }

    public function index()
    {
        $orders = Order::orderBy('id')->paginate(5);
        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function user($id)
    {
        $orders = Order::where('user_id', $id)->paginate(5);
        return view('admin.order.index', [
            'orders' => $orders,
        ]);
    }

    public function changeStatus($id)
    {
        $order = Order::where('id', $id)->first();

        $order->status = $order->status ? "0" : "1";

        if(!$order->save()){
            return redirect()->back()->withErrors('Change status error');
        }

        session()->flash('flash_message', "Order {$order->id} change status");
        return redirect()->route('admin.orders');
    }

    public function delete($id)
    {
        $order = Order::findOrFail($id);

        if (!$order->delete()){
            return redirect()->back()->withErrors('Delete Error');
        }

        session()->flash('flash_message', "Order by id: {$order->id} deleted");
        return redirect()->back();
    }
}
