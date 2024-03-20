<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ExecutorFilter extends AbstractFilter
{
    protected array $keys = [
        'Last_name',
        'First_name',
        'Middle_name',
        'Phone',
        'Specialization',
        'experience_from',
        'experience_to',
        'address',
        'created_from',
        'created_to'
    ];

    protected function LastName(Builder $builder, mixed $value)
    {
        $builder->where('Last_name', 'ilike', "%{$value}%");
    }

    protected function FirstName(Builder $builder, mixed $value)
    {
        $builder->where('First_name', 'ilike', "%{$value}%");
    }

    protected function MiddleName(Builder $builder, mixed $value)
    {
        $builder->where('Middle_name', 'ilike', "%{$value}%");
    }

    protected function Specialization(Builder $builder, mixed $value)
    {
        $builder->where('Specialization', 'ilike', "%{$value}%");
    }

    protected function address(Builder $builder, mixed $value)
    {
        $builder->where('address', 'ilike', "%{$value}%");
    }

    protected function Phone(Builder $builder, mixed $value)
    {
        $builder->where('Phone', 'ilike', "%{$value}%");
    }

    protected function experienceFrom(Builder $builder, mixed $value)
    {
        $builder->where('experience', '>=', $value);
    }

    protected function experienceTo(Builder $builder, mixed $value)
    {
        $builder->where('experience', '<=', $value);
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
