<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    public function addToCart($product, $qty = 1)
    {
        if (!isset($_SESSION['cart.currency'])){
            $_SESSION['cart.currency'] = json_decode($_COOKIE['currency']);
        }

        $id = $product->id;
        $price = $product->price;

        if (isset($_SESSION['cart'][$id])){
            $_SESSION['cart'][$id]['qty'] += $qty;
        }
        else {
            $_SESSION['cart'][$id] = [
                'qty' => $qty,
                'title' => $product->title,
                'alias' => $product->alias,
                'price' => $price * $_SESSION['cart.currency']->value,
                'img' => $product->img
            ];
        }

        $_SESSION['cart.qty'] = isset($_SESSION['cart.qty']) ? $_SESSION['cart.qty'] + $qty : $qty;

        $_SESSION['cart.sum'] = isset($_SESSION['cart.sum']) ?
            $_SESSION['cart.sum'] + $qty * ($price * $_SESSION['cart.currency']->value) :
            $qty * ($price * $_SESSION['cart.currency']->value);
    }
}
