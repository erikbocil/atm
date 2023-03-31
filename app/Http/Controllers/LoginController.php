<?php

namespace App\Http\Controllers;

use App\Rules\AlphanumOnly;
use App\Rules\Lowercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

class LoginController extends Controller
{
    public function index()
    {
        return view('login');
    }

    public function login(Request $request)
    {
        if (Auth::attempt(['id_pengguna' => $request->id_pengguna, 'password' => $request->password])) {
            request()->session()->regenerate();
            return to_route('dashboard');
        };
        $this->flash('ID atau Password salah');
        return redirect()->back();
    }
}
