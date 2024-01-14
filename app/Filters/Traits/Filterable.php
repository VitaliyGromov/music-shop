<?php

namespace App\Filters\Traits;

trait Filterable
{
    public static function getFilterClassName(): string
    {
        $modelName = class_basename(static::class);

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
