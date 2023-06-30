<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * App\Models\FilterOption
 *
 * @property int $id
 * @property string $name
 * @property string $type
 * @property bool $enable
 * @property \Illuminate\Support\Carbon|null $deleted_at
 * @property \Illuminate\Support\Carbon|null $created_at
 * @property \Illuminate\Support\Carbon|null $updated_at
 * @property-read \Illuminate\Database\Eloquent\Collection<int, \App\Models\CategoryFilterItem> $categoryFilterItems
 * @property-read int|null $category_filter_items_count
 * @method static \Database\Factories\FilterOptionFactory factory($count = null, $state = [])
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption newModelQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption newQuery()
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption onlyTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption query()
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereCreatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereDeletedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereEnable($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereId($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereName($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereType($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption whereUpdatedAt($value)
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption withTrashed()
 * @method static \Illuminate\Database\Eloquent\Builder|FilterOption withoutTrashed()
 * @mixin \Eloquent
 */
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

    public function categoryFilterItems(): \Illuminate\Database\Eloquent\Relations\HasMany
    {
        return $this->hasMany(CategoryFilterItem::class);
    }
}
