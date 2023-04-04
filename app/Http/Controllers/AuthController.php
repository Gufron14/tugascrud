<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    function login() {
        $title = 'Login | GufronDroid';
        return view('auth.login', compact('title'));
    }

    function doLogin(Request $request){

        Session::flash('email', $request->input('email'));

        $request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        session()->flash('message', 'Selamat Datang!');
        
        if (Auth::attempt($infologin)) {
            return redirect()->action([ProductsController::class, 'show'])->with('success', 'Berhasil login');
        } else {
            return redirect('/')->withErrors('Email atau password yang dimasukkan tidak sesuai');
        }
    }

    function logout(){
        Auth::logout();

        return redirect('/');
    }

    function register(){
        $title = 'Register | GufronDroid';
        Return view('auth.register', compact('title'));
    }

    function doRegister(Request $request){

        Session::flash('name', $request->input('name'));
        Session::flash('email', $request->input('email'));

        $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8'
        ]);

        $data = [
            'name' => $request->name,
            'email' => $request->email,
            'password' => Hash::make($request->password)
        ];
        User::create($data);

        $infologin = [
            'email' => $request->email,
            'password' => $request->password
        ];
        
        session()->flash('message', 'Berhasil membuat akun');

        if (Auth::attempt($infologin)) {
            return redirect()->action([ProductsController::class, 'welcome'])->with('success', 'Berhasil login');
        } else {
            return redirect('auth')->withErrors('Email atau password yang dimasukkan tidak sesuai');
        }

    }
}
