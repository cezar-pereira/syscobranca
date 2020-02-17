<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function login()
    {
        if (auth()->guard('admin')->check() === true) {
            return redirect()->route('user.index');
        } else
            return redirect()->route('loginForm');
    }

    public function showLoginForm()
    {
        return view('login.login');
    }

    public function loginDo(Request $request)
    {
        $credentials = [
            'user' => $request->user,
            'password' => $request->password,
        ];

        if (Auth::guard('admin')->attempt($credentials, true)) {
            return redirect()->route('user.index');
        } else
            return Redirect::back()->withInput()->withErrors('Usuário e/ou senha incorreta.');
    }

    public function logout()
    {
        auth()->guard('admin')->logout();
        return redirect()->route('loginForm');
    }
}
