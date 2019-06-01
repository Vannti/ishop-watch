<?php

use Illuminate\Database\Seeder;
use App\Models\Brand;

class BrandsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $casio = Brand::create([
            'title' => 'Casio',
            'alias' => 'casio',
            'img' => 'abt-1.jpg',
            'description' => 'This is Casio Brand'
        ]);
        $citizen = Brand::create([
            'title' => 'Citizen',
            'alias' => 'citizen',
            'img' => 'abt-2.jpg',
            'description' => 'This is Citizen Brand'
        ]);
        $royal_london = Brand::create([
            'title' => 'Royal London',
            'alias' => 'royal_london',
            'img' => 'abt-3.jpg',
            'description' => 'This is Royal London Brand'
        ]);
    }
}
