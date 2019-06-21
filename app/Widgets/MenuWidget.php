<?php


namespace App\Widgets;

use App\Widgets\Contract\ContractWidget;
use App\Models\Category;
use App\Models\Brand;

class MenuWidget implements ContractWidget
{
    public function execute()
    {
        $categories = Category::all();
        $brands = Brand::all();
        return view('Widgets::menu', [
            'categories' => $categories,
            'brands' => $brands
        ]);
    }
}