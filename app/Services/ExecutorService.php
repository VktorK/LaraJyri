<?php

namespace App\Services;

use App\Models\Executor;
use Illuminate\Database\Eloquent\Collection;

class ExecutorService
{
    public static function index(): Collection
    {
        return Executor::all();
    }

    public static function create(array $data)
    {
        return Executor::create($data);
    }

    public static function update(Executor $executor, array $data): Executor
    {
        $executor->update($data);
        return $executor->fresh();
    }

    public static function destroy(Executor $executor)
    {
        return $executor->delete();
    }
}
