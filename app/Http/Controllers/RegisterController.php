<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Rules\AlphanumOnly;
use App\Rules\Lowercase;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'id_pengguna' => ['required', 'unique:users', 'alpha_num', new Lowercase, new AlphanumOnly],
                'nama' => 'required',
                'password' => 'required|numeric|digits:6',
            ]
        );
        User::create([
            'nama' => $request->nama,
            'id_pengguna' => $request->id_pengguna,
            'password' => $request->password,
            'saldo' => 10000,
        ]);
        return App::call('App\Http\Controllers\LoginController@login', ['data' => $request->only(['id_pengguna', 'password'])]);
    }
}
