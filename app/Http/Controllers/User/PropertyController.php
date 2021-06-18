<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Location;
use App\Models\Property;
use App\Models\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image as ImageIvn;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::all();
        return view('user.properties.index')
        ->with('properties', $properties);
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
     
        // Validate input
        $request->validate([
            'title' => 'required|unique:properties|min:10 max:50',
            'asking_price' => 'required|numeric|min:10000|max:1000000000',
            'street' => 'required|min:3',
            'number' => 'required',
            'city' => 'required|min:3',
            'latitude' => 'required|between:9,12',
            'longitude' => 'required|between:9,12',
            'built_in' => 'required|numeric',
            'area_size_indoor' => 'required|numeric',
            'area_size_outdoor' => 'required|numeric',
            'bedrooms' => 'required|numeric',
            'bathrooms' => 'required|numeric',
            'description' => 'required|min:100',
            'feat_image_path' => 'required|image|dimensions:min_width=1500,min_height=800|max:2500', 
        ]);

        // Generate random number for filename
        $random = rand(1111,9999) * rand(1, 9);

        // Validate Featured Image
        if($request->hasFile('feat_image_path'))
        {
            // Make a full size imaye
            ImageIvn::make($request->feat_image_path)->resize(1500,800)->save(public_path('img/' . $random . '_feat.jpg'))
            ->resize(400,300)->save(public_path('img/' . $random . '_feat_thumb.jpg'));
        }

        // Store Property
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
            'feat_image_path' => 'img/' . $random . '_feat.jpg',
        ]);
        $property->save();

        /**
         * Uploaded gallery images are stored with the use of the property ID as FK
         */

        // Validate Gallery Images
        if($request->hasFile('file'))
        {
            $request->validate([
                'file.*' => 'image'
            ]);

            $files = $request->file('file');

            // Generate images
            foreach($files as $file) {
                
                // Generate random number for filename
                $rand = $property->id . '-' . rand(99,999) * rand(99,999);
                
                // Create Full size image
                ImageIvn::make($file)->resize(1200,900)->save(public_path('img/' . $rand . '_full.jpg'));

                // Save in DB
                $image = new Image([
                    'property_id' => $property->id,
                    'image_path' => 'img/' . $rand . '_full.jpg',
                    'size' => 'full',
                ]);
                $image->save();

                // Create thumbnail size image
                ImageIvn::make($file)->resize(1200,900)->save(public_path('img/' . $rand . '_thumb.jpg'));

                // Store in DB
                $image = new Image([
                    'property_id' => $property->id,
                    'image_path' => 'img/' . $rand . '_thumb.jpg',
                    'size' => 'thumb',
                ]);
                $image->save();
            }
        }
        

        return $this->index()->with(["message" => "Property "  . $property->name . " is added"]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        $property = Property::where('slug', $slug)->first();

        return view('user.properties.show')->with('property', $property);
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
