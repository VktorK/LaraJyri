<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreProductRequest;
use App\Http\Requests\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return ProductResource::collection(Product::all())->resolve();
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = Product::create($data);
        return ProductResource::make($product);

    }

    /**
     * Display the specified resource.
     */
    public function show(Product $product): ProductResource
    {
        return ProductResource::make($product);
    }

    /**
     * Show the form for editing the specified resource.
     */


    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProductRequest $request, Product $product): ProductResource
    {
        $data = $request->validated();
        $product->update($data);
        $product = $product->fresh();
        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): ResponseAlias
    {
        $product->delete();
        return response(ResponseAlias::HTTP_OK);
    }
}
