<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class CategoryFilterItem extends Model
{
    protected $fillable = [
        'value',
        'min_value',
        'max_value',
    ];
}
