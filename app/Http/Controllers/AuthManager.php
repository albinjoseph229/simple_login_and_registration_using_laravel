<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthManager extends Controller
{
    function login(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('login');
    }
    function register(){
        if(Auth::check()){
            return redirect(route('home'));
        }
        return view('register');
    }
    function loginpost(Request $request){
        $request->validate([
            'email'=>'required',
            'password' => 'required',
        ]);

        $credentials = $request->only('email', 'password');
        if(Auth::attempt($credentials)){
            return redirect()->intended(route('home'));
        }
        return redirect(route('login'))->with("error","Login details are not valid");
    }
    function registerpost(Request $request){
        $request->validate([
            'name'=>'required',
            'email'=>'required|email|unique:users',
            'password'=>'required',
        ]);
        $data['name']=$request->name;
        $data['email']=$request->email;
        $data['password']=Hash::make($request->password);

        $user = User::create($data);
        if(!$user){
            return redirect(route('register'))->with("error","registration details are not valid");
        }
        return redirect(route('login'))->with("sucess","Registration sucessfull");
    }
    function logout(){
        Session::flush();
        Auth::logout();
        return redirect(route('login'));
    }
    function home(){
        return view('home');
    }
}
