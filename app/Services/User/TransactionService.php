<?php

namespace App\Services\User;

use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;


class TransactionService
{
    public static function index(): Collection
    {
        return auth()->user()->transactions()->get();
    }


}
