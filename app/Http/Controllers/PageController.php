<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;
use App\Models\Location;
use Illuminate\Support\Facades\DB;

class PageController extends Controller
{
    /**
     * Display the mainpage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all locations for search
        $locations = Location::get();
        // Get a;; approved properties
        $properties = Property::where('approved', '1')->get();
        // Get maximum number of bedrooms for search
        $max_bedrooms = DB::table('properties')->orderBy('bedrooms', 'DESC')->first();
        // Get maximum number of bathrooms for search
        $max_bathrooms = DB::table('properties')->orderBy('bathrooms', 'DESC')->first();

        return view('index')
        ->with([
            'properties' => $properties,
            'locations' => $locations,
            'max_bedrooms' => $max_bedrooms,
            'max_bathrooms' => $max_bathrooms,
            ]);
    }

    public function home()
    {
        $properties = Property::where('is_featured', '1')->get();

        return view('home')
        ->with('properties', $properties);
    }
}
