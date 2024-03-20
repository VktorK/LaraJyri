<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Order\IndexRequest;
use App\Http\Requests\Order\StoreOrderRequest;
use App\Http\Requests\Order\UpdateOrderRequest;
use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Models\Product;
use App\Services\OrderService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();
        $orders = Order::filter($data)->get();
        return OrderResource::collection($orders)->resolve();
    }

    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreOrderRequest $request): OrderResource
    {
        $data = $request->validated();
        $order =  OrderService::create($data);
        return OrderResource::make($order);

    }

    /**
     * Display the specified resource.
     */
    public function show(Order $order): OrderResource
    {
        return OrderResource::make($order);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateOrderRequest $request, Order $order): OrderResource
    {
        $data = $request->validated();
        $order = OrderService::update($order,$data);
        return OrderResource::make($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): ResponseAlias
    {
       OrderService::destroy($order);
       return response(ResponseAlias::HTTP_OK);
    }
}
