<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $table = 'categories';

    protected $fillable = [
        'title', 'alias', 'keywords', 'description'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'categories_products',
            'category_id', 'product_id');
    }
}
