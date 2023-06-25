<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class FilterOption extends Model
{
    use SoftDeletes, HasFactory;

    public const TYPE_TEXT = 'text';
    public const TYPE_SELECT = 'select';
    public const TYPE_RANGE = 'range';

    public const TYPES = [
        self::TYPE_TEXT => 'Text',
        self::TYPE_SELECT => 'Select',
        self::TYPE_RANGE => 'Range',
    ];

    protected $fillable = [
        'name',
        'type',
        'enable',
    ];
}
