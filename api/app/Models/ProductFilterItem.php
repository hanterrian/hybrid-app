<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\ProductFilterItem
 *
 * @property int $id
 * @property int $category_id
 * @property int $filter_option_id
 * @property int $category_filter_item_id
 * @property string|null $value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereCategoryFilterItemId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereFilterOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|ProductFilterItem whereValue($value)
 * @mixin \Eloquent
 */
class ProductFilterItem extends Model
{
    protected $fillable = [
        'value',
    ];
}
