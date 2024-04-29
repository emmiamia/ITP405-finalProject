<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showLogin()
    {
        return view('authentifications/login');
    }

    public function login(Request $request)
    {
        // Validate user input
        $credentials = $request->validate([
            'name' => 'required',
            'password' => 'required',
        ]);

        // Attempt to authenticate the user
        if (Auth::attempt($credentials)) {
            // Authentication successful
            return redirect()->route('user.diary', ['userId' => Auth::id()]);        } 
            else {
            // Authentication failed
            return redirect()->back()->withInput()->withErrors(['name' => 'Invalid credentials']);
        }
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/intro');
    }
    

}

