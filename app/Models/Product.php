<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
/**
 * class App\Models\Product
 *
 * @property $id
 * @property $name
 * @property $in_stock На складе ли товар
 * @property $description Описание
 * @property $price Цена
 * @property $category_id
 * @property $brand_id
*/
class Product extends Model
{
    use HasFactory;

    protected $guarded = [];
}
