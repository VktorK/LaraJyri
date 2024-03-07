<?php

namespace App\Http\Controllers;

use App\Http\Requests\Promocode\UpdateUserRequest;
use App\Http\Resources\PromocodeResource;
use App\Models\Promocode;
use Illuminate\Http\Request;

class PromocodeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Promocode $promocode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Promocode $promocode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function updateUser(UpdateUserRequest $request)
    {
        $data = $request->validationData();
        $data['promocode']->update(['user_id'=>auth()->id()]);
        return PromocodeResource::make($data['promocode']);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Promocode $promocode)
    {
        //
    }
}
