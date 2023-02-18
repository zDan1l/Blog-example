<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function index(){
        return view('login.index',[
           'title' => 'Sign In', 
           'active' => ''
        ]);
    }

    public function login(Request $request){
        $validate = $request->validate([
           'email' => 'required',
           'password' => 'required' 
        ]);

        if(Auth::attempt($validate)){
            $request->session()->regenerate();
            return redirect()->intended('/dashboard');
        }

        return back()->with('Failed', 'Failed to login');
    }

    public function logout(Request $request){
        Auth::logout();

        $request->session()->regenerate();
        $request->session()->invalidate();

        return redirect('/login');
    }
}