<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\StoreUserRequest;
use App\Http\Requests\User\UpdateUserRequest;
use App\Http\Resources\UserResource;
use App\Models\User;

use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return UserResource::collection(User::all())->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreUserRequest $request)
    {
        $data = $request->validationData();
        $user = User::create($data);
        return UserResource::make($user);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user): UserResource
    {
        return UserResource::make($user);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateUserRequest $request, User $user): UserResource
    {
        $data = $request->validated();
        $user->update($data);
        $user = $user->fresh();
        return UserResource::make($user);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user): ResponseAlias
    {
        $user->delete();
        return response(ResponseAlias::HTTP_OK);
    }
}
