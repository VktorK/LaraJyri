<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class PromocodeFilter extends AbstractFilter
{
    protected array $keys = [
        'code',
        'value',
        'date_of_end_from',
        'date_of_end_to',
        'limit_from_from',
        'limit_from_to',
        'created_from',
        'created_to'
    ];

    protected function code(Builder $builder, mixed $value)
    {
        $builder->where('code', 'ilike', "%{$value}%");
    }

    protected function value(Builder $builder, mixed $value)
    {
        $builder->where('value', 'ilike', "%{$value}%");
    }

    protected function dateOfEndFrom(Builder $builder, mixed $value)
    {
        $builder->where('date_of_end', '>=', $value);
    }

    protected function dateOfEndTo(Builder $builder, mixed $value)
    {
        $builder->where('date_of_end', '<=', $value);
    }

    protected function limitFromFrom(Builder $builder, mixed $value)
    {
        $builder->where('limit_from', '>=', $value);
    }

    protected function limitFromTo(Builder $builder, mixed $value)
    {
        $builder->where('limit_from', '>=', $value);
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
