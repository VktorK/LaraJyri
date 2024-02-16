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
    public function index(): array
    {
        return ExecutorResource::collection(Executor::all())->resolve();

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
    public function store(StoreExecutorRequest $request): ExecutorResource
    {
        $data = $request->validated();
        $executor =  Executor::create($data);
        return ExecutorResource::make($executor);

    }

    /**
     * Display the specified resource.
     */
    public function show(Executor $executor): ExecutorResource
    {
       return ExecutorResource::make($executor);
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
    public function update(UpdateExecutorRequest $request, Executor $executor): ExecutorResource
    {
        $data = $request->validated();
        $executor->update($data);
        $executor =  $executor->fresh();
        return ExecutorResource::make($executor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Executor $executor): ResponseAlias
    {
        $executor->delete();
        return response(ResponseAlias::HTTP_OK);
    }
}
