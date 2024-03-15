<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\DestroyOrderRequest;
use App\Http\Requests\Order\DestroyProductRequest;
use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\StoreTransactionDebetRequest;
use App\Http\Requests\Order\UpdateProductRequest;
use App\Http\Requests\Order\UpdateProtuctRequest;
use App\Http\Requests\Order\UpdateStatusRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use App\Models\Transaction;
use App\Services\OrderService;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\GlobalState\Exception;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class OrderController extends Controller
{

    public function store(StoreRequest $request)
    {
        try {
            Db::beginTransaction();
            $order = Order::create([
                'user_id' => auth()->id()
            ]);

            auth()->user()->productsInCart()->updateExistingPivot(auth()->user()->productsInCart->pluck('id'), [
                'order_id' => $order->id
            ]);


            Db::commit();
        } catch (\Exception $exception) {
            DB::rollBack();
        }


        return OrderResource::make($order)->resolve();
    }

    public function updateStatus(Order $order, UpdateStatusRequest $request)
    {
        $data = $request->validated();
        $order->update($data);
        $order = $order->fresh();
        return OrderResource::make($order)->resolve();

    }

    public function updateProducts(Order $order,UpdateProductRequest $request)
    {
        $data = $request->validated();
        $order = OrderService::updateProductQty($order, $data);
        return OrderResource::make($order)->resolve();

    }

    public function destroyOrder(Order $order,DestroyOrderRequest $request)
    {
        $data = $request->validated();
        OrderService::destroyOrder($order,$data);
        return ResponseAlias::HTTP_OK;
    }

    public function destroyProduct(Order $order,DestroyProductRequest $request)
    {
        $data = $request->validated();
        $order = OrderService::destroyProduct($order,$data);
        return OrderResource::make($order)->resolve();
    }

    public function storeTransactionsDebet(Order $order,StoreTransactionDebetRequest $request)
    {
        $transaction = $order->transactions()->create([
            "value"=> $order->total_price
        ]);
        try
        {
            Db::beginTransaction();
            $transaction->update([
                'status'=> Transaction::STATUS_SUCCSSES
            ]);

            $order->update([
                'status'=> Order::STATUS_SUCCSSES
            ]);

            $order->user()->profile()->update([
               'balance'=>$order->user()->profile->balance - $order->total_price,
            ]);

            Db::commit();
        } catch (\Exception $exception)
        {
            $transaction->update([
                'status'=> Transaction::STATUS_FAILED
            ]);
            DB::rollBack();
        }
        return OrderResource::make($order)->resolve();

    }

}
