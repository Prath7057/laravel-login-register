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
        //
        return redirect()->route('dashboard')->with('success', 'Register & Login successful!');
    }
    //
    public function create_login () {
        return view('login');
    }
    public function store_login(Request $request) {
        $request->validate([
            'username' => 'required|min:4|regex:/^(?=.*[A-Z])(?=.*[0-9]).+$/',
            'password' => 'required|min:6|regex:/^(?=.*[A-Z])(?=.*[0-9])(?=.*[\W_]).+$/', 
        ]);
        //
        if (Auth::attempt(['username' => $request->username, 'password' => $request->password])) {
            return redirect()->route('dashboard')->with('success', 'Login successful!');
        }
    
        return back()->withErrors(['login_error' => 'Invalid username or password.'])->withInput();
    }
    //
    public function dashboard() {
        if (Auth::check()) {
            $user = Auth::user(); 
            return 'User is logged in as: ' . $user->username;
        } else {
            return 'User is not logged in.';
        }
        return view ('dashboard');
    }
}
