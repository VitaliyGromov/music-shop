<?php

declare(strict_types=1);

namespace App\Filters\Traits;

use Illuminate\Database\Eloquent\Builder as EloquentBuilder;
use Illuminate\Database\Query\Builder;

trait Filterable
{
    public static function filter(array $requestData)
    {
        /** @var EloquentBuilder $query */
        $query = ('App\\Models\\' . class_basename(static::class))::query();

        if (collect($requestData)->isEmpty()){
            return $query;
        }

        $filter = self::createInstanceOfFilterClass($query->getQuery());

        $filter->setModel($query->getModel());

        foreach ($requestData as $key => $value){
            $query = $filter->$key($value);
        }

        return $query;
    }

    public static function createInstanceOfFilterClass(Builder $builder): object
    {
        return new (self::getFilterClassName())($builder);
    }

    public static function getFilterClassName(): string
    {
        $modelName = class_basename(static::class);

        return 'App\Filters\\'. $modelName.'Filter';
    }
}
