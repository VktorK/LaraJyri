<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use App\Http\Resources\PromocodeResource;
use App\Http\Resources\TransactionResource;
use App\Models\Promocode;
use App\Services\PromocodeService;
use App\Services\TransactionService;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(): array
    {
        return PromocodeResource::collection(PromocodeService::index())->resolve();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromocodeRequest $request): PromocodeResource
    {
        $data = $request->validated();
        $promocode = PromocodeService::create($data);
        return PromocodeResource::make($promocode);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode): PromocodeResource
    {
        return PromocodeResource::make($promocode);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocodeRequest $request, Promocode $promocode): PromocodeResource
    {
        $data = $request->validated();
        $promocode = PromocodeService::update($promocode,$data);
        return PromocodeResource::make($promocode);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode): ResponseAlias
    {
        PromocodeService::destroy($promocode);
        return response(ResponseAlias::HTTP_OK);
    }
}
