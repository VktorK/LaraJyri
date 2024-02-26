<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserTrue\StoreUserRequest;
use App\Http\Requests\UserTrue\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Response;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    public function store(StoreUserRequest $request)
    {
        $data = $request->validationData();
        $user = User::create($data);
        return \response()->json([
            'user' =>  UserResource::make($user)->resolve(),
            'token' => Auth::fromUser($user),
        ], ResponseAlias::HTTP_OK);

    }

    public function update(UpdateUserRequest $request)
    {
        $data = $request->validationData();
        auth()->user()->update($data);
        return UserResource::make(auth()->user());
    }

    public function destroy()
    {
        auth()->user()->delete();
        return response()->json([
            'message'=>'Пользователь удален'
        ], ResponseAlias::HTTP_OK);
    }
}
