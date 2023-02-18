<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function index(){
        return view('register.index',[
           'title' => 'Sign Up', 
           'active' => ''
        ]);
    }

    public function register(Request $request){
        $validate = $request->validate([
           'name' =>'required|max:255',
           'username' =>  'required|unique:users|max:255',
           'email' => 'required|unique:users',
           'password' => 'required'
        ]);
        
        $validate['password'] = bcrypt($validate['password']);

        User::create($validate);
        // $request->session()->flash('success', 'succesfull');
        return redirect('/login')->with('success', 'Successfull to create new account');
        
        
    }
}