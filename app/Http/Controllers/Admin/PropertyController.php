<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Property;

class PropertyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // Get all properties
        $properties = Property::orderBy('created_at', 'desc')->get();

        return view('admin.properties.index')->with('properties', $properties);
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
        $property = Property::where('id', $id)->first();
        
        // Check if Approval is checked
        if (isset($request->approved)) {
            $approval = 1;
        } else {
            $approval = 0;
        }

        // Check if Featured is checked
        if (isset($request->featured)) {
            $feat = 1;
        } else {
            $feat = 0;
        }

        // Check if Featured is checked
        if (isset($request->status)) {
            $status = $request->status;
        } else {
            $status = $property->status;
        }
        
        // Update DB
        $property->update([
            'approved' => $approval,
            'is_featured' => $feat,
            'status' => $status,
        ]);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $property = Property::where('id', $id)->first()->delete();

        return redirect('/admin/properties')->with('success', 'Property deleted');
    }
}
