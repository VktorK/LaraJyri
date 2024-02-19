<?php

namespace App\Services;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;


class TransactionService
{
    public static function index(): Collection
    {
        return Transaction::all();
    }

    public static function create($data)
    {
        return Transaction::create($data);
    }

    public static function update(Transaction $transaction, array $data): Transaction
    {
        $transaction->update($data);
        return $transaction->fresh();
    }

    public static function destroy($transaction)
    {
        return $transaction->delete();
    }

}
