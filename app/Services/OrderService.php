<?php

namespace App\Services;

use App\Http\Requests\Order\DestroyProductRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Support\Facades\DB;

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

    public static function updateProductQty(Order $order, array $data): Order
    {
        try {
            Db::beginTransaction();

            auth()->user()->updateProductQty($order)->syncWithoutDetaching([$data['product_id']=>[
                'qty' => $data['qty']
            ]]);
            Db::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }
        return $order->fresh();
    }

    public static function destroyOrder(Order $order, array $data): void
    {
        if($data) {
            try {
                DB::beginTransaction();
                auth()->user()->destroyOrder($order)->sync([]);
                $order->delete();
                DB::commit();
            } catch (\Exception $exception) {
                DB::rollBack();
            }
        }
    }

    public static function destroyProduct(Order $order,array $data): Order
    {
        auth()->user()->destroyProduct($order)->detach($data['product_id']);
        return $order;
    }

}
