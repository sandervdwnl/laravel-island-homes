<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    public function search(Request $request)
    {
        // Get Location ID
        $location_id = $request->input('location-filter');

        // Get Selected Minimum Bedrooms
        $selected_min_bedrooms = $request->input('bedrooms-filter');

        // Get Selected Minimum Bedrooms
        $selected_min_bathrooms = $request->input('bathrooms-filter');

        // Get Selected Location Name to display selected value
        $selected_location = Location::where('id', $location_id)->first();
        

        // Select all filtered properties
        $properties = Property::
        where('location_id', '=', $location_id)
        ->where('bedrooms', '>=', $selected_min_bedrooms)
        ->where('bathrooms', '>=', $selected_min_bathrooms)
        ->get();

        // Select Max Bedrooms to filter
        $max_bedrooms = DB::table('properties')->orderBy('bedrooms', 'DESC')->first();

        // Select Max Bedrooms to filter
        $max_bathrooms = DB::table('properties')->orderBy('bathrooms', 'DESC')->first();

        // Select Locations to filter 
        $locations = Location::all();

        // Return view with filtered properties and search parameters
       return view('search')->with([
            'properties' => $properties,
            'locations' => $locations,
            'selected_location' => $selected_location,
            'selected_min_bedrooms' => $selected_min_bedrooms,
            'selected_min_bathrooms' => $selected_min_bathrooms,
            'max_bedrooms' => $max_bedrooms,
            'max_bathrooms' => $max_bathrooms,
    ]);
    }
}
