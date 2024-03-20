<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Promocode\IndexRequest;
use App\Http\Requests\Promocode\StorePromocodeRequest;
use App\Http\Requests\Promocode\UpdatePromocodeRequest;
use App\Http\Resources\PromocodeResource;
use App\Models\Promocode;
use App\Services\PromocodeService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();
        $promocodes = Promocode::filter($data)->get();
        return PromocodeResource::collection($promocodes)->resolve();
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
