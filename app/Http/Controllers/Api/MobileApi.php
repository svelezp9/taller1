<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use App\Models\Mobile;
use App\Http\Resources\MobileResource;

class MobileApi extends Controller
{
    public function index()
    {
        return MobileResource::collection(Mobile::all());
    }

    public function show($id)
    {
        return new MobileResource(Mobile::findOrFail($id));
    }
}
