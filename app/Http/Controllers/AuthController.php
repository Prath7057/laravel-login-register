<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthController extends Controller
{
    public function create_register () {
        return view('register');
    }
    public function store_register(Request $request) {
        $request->validate([
            'username' => 'required|min:4|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).+$/|confirmed', 
            'name' => 'required|string|max:255',
            'mobile' => 'required|digits:10',
        ]);
        //
        $user = User::create([
            'username' => $request->username,
            'i_password' => $request->password,
            'password' => Hash::make($request->password),
            'name' => $request->name,
            'mobile' => $request->mobile,
        ]);
        //
        Auth::login($user);
        return view('dashboard');
    }
    //
    public function create_login () {
        return view('login');
    }
    public function store_login(Request $request) {
        dd($request);
    }
}
