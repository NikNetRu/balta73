<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;

class Users extends Controller
{   
    
    public function generateUserPage ($userID) {
        
        $user = User::all()->where('id', $userID)->first();
        return view('user')->with('user', $user);
    }
    
    public function editUserData (request $request) {
        $id = Auth::user()->id;
        $user = User::all()->where('id', $id);
        $realName = $request->input('realName');
        $realSurname = $request->input('realSurame');
        $adress = $request->input('adress');
        $phone = $request->input('phone');
        $user->fill(['realName' => $realName,'adress' => $adress, 'realSurame' => $realSurame, 'phone' => $phone]);
        return redirect('user/'.$id);
    }
}
