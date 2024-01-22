<?php

namespace App\Filters\Core;

use Illuminate\Database\Eloquent\Builder;

abstract class AbstractFilter extends Builder
{
    public $from;
}
