<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Gallery extends Model
{
    public $timestamps = false;

    protected $table = 'galleries';

    protected $fillable = [
        'product_id', 'img'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
