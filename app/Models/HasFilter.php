<?php

namespace App\Models;

use App\Http\Filters\ProductFilter;
use Illuminate\Database\Eloquent\Builder;

trait HasFilter
{
    public function scopeFilter(Builder $builder, array $data): Builder
    {
        $className = 'App\Http\Filters\\' . class_basename($this) . 'Filter';
        $filter = app()->make($className);
        return $filter->apply($builder,$data);
    }
}
