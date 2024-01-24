<?php

namespace App\Filters\Core;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Query\Builder as QueryBuilder;

abstract class AbstractFilter extends Builder
{
    protected $model;
    public function __construct(QueryBuilder $query)
    {
        parent::__construct($query);
    }
}
