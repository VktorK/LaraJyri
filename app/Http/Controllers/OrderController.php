<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Http\Resources\ExecutorResource;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return OrderResource::collection(Order::all())->resolve();
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
        $order =  Order::create($data);
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
        $order ->update($data);
        $order =  $order->fresh();
        return OrderResource::make($order);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Order $order): ResponseAlias
    {
       $order->delete();
       return response(ResponseAlias::HTTP_OK);
    }
}
