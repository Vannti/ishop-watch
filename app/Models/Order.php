<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $table = 'orders';

    protected $fillable = [
        'user_id', 'currency_id', 'status', 'note', 'price'
    ];

    protected $casts = [
        'status' => 'boolean'
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'orders_products', 'order_id', 'product_id');
    }

    public function currency()
    {
        return $this->belongsTo(Currency::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
