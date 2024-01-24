<?php

declare(strict_types=1);

namespace App\Filters;

use App\Filters\Core\AbstractFilter;

class ProductFilter extends AbstractFilter
{
    public function name($name): static
    {
        return $this->where('name', 'ILIKE', "%$name%");
    }

    public function brand_id($brandId): static
    {
        return $this->where('brand_id', $brandId);
    }

    public function price($price): static
    {
        return $this->where('price', $price);
    }

    public function description($description): static
    {
        return $this->where('description', $description);
    }

    public function in_stock($inStock): static
    {
        return $this->where('in_stock', $inStock);
    }
}
