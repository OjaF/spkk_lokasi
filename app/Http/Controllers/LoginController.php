<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\LoginRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display login page.
     * 
     * @return Renderable
     */
    public function show()
    {
        return view('login');
    }

    /**
     * Handle account login request
     * 
     * @param LoginRequest $request
     * 
     * @return \Illuminate\Http\Response
     */
    public function login(LoginRequest $request)
    {
        $credentials = $request->getCredentials();

        if (Auth::attempt(['username' => $credentials['username'], 'password' => $credentials['password']])) {;
            $request->session()->regenerate();
            return redirect()->intended('dashboard')->with('success', 'Login berhasil');
        }

        return redirect()->route('login.show')->with('error','Username atau Password salah');

    }
}
