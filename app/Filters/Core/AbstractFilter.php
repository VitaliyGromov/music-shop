<?php

namespace App\Filters\Core;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Pipeline;

abstract class AbstractFilter
{
    public function __construct(
        protected Model $model
    ){}

    public function handle()
    {
        return Pipeline::send($this->model::query())
            ->through($this->filters())
            ->thenReturn();
    }
    abstract public function filters(): array;
}
