<?php

namespace App\Http\Controllers;

use App\Website;
use App\Http\Resources\Website as WebsiteResource;
use Illuminate\Http\Request;

class WebsiteController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return WebsiteResource::collection(Website::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        Website::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);
    }
}
