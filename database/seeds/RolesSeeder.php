<?php

use Illuminate\Database\Seeder;
use App\Models\Role;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = Role::create([
            'name' => 'User',
            'slug' => 'user',
            'permissions' => [
                'buy-product' => true
            ]
        ]);
        $admin = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'add-orders' => true,
                'add-categories' =>true,
                'edit-categories' => true,
                'add-currency' => true,
                'add-product' => true,
                'edit-product' => true
            ]
        ]);
    }
}
