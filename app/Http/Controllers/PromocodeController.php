<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use App\Http\Resources\PromocodeResource;
use App\Models\Promocode;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return PromocodeResource::collection(Promocode::all())->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromocodeRequest $request)
    {
        $data = $request->validated();
        $promocode = Promocode::create($data);
        return PromocodeResource::make($promocode);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode)
    {
        return PromocodeResource::make($promocode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocodeRequest $request, Promocode $promocode): PromocodeResource
    {
        $data = $request->validated();
        $promocode->update($data);
        $promocode = $promocode->fresh();
        return PromocodeResource::make($promocode);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode): ResponseAlias
    {
        $promocode->delete();
        return response(ResponseAlias::HTTP_OK);
    }
}
