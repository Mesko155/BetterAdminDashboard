<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    public function login() {
        if(Auth::check()) {
            return view('main');
        } else {
            return view('login.login');
        }
    }

    public function authenticate(Request $request) {
        $form = $request->validate([
            'email' => ['required', 'email'],
            'password' => 'required'
        ]);

        if(auth()->attempt($form)) {
            $request->session()->regenerate();
            return redirect('/dashboard');
        }
        
        return back()->withErrors(['invalid' => 'Invalid credentials!']);
    }
}
