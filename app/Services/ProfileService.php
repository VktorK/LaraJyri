<?php

namespace App\Services;

use App\Models\Profile;
use Illuminate\Database\Eloquent\Collection;

class ProfileService
{
    public static function index(): Collection
    {
        return Profile::all();
    }

    public static function create(array $data)
    {
        return Profile::create($data);
    }

    public static function update(Profile $profile, array $data): Profile
    {
        $profile->update($data);
        return $profile->fresh();
    }

    public static function destroy(Profile $profile)
    {
        return $profile->delete();
    }
}
