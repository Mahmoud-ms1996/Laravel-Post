<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LoginController extends Controller
{
    // public function __constract(){

    //     $this-> middleware(['guest']);
    // }

    public function index()
    {
        return view('auth.login');
    }

    public function store(Request $request)
    {
        //[1]validation
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // [3]sign the user in
        if(!auth()->attempt($request->only('email', 'password'), $request->remember))
        {
            return back()->with('status', 'Invaled login details');
        }

        // [4] redirect
        return redirect()->route('dashboard');
    }
}
