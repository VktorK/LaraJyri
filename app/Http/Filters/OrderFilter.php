<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class OrderFilter extends AbstractFilter
{
    protected array $keys = [
        'created_from',
        'created_to',
        'total_sum_from',
        'total_sum_to'
    ];


    protected function totalSumFrom(Builder $builder, mixed $value)
    {
        $builder->where('total_sum', '>=', $value);
    }

    protected function totalSumTo(Builder $builder, mixed $value)
    {
        $builder->where('total_sum', '<=', $value);
    }

    protected function createdFrom(Builder $builder, mixed $value)
    {
        $builder->where('created_at', '>=', $value);
    }

    protected function createdTo(Builder $builder, mixed $value)
    {
        $builder->where('created_at', '<=', $value);
    }
}
