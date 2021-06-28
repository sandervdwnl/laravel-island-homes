<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Property;

class PageController extends Controller
{
    /**
     * Display the mainpage
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $properties = Property::where('approved', '1')->get();

        return view('index')
        ->with('properties', $properties);
    }

    public function home()
    {
        $properties = Property::where('is_featured', '1')->get();

        return view('home')
        ->with('properties', $properties);
    }
}
