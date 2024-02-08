<?php

namespace App\Http\Controllers;

use App\Http\Requests\StorePromocodeRequest;
use App\Http\Requests\UpdatePromocodeRequest;
use App\Models\Promocode;
use Illuminate\Http\Response;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Promocode::all();
        return $data->fresh();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePromocodeRequest $request)
    {
        $data = $request->validated();
        return Promocode::create($data);
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode)
    {
        return $promocode;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePromocodeRequest $request, Promocode $promocode)
    {
        $data = $request->validated();
        $promocode->update($data);
        return $promocode->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode)
    {
        $promocode->delete();
        return response(Response::HTTP_OK);
    }
}
