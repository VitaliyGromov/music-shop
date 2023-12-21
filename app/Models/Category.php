<?php

declare(strict_types=1);

namespace App\Models;

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

    protected $guarded = [];

    public function subcategories(): HasMany
    {
        return $this->HasMany(Subcategory::class);
    }
}
