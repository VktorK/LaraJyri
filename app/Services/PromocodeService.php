<?php

namespace App\Services;

use App\Models\Promocode;
use App\Models\Transaction;
use Illuminate\Database\Eloquent\Collection;

class PromocodeService
{
    public static function index(): Collection
    {
        return Promocode::all();
    }

    public static function create($data)
    {
        return Promocode::create($data);
    }

    public static function update(Promocode $promocode, array $data): Promocode
    {
        $promocode->update($data);
        return $promocode->fresh();
    }

    public static function destroy($promocode)
    {
        return $promocode->delete();
    }
}
