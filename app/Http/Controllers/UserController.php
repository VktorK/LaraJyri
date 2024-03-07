<?php

namespace App\Http\Controllers;

use App\Http\Requests\User\DestroyProductToCartRequest;
use App\Http\Requests\User\StoreProductToCartRequest;
use App\Http\Requests\User\UpdateProductToCartRequest;
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
        return UserResource::make(auth()->user())->resolve();
    }

    public function destroy()
    {
        auth()->user()->delete();
        return response()->json([
            'message'=>'Пользователь удален'
        ], ResponseAlias::HTTP_OK);
    }

    public function storeProductToCart(StoreProductToCartRequest $request)
    {
        $data = $request->validated();

        auth()->user()->productsInCart()->syncWithoutDetaching($data['product_id']);
        return response()->json([
            'message'=>'Продукт добавлен'
        ],ResponseAlias::HTTP_OK);

    }

    public function updateProductInCart(UpdateProductToCartRequest $request)
    {
        $data = $request->validated();

        auth()->user()->productsInCart()->updateExistingPivot($data['product_id'], [
            'qty' => $data['qty']
        ]);
        return response()->json([
            'message'=>'Продукт updated'
        ],ResponseAlias::HTTP_OK);

    }


    public function destroyProductInCart(DestroyProductToCartRequest $request)
    {
        $data = $request->validated();

        auth()->user()->productsInCart()->detach($data);

        return response()->json([
            'message'=>'Product deleted'
        ],ResponseAlias::HTTP_OK);

    }
}
