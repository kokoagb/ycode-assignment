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
    public function index(Request $request)
    {

        $order_by = $request->query('orderBy', 'name');
        $websites = Website::orderBy($order_by, 'asc');

        if ($request->has('filter')) {
            $websites->where('name', 'like', '%' . $request->filter . '%');
        }

        return WebsiteResource::collection($websites->paginate(8));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'url' => 'required|unique:websites',
        ]);

        Website::create([
            'name' => $request->name,
            'url' => $request->url,
        ]);
    }
}
