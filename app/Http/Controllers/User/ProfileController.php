<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    /**
     * Displays single user profile
     */

    public function show($id)
    {
        $user = User::where('id', $id)->first();

        // Check if user is authorized, else abort
        if($user->id != Auth::id()) {
            abort(403);
        } 

        return view('user.profile.show')->with('user', $user);
    }

    /**
     * Edit user profile
     * Returns an edit user view
     */

    public function edit($id) 
    {
        $user = User::where('id', $id)->first();

        // Check if user is authorized, else abort   
        if($user->id != Auth::id()) {
            abort(403);
        } 

        return view('user.profile.edit')->with('user', $user);
    }


    /**
     * Updates user profile
     * Handles request
     */

    public function update(Request $request, $id) {
        
        // Validate request
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
        ]);

        // Get user
        $user = User::where('id', $id)->first();

        // Update user
        $user->update([
            'first_name' => $request->last_name,
            'last_name' => $request->first_name,
        ]);

        return redirect('/user/'. $id)->with('success', 'User profile updated');
    }
    
    public function destroy($id)
    {
        $user = User::where('id', $id)->first()->delete();

        return redirect('/')->with('success', 'Account deleted');
    }

}
    

