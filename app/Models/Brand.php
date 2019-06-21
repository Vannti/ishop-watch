<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    public $timestamps = false;

    protected $table = 'brands';

    protected $fillable = [
        'title', 'alias', 'img', 'description'
    ];

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
