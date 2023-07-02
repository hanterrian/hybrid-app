<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\CategoryFilterItem
 *
 * @property int $id
 * @property int $category_id
 * @property int $filter_option_id
 * @property string|null $value
 * @property string|null $min_value
 * @property string|null $max_value
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property array|null $value_list
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\Category> $category
 * @property-read int|null $category_count
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\FilterOption> $filterOption
 * @property-read int|null $filter_option_count
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem query()
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereCategoryId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereFilterOptionId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereMaxValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereMinValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereValue($value)
 * @method static \Illuminate\Database\Eloquent\Builder|CategoryFilterItem whereValueList($value)
 * @mixin \Eloquent
 */
class CategoryFilterItem extends Model
{
    protected $fillable = [
        'category_id',
        'filter_option_id',
        'value',
        'value_list',
        'min_value',
        'max_value',
    ];

    protected $casts = [
        'value_list' => 'array',
    ];

    public function category(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(Category::class);
    }

    public function filterOption(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(FilterOption::class, 'id', 'filter_option_id');
    }
}
