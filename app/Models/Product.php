<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    public $timestamps = false;

    protected $table = 'products';

    protected $fillable = [
        'title', 'brand_id', 'alias', 'content', 'price', 'old_price',
        'status', 'keywords', 'description', 'img', 'hit'
    ];

    protected $casts = [
        'status' => 'boolean',
        'hit' => 'boolean'
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class, 'categories_products',
            'product_id', 'category_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'orders_products',
            'product_id', 'order_id')->withPivot('qty', 'price');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class);
    }

    public function galleries()
    {
        return $this->hasMany(Gallery::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }
}
