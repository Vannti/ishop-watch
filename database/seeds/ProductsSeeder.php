<?php

use Illuminate\Database\Seeder;
use App\Models\Product;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $casio_mpr700 = Product::create([
            'title' => 'Casio MRP-700-1AVEF',
            'brand_id' => 1,
            'alias' => 'casio-mrp-700-1avef',
            'content' => '',
            'price' => 300,
            'old_price' => 0,
            'status' => '1',
            'keywords' => '',
            'description' => '',
            'img' => 'p-1.png',
            'hit' => '1'
        ]);
        $casio_mq24 = Product::create([
            'title' => 'Casio MQ-24-7BUL',
            'brand_id' => 1,
            'alias' => 'casio-mq-24-7bul',
            'content' => 'Lorem ipsum',
            'price' => 70,
            'old_price' => 80,
            'status' => '1',
            'keywords' => '',
            'description' => '',
            'img' => 'p-2.png',
            'hit' => '1'
        ]);
        $citizen_jp1010 = Product::create([
            'title' => 'Citizen JP1010-00E',
            'brand_id' => 2,
            'alias' => 'citizen-jp1010-00e',
            'content' => '',
            'price' => 400,
            'old_price' => 0,
            'status' => '1',
            'keywords' => '',
            'description' => '',
            'img' => 'p-4.png',
            'hit' => '1'
        ]);
    }
}
