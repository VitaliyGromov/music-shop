<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Builder;

class ByPrice
{
    public function handle(Builder $builder, \Closure $next)
    {
        $request = request();

        return $next($builder)
            ->when($request->has('price'),
                fn($query) => $query->where('price', $request->price)
            );
    }
}
