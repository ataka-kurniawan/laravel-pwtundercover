<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function showLogin (){
        return view ('auth.login');
    }

    public function login (Request $request){
        $credentials = $request->validate([
            'email'=> 'required | email',
            'password'=>'required'
        ]);

       if(Auth::attempt($credentials)){
        $request->session()->regenerate();
        return redirect()->route('admin.dashboard');
       }

        return back()->with('error', 'Email atau password salah.');
        
    }

    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('showLogin');

    }
}
