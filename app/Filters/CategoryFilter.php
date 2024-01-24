<?php

namespace App\Filters;

use App\Filters\Core\AbstractFilter;

class CategoryFilter extends AbstractFilter
{
    public function name($name): static
    {
        return $this->where('name', 'ILIKE', "%$name%");
    }
}
