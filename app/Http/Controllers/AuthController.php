<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class AuthController extends Controller
{
    public function adminLogin(Request $request)
    {
        if (Auth::check()) {
            return Redirect::route('admin.index');
        }

        if ($request->method() == 'POST') {
            $authorization = [
                'email' => $request->email,
                'password' => $request->password,
                'type' => 1
            ];
            if (Auth::attempt($authorization)) {
                return Redirect::route('admin.index');
            }
            return Redirect::back();
        }
        return view('admin.login');
    }

    public function logout()
    {
        Auth::logout();
        return Redirect::route('admin.login');
    }
}
