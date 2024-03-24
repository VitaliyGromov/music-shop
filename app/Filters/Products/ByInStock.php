<?php

namespace App\Filters\Products;

use Illuminate\Database\Eloquent\Builder;

class ByInStock
{
    public function handle(Builder $builder, \Closure $next)
    {
        $request = request();

        return $next($builder)
            ->when($request->has('in_stock'),
                function($query) use ($request) {
                    $query->where('in_stock', $request->in_stock);
                }
            );
    }
}
