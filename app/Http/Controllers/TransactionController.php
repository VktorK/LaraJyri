<?php

namespace App\Http\Controllers;

use App\Http\Requests\Transaction\StoreTransactionRequest;
use App\Http\Requests\Transaction\UpdateTransactionRequest;
use App\Http\Resources\TransactionResource;
use App\Models\Transaction;
use http\Client\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class TransactionController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return TransactionResource::collection(Transaction::all())->resolve();
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreTransactionRequest $request): TransactionResource
    {
        $data = $request->validationData();
        $transactions = Transaction::create($data);
        return TransactionResource::make($transactions);

    }

    /**
     * Display the specified resource.
     */
    public function show(Transaction $transaction): TransactionResource
    {
        return TransactionResource::make($transaction);
    }


    public function update(UpdateTransactionRequest $request, Transaction $transaction): TransactionResource
    {
        $data = $request->validationData();
        $transaction->update($data);
        $transactions = $transaction->fresh();
        return TransactionResource::make($transactions);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Transaction $transaction): ResponseAlias
    {
        $transaction->delete();
        return response(ResponseAlias::HTTP_OK);
    }
}
