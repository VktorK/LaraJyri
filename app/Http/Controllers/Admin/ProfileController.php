<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Profile\StoreProfileRequest;
use App\Http\Requests\Profile\UpdateProfileRequest;
use App\Http\Resources\ProfileResource;
use App\Models\Profile;
use App\Services\ProfileService;
use Symfony\Component\HttpFoundation\Response as ResponseAlias;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return ProfileResource::collection(ProfileService::index())->resolve();

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
    public function store(StoreProfileRequest $request): ProfileResource
    {
        $data = $request->validated();
        $profiles = ProfileService::create($data);
        return ProfileResource::make($profiles);

    }

    /**
     * Display the specified resource.
     */
    public function show(Profile $profile): ProfileResource
    {
        return ProfileResource::make($profile);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Profile $profile)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateProfileRequest $request, Profile $profile): ProfileResource
    {
        $data = $request->validated();
        $profile = ProfileService::update($profile,$data);
        return ProfileResource::make($profile);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Profile $profile): ResponseAlias
    {
        $profile->delete();
        return response(ResponseAlias::HTTP_OK);
    }
}
