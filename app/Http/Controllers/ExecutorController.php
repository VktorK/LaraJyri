<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreExecutorRequest;
use App\Http\Requests\UpdateExecutorRequest;
use App\Http\Resources\ExecutorResource;
use App\Models\Executor;
use Illuminate\Http\Response;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ExecutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = Executor::all();
        return $data->fresh();

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
    public function store(StoreExecutorRequest $request)
    {
        $data = $request->validated();
        return Executor::create($data);

    }

    /**
     * Display the specified resource.
     */
    public function show(Executor $executor)
    {
       return ExecutorResource::make($executor)->resolve();
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Executor $executor)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateExecutorRequest $request, Executor $executor)
    {
        $data = $request->validated();
        $executor->update($data);
        return $executor->fresh();
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Executor $executor)
    {
        $executor->delete();
        return response(\Illuminate\Http\Response::HTTP_OK);
    }
}
