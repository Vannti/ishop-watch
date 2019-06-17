<?php


namespace App\Widgets;

use App\Models\Currency;
use App\Widgets\Contract\ContractWidget;

class CurrencyWidget implements ContractWidget
{
    public function execute()
    {
        $currencies = Currency::all();
        $base_curr = Currency::where('base', '1')->first();

        if (!isset($_COOKIE['currency'])){
            setcookie('currency', $base_curr, time()+3600*24*7, '/');
            $activeCurrency = $base_curr;
        }
        else {
            $activeCurrency = json_decode($_COOKIE['currency']);
        }

        return view('Widgets::currency', [
            'currencies' => $currencies,
            'activeCurrency' => $activeCurrency
        ]);
    }
}