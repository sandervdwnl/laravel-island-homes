<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('user.properties.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $locations = Location::all();

        return view('user.properties.create')
        ->with('locations', $locations);
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
            'title' => 'required|min:10 max:50',
            'asking_price' => 'required|numeric|min:10000|max:1000000000',
            'street' => 'required|min:3',
            'number' => 'required',
            'zip_code' => 'required',
            'city' => 'required|min:3',
            'latitude' => 'required|numeric',
            'longitude' => 'required|numeric',
            'built_in' => 'required|numeric',
            'area_size_indoor' => 'required|numeric',
            'area_size_outdoor' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'description' => 'required|min:100'
        ]);


        $property = new Property([
            'title' => $request->title,
            'slug' => Str::slug($request->title),
            'user_id' => Auth::id(),
            'street' => $request->street,
            'number' => $request->number,
            'zip_code' => $request->zip_code,
            'city' => $request->city,
            'asking_price' => $request->asking_price,
            'status' => 'For Sale',
            'location_id' => $request->location_id,
            'property_type' => $request->property_type,
            'latitude' => $request->latitude,
            'longitude' => $request->longitude,
            'built_in' => $request->built_in,
            'area_size_indoor' => $request->area_size_indoor,
            'area_size_outdoor' => $request->area_size_outdoor,
            'bedrooms' => $request->bedrooms,
            'bathrooms' => $request->bathrooms,
            'description' => $request->description,
        ]);

        $property->save();

        return $this->index()->with(["message" => "Property "  . $property->name . " is added"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
