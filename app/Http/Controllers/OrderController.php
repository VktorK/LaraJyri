<?php

namespace App\Http\Controllers;

use App\Http\Requests\Order\StoreRequest;
use App\Http\Requests\Order\UpdateStatusRequest;
use App\Http\Resources\OrderResource;
use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use SebastianBergmann\GlobalState\Exception;

class OrderController extends Controller
{

    public function updateStatus(Order $order, UpdateStatusRequest $request)
    {
        $data = $request->validated();
        $order->update($data);
        $order = $order->fresh();
        return OrderResource::make($order)->resolve();

    }


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
}
