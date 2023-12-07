<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brand
 * @property int         $id            ID
 * @property string      $name          Наименование категории
 * @property int         $category_id   Id родительской категории
 *
 */
class Category extends Model
{
    use HasFactory;

    protected $guarded = [];
}
