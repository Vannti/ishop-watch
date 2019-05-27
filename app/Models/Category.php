<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    public $timestamps = false;

    protected $table = 'category';

    protected $fillable = [
        'title', 'alias', 'parent_id', 'keywords', 'description'
    ];
}
