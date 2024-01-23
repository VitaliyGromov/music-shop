<?php

declare(strict_types=1);

namespace App\Filters;

use App\Filters\Core\AbstractFilter;

class ProductFilter extends AbstractFilter
{
    public function name(string $name): static
    {
        return $this->where('name', $name);
    }

    public function brand_id(int $brandId): static
    {
        return $this->where('brand_id', $brandId);
    }

    public function price(int $price): static
    {
        return $this->where('price', $price);
    }

    public function description(string $description): static
    {
        return $this->where('description', $description);
    }

    public function check()
    {
        return 'check';
    }
}
