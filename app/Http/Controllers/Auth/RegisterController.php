<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    // public function __constract(){

    //     $this-> middleware(['guest']);
    // }

    public function index(){

        return view('auth.register');
    }

    public function store(Request $request){
        /*
        ** [1]validation
        ** [2]store user
        ** [3]sign the user in
        ** [4]redirect
        */

        //[1]validation
        $this->validate($request, [

            'name' => 'required|max:255',
            'username' => 'required|max:255',
            'email' => 'required|email|max:255',
            'password' => 'required|confirmed',
        ]);

        // [2]store user
        User::create([
            'name'      => $request->name,
            'username'  => $request->username,
            'email'     => $request->email,
            'password'  => Hash::make($request->password),
        ]);

        // [3]sign the user in
        auth()->attempt($request->only('email', 'password'));

        // [4] redirect
        return redirect()->route('dashboard');
    }
}
