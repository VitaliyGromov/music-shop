<?php

declare(strict_types=1);

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * App\Models\Brand
 *
 * @property int         $id         ID
 * @property string      $name       Наименование бренда
 */
class Brand extends Model
{
    use HasFactory;

    protected $guarded = [];
}
