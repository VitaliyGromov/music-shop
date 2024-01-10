<?php

namespace App\Filters;

class ProductFilter
{
    public function name(): string
    {
        return 'search by name';
    }

    public static function filter(): string
    {
        return 'filters';
    }
}
