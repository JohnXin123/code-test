<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserLogin;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function loginPage()
    {
        return view('auth');
    }

    public function authenticate(UserLogin $request)
    {
        $validated = $request->validated();

        if (Auth::attempt($validated)) {
            // Authentication passed...
            return redirect()->intended('home');
        }

        return redirect()->route('login');
    }

    public function logout()
    {
        Auth::logout();

        return view('welcome');
    }
}
