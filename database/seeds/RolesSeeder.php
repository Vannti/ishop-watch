<?php

use Illuminate\Database\Seeder;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $user = \App\Models\Role::create([
        'name' => 'User',
        'slug' => 'user',
        'permissions' => [
            'buy-product' => true
        ]
    ]);
        $admin = \App\Models\Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'permissions' => [
                'edit-product' => true,
                'add-product' => true
            ]
        ]);
    }
}
