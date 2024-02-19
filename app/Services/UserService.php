<?php

namespace App\Services;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;

class UserService
{
    public static function index(): Collection
    {
        return User::all();
    }

    public static function create(array $data)
    {
        return User::create($data);
    }

    public static function update(User $user, array $data): User
    {
        $user->update($data);
        return $user->fresh();
    }

    public static function destroy(User $user)
    {
        return $user->delete();
    }
}
