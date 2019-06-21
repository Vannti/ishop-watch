<?php

use Illuminate\Database\Seeder;
use App\Models\Currency;

class CurrenciesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $ruble = Currency::create([
            'title' => 'Рубль',
            'code' => 'RUB',
            'symbol' => '₽',
            'value' => 65.36,
            'base' => '0'
        ]);
        $dollar = Currency::create([
            'title' => 'Доллар',
            'code' => 'USD',
            'symbol' => '$',
            'value' => 1,
            'base' => '1'
        ]);
        $euro = Currency::create([
            'title' => 'Евро',
            'code' => 'EUR',
            'symbol' => '€',
            'value' => 0.90,
            'base' => '0'
        ]);
    }
}
