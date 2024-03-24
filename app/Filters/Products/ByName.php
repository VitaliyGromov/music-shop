<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Builder;

class ByName
{
    public function handle(Builder $builder, \Closure $next)
    {
        $request = request();

        return $next($builder)
            ->when($request->has('name'),
                fn($query) => $query->where('name', 'ILIKE', "%$request->name%")
            );
    }
}
