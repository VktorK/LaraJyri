<?php

namespace App\Services;

use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;

class OrderService
{
    public static function index(): Collection
    {
        return Order::all();
    }

    public static function create(array $data)
    {
        return Order::create($data);
    }

    public static function update(Order $order, array $data): Order
    {
        $order->update($data);
        return $order->fresh();
    }

    public static function destroy(Order $order)
    {
        return $order->delete();
    }
}
