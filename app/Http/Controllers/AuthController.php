<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\ValidationException;

class AuthController extends Controller
{

    public function showRegister()
    {
        return view('auth.register');
    }

    public function register(Request $request)
    {
        $data = $request->validate([
            'username' => 'required|string|max:15|unique:users',
            'email' => 'required|email|unique:users',
            'password' => 'required|string|min:3|confirmed',
        ]);

        $user = User::create($data);

        Auth::login($user);

        return redirect()->intended(route('rants.index'));

        // dd($request);
    }

    public function showLogin()
    {
        return view('auth.login');
    }

    public function login(Request $request)
    {

        $data = $request->validate([
            'username' => 'required|string',
            'password' => 'required'
        ]);

        if (Auth::attempt($data)) {
            return redirect()->intended(route('rants.index'));
        }

        throw ValidationException::withMessages([
            'invalid' => 'Invalid login credentials.'
        ]);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect()->route('landing.page');
    }
}