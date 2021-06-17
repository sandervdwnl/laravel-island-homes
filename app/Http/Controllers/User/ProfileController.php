<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{

    public function show($id)
    {
        $user = User::where('id', $id)->first();

        if($user->id != Auth::id()) {
            abort(403);
        } 

        return view('user.profile.show')->with('user', $user);
    }

    public function edit($id) 
    {
        $user = User::where('id', $id)->first();
        
        if($user->id != Auth::id()) {
            abort(403);
        } 

        return view('user.profile.edit')->with('user', $user);
    }

    public function update(Request $request, $id) {
        
        $request->validate([
            'first_name' => 'required|min:2',
            'last_name' => 'required|min:2',
        ]);

        $user = User::where('id', $id)->first();

        $user->first_name = $request->last_name;
        $user->last_name = $request->first_name;
        
        $user->save();

        return redirect('/user/'. $id)->with('success', 'User deleted');
    }
    
    public function destroy($id)
    {
        $user = User::where('id', $id)->first()->delete();

        return redirect('/')->with('success', 'Account deleted');
    }

}
    

