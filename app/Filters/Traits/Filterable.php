<?php

declare(strict_types=1);

namespace App\Filters\Traits;

use App\Filters\Core\AbstractFilter;
use Illuminate\Database\Query\Builder;

trait Filterable
{
    public static function getTableName(): string
    {
        return ((new self)->getTable());
    }

    public static function getFilterClassName(): string
    {
        $modelName = class_basename(static::class);

        return 'App\Filters\\'. $modelName.'Filter';
    }

    public static function createInstanceOfFilterClass(Builder $builder): object
    {
        $filter = new (self::getFilterClassName())($builder);

        self::setFilterTable($filter);

        return $filter;
    }

    public static function setFilterTable(AbstractFilter $filter): void
    {
        $filter->from = self::getTableName();
    }

    public static function getFilterClassMethods(AbstractFilter $filter): array
    {
        $reflection = new \ReflectionClass($filter);

        $methods = [];

        foreach ($reflection->getMethods() as $method){
            if ($method->class === self::getFilterClassName()){
                $methods[] = $method->name;
            }
        }

        return $methods;
    }

    public static function filter(Builder $builder)
    {
        $filter = self::createInstanceOfFilterClass($builder);

        return $filter->from;
    }
}
