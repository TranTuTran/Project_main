<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function showFormLogin () {
        return view('login');
    }
    
    public function login (Request $request) {
        $credentials = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);
        $credentials["level"] = 1;
        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            return redirect()->route('category.index');
        }
        return back()->onlyInput('email');
    }
    
    public function logout(Request $request){
        
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect()->route('login');
    }

}
