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
use Validator;
use File;


class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('user_id', Auth::id() )->get();

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
            'built_in' => 'required|numeric|digits:4',
            'area_size_indoor' => 'required|numeric|min:5',
            'area_size_outdoor' => 'required|numeric|min:5',
            'bedrooms' => 'required|numeric|min:1',
            'bathrooms' => 'required|numeric|min:1',
            'description' => 'required|min:100',
            'featured_image' => 'required|image|dimensions:min_width=1200,min_height=800|max:2500', 
        ]);
			
        // Generate random number for filename
        $random = rand(1111,9999) * rand(1, 9);

        // Validate Featured Image
        if($request->hasFile('featured_image'))
        {
            // Make a full size imaye
            ImageIvn::make($request->featured_image)->resize(1500,800)->save(public_path('img/' . $random . '_feat.jpg'))
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
                'file.*' => 'image|max:2500'
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
        $locations = Location::all();

        $property = Property::where('id', $id )->first();
        
        if($property->user_id != Auth::id()) {
             abort(403);
        } 

        return view('user.properties.edit')
        ->with([
            'property' => $property,
            'locations' => $locations,
        ]);
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
        
        // Validate input
       $request->validate([
        'title' => 'required|min:10 max:50',
        'asking_price' => 'required|numeric|min:10000|max:1000000000',
        'street' => 'required|min:3',
        'number' => 'required',
        'city' => 'required|min:3',
        'latitude' => 'required|between:9,12',
        'longitude' => 'required|between:9,12',
        'built_in' => 'required|numeric|digits:4',
        'area_size_indoor' => 'required|numeric|min:5',
        'area_size_outdoor' => 'required|numeric|min:5',
        'bedrooms' => 'required|numeric|min:1',
        'bathrooms' => 'required|numeric|min:1',
        'description' => 'required|min:100',
        'featured_image' => 'image|dimensions:min_width=1200,min_height=800|max:2500', 
    ]);
     
    // Select Property
    $property = Property::where('title', $request->title)->first();

    // Generate random number for filename
    $random = rand(1111,9999) * rand(1, 9);

    // Validate Featured Image
    if($request->hasFile('featured_image'))
    {
        // Delete old feat img file from img folder
        $old_ft_img = '/' . $property->feat_image_path;
        if(file_exists(public_path() . $old_ft_img)) {
        $old_ft_thumb = str_replace('.jpg', '_thumb.jpg', $old_ft_img);
        File::delete([$old_ft_img, $old_ft_thumb]);
        }

        // Generate a full size image of uploaded file
        ImageIvn::make($request->featured_image)->resize(1500,800)->save(public_path('img/' . $random . '_feat.jpg'))
        ->resize(400,300)->save(public_path('img/' . $random . '_feat_thumb.jpg'));

        // New featured image filename input
        $ft_img = 'img/' . $random . '_feat.jpg';
    }

    // If no new Featured Image uploaded
    if (!$request->hasFile('featured_image')) {
        // Keep current filename as input
        $ft_img = $property->feat_image_path;
    }

   
    // Store Property
    $property->update([
        'street' => $request->street,
        'number' => $request->number,
        'zip_code' => $request->zip_code,
        'city' => $request->city,
        'asking_price' => $request->asking_price,
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
        'feat_image_path' => $ft_img,
    ]);
    

    /**
     * Uploaded gallery images are stored with the use of the property ID as FK
     */

    // Validate Gallery Images
    if($request->hasFile('file'))
    {
        //delete old files
        $old_files = Image::where('property_id', $property->id)->get();
        foreach($old_files as $old_file) {
            $old_file_path = '/' . $old_file->image_path;
        File::delete($old_file_path);
        Image::where('property_id', $property->id)->delete();
        }
        
        // Validate new inputs
        $request->validate([
            'file.*' => 'image|max:2500'
        ]);

        // Save to array
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
    
    return $this->index()->with(["message" => "Property "  . $property->name . " is updated"]);

    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // Delete images
        $old_files = Image::where('property_id', $id)->get();
        foreach($old_files as $old_file) {
            $old_file_path = '/' . $old_file->image_path;
        File::delete($old_file_path);
        Image::where('property_id', $property->id)->delete();
        }

        // Delete featured image
        $property = Property::where('id', $id)->first();
        $old_ft_img = '/' . $property->feat_image_path;

        if(file_exists(public_path() . $old_ft_img)) {
        $old_ft_thumb = str_replace('.jpg', '_thumb.jpg', $old_ft_img);
        File::delete([$old_ft_img, $old_ft_thumb]);
        }

        $property->delete();

        return redirect('/properties')->with('success', 'Property deleted');
    }
}

