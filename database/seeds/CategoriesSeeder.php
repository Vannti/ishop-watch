<?php

use Illuminate\Database\Seeder;
use App\Models\Category;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $man = Category::create([
            'title' => 'Мужские',
            'alias' => 'men',
            'keywords' => 'Men',
            'description' => 'Men'
        ]);
        $women = Category::create([
            'title' => 'Женские',
            'alias' => 'women',
            'keywords' => 'Women',
            'description' => 'women'
        ]);
        $electronnie = Category::create([
            'title' => 'Электронные',
            'alias' => 'electronnie',
            'keywords' => 'Электронные',
            'description' => 'Электронные'
        ]);
        $mehanicheskie = Category::create([
            'title' => 'Механические',
            'alias' => 'mehanicheskie',
            'keywords' => 'Механические',
            'description' => 'Механические'
        ]);
    }
}
