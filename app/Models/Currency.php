<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use phpDocumentor\Reflection\Types\Boolean;

class Currency extends Model
{
    public $timestamps = false;

    protected $table = 'currencies';

    protected $fillable = [
        'title', 'code', 'symbol', 'value'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }
}
