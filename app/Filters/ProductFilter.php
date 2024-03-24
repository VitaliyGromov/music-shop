<?php

declare(strict_types=1);

namespace App\Filters;

use App\Filters\Core\AbstractFilter;
use App\Filters\Products\ByDescription;
use App\Filters\Products\ByInStock;
use App\Filters\Products\ByName;
use App\Filters\Products\ByPrice;

class ProductFilter extends AbstractFilter
{
    public function filters(): array
    {
        return [
            ByName::class,
            ByDescription::class,
            ByPrice::class,
            ByInStock::class
        ];
    }
}
