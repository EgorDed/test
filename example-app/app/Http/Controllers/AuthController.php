<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Auth;
use Illuminate\Http\Request;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $formFields = $request->only(['email', 'password']);



        if (Auth::attempt($formFields)) {
            return redirect()->intended(route('authors.index'));
        }

        return redirect(route('login_get'))->withErrors(['email' => 'Ошибка']);
    }

    public function logout(Request $request)
    {
        Auth::logout();

        return redirect(route('login_get'));
    }
}