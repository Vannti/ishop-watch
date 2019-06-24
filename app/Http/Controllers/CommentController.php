<?php

namespace App\Http\Controllers;

use App\Models\Comment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class CommentController extends Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->middleware('auth');
    }

    public function add(Request $request, $alias)
    {
        $product = Product::where('alias', $alias)->first();
        $comment = Comment::create([
            'product_id' => $product->id,
            'user_id' => Auth::user()->id,
            'text' => $request->get('text')
        ]);

        if (!$comment){
            return redirect()->back();
        }

        $request->session()->flash('flash_message', 'Comment added');
        return redirect()->route('product.show', ['alias' => $product->alias]);
    }
}
