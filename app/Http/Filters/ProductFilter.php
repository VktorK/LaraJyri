<?php

namespace App\Http\Filters;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Str;

class ProductFilter extends AbstractFilter
{
    protected array $keys = [
        'title',
        'content',
        'price_from',
        'price_to',
        'created_from',
        'created_to',
        'categories_of_product_id'
    ];

    protected function title(Builder $builder, mixed $value)
    {
        $builder->where('title', 'ilike', "%{$value}%");
    }

    protected function content(Builder $builder, mixed $value)
    {
        $builder->where('content', 'ilike', "%{$value}%");
    }

    protected function priceFrom(Builder $builder, mixed $value)
    {
        $builder->where('price', '>=', $value);
    }

    protected function priceTo(Builder $builder, mixed $value)
    {
        $builder->where('price', '<=', $value);
    }

    protected function createdFrom(Builder $builder, mixed $value)
    {
        $builder->where('created_at', '>=', $value);
    }

    protected function createdTo(Builder $builder, mixed $value)
    {
        $builder->where('created_at', '<=', $value);
    }

    protected function categoryOfProductId(Builder $builder, mixed $value)
    {
        $builder->where('category_of_product_id', '==', $value);
    }

}
