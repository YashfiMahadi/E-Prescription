<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function index()
    {
        return view('pages.login.login');
    }

    public function proses()
    {
        $valid = request()->validate([
            'email' => 'required',
            'password' => 'required'
        ]);

        if (Auth::attempt($valid)) {
            return redirect()->intended('/admin');
        } else {
            return redirect('/login')->with('gagal', 'Maaf password atau username salah');
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/login');
    }
}
