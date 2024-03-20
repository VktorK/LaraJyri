<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Executor\IndexRequest;
use App\Http\Requests\Executor\StoreExecutorRequest;
use App\Http\Requests\Executor\UpdateExecutorRequest;
use App\Http\Resources\ExecutorResource;
use App\Models\Executor;
use App\Services\ExecutorService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ExecutorController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(IndexRequest $request): array
    {
        $data = $request->validated();
        $executors = Executor::filter($data)->get();
        return ExecutorResource::collection($executors)->resolve();

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
        $executor =  ExecutorService::create($data);
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
        $executor =  ExecutorService::update($executor,$data);
        return ExecutorResource::make($executor);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Executor $executor): ResponseAlias
    {
        ExecutorService::destroy($executor);
        return response(ResponseAlias::HTTP_OK);
    }
}
