<?php

declare(strict_types=1);

namespace App\Models;

use App\Filters\Traits\Filterable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

/**
 * App\Models\Category
 *
 * @property int         $id            ID
 * @property string      $name          Наименование категории
 * @property int         $category_id   Id родительской категории
 */
class Category extends Model
{
    use HasFactory;
    use Filterable;

    protected $guarded = [];

    public function subcategories(): HasMany
    {
        return $this->HasMany(Subcategory::class);
    }

    public function characteristics(): HasMany
    {
        return $this->hasMany(Characteristic::class);
    }
}
