<?php

namespace App\Http\Controllers;

use App\Models\Currency;

class CurrencyController extends Controller
{
    public function change($curr)
    {
        $currency_code = !is_null($curr) ? $curr : null;
        if ($currency_code){
            $currency = Currency::where('code', $currency_code)->first();
            if ($currency){
                setcookie('currency', $currency, time()+3600*24*7, '/');
            }
        }
        return redirect()->back();
    }
}
