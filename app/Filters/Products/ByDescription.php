<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Builder;

class ByDescription
{
    public function handle(Builder $builder, \Closure $next)
    {
        $request = request();

        return $next($builder)
            ->when($request->has('description'),
                fn($query) => $query->where('description', 'ILIKE', "%$request->description%")
            );
    }
}
