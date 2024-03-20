<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\Transaction\StoreTypeDebetRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use App\Services\TransactionService;
use Illuminate\Database\Query\Builder;
use Illuminate\Http\Request;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\DB;
use Mockery\Exception;

class TransactionController extends Controller
{

    public function index()
    {

        return TransactionResource::collection(\App\Services\User\TransactionService::index())->resolve();
    }

    public function storeTypeDebet(StoreTypeDebetRequest $request)
    {
        $data = $request->validated();
        $transaction = Transaction::create($data);
        return TransactionResource::make($transaction)->resolve();
    }

    public function updateStatusSuccess(Transaction $transaction)
    {

        try {
            DB::beginTransaction();
            $transaction->update([
                'status' => Transaction::STATUS_SUCCSESS
            ]);

            $transaction->user->profile()->update([
                'balance' => $transaction->user->profile->balance + $transaction->value,
            ]);

            DB::commit();

        } catch (\Exception $exception) {
            $transaction->update([
                'status' => Transaction::STATUS_FAILED
            ]);
            DB::rollBack();
        }
        return Response::HTTP_OK;
    }

    public function updateStatusExternalFailed(Transaction $transaction)
    {

        $transaction->update([
            'status' => Transaction::STATUS_EXTERNAL_FAILED
        ]);
        return Response::HTTP_OK;
    }

}
