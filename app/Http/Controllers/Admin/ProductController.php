<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Product\IndexRequest;
use App\Http\Requests\Product\StoreProductRequest;
use App\Http\Requests\Product\UpdateProductRequest;
use App\Http\Resources\ProductResource;
use App\Models\Product;
use App\Services\ProductService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;


class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();
        $products = Product::filter($data)->get();
        return ProductResource::collection($products)->resolve();
    }

    public function store(StoreProductRequest $request)
    {
        $data = $request->validated();
        $product = ProductService::create($data);
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
       $product = ProductService::update($product,$data);
        return ProductResource::make($product);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Product $product): ResponseAlias
    {
        ProductService::destroy($product);
        return response(ResponseAlias::HTTP_OK);
    }
}
