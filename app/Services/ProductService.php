<?php

namespace App\Services;

use App\Models\Product;
use Illuminate\Database\Eloquent\Collection;

class ProductService
{
    public static function index(): Collection
    {
        return Product::all();
    }

    public static function create(array $data)
    {
        return Product::create($data);
    }

    public static function update(Product $product, array $data): Product
    {
        $product->update($data);
        return $product->fresh();
    }

    public static function destroy(Product $product)
    {
        return $product->delete();
    }
}
