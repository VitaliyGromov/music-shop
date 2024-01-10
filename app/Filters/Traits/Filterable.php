<?php

namespace App\Filters\Traits;

use ReflectionClass;

trait Filterable
{
    public static function getFilterClassName(): string
    {
        $modelName = (new ReflectionClass(static::class))->getShortName();

        return $modelName . 'Filter';
    }

    public function createInstanceOfFilterClass()
    {
        $class = 'App\Filters\\' . self::getFilterClassName();

        return new $class;
    }
    public function getFilterClassMethods(): array
    {
        $filterClass = $this->createInstanceOfFilterClass();

        return get_class_methods($filterClass::class);
    }
}
