<?php

declare(strict_types=1);

namespace App\Filters\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Query\Builder;

trait Filterable
{
    public static function filter()
    {
        $model = static::query()->getModel();
        $filterClass = self::createInstanceOfFilterClass($model);

        return $filterClass->handle();
    }

    private static function createInstanceOfFilterClass(Model $model): object
    {
        return new (self::getFilterClassName())($model);
    }

    private static function getFilterClassName(): string
    {
        $modelName = class_basename(static::class);

        return 'App\Filters\\'. $modelName.'Filter';
    }
}
