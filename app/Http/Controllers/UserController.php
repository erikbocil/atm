<?php

namespace App\Http\Controllers;

use App\Models\Riwayat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{

    public function index()
    {

        return view('dashboard');
    }

    public function tarik(Request $request)
    {
        $request->validate([
            'penarikan' => 'required|numeric',
        ]);
        if (auth()->user()->saldo - $request->penarikan < 0) {
            $this->flash('alert-danger', 'saldo anda tidak cukup');
            return back();
        }
        auth()->user()->decrement('saldo', $request->penarikan);
        $this->flash('Penarikan sukses', 'alert-info');
        return back();
    }
    public function tambah()
    {
        auth()->user()->increment('saldo', 10000);
        return back();
    }
    public function transfer(Request $request)
    {
        $request->validate([
            'id_pengguna' => 'required',
            'jumlah' => 'required|numeric',
        ]);
        if (User::where('id_pengguna', $request->id_pengguna)->first() == null) {
            $this->flash('Penerima tidak ditemukan');
            return back();
        }
        if (auth()->user()->saldo - $request->jumlah < 0) {
            $this->flash('Saldo anda tidak cukup');
            return back();
        }
        auth()->user()->decrement('saldo', $request->jumlah);
        User::lockForUpdate()->where('id_pengguna', $request->id_pengguna)->increment('saldo', $request->jumlah);
        Riwayat::create([
            'pengirim' => auth()->user()->id,
            'jumlah' => $request->jumlah,
            'penerima' => $request->id_pengguna,
            'saldo' => auth()->user()->saldo,
        ]);
        $this->flash('Transfer Sukses', 'alert-info');
        return back();
    }
    public function riwayat()
    {
        $riwayats = Riwayat::with('user')->where('pengirim', auth()->user()->id)->simplePaginate(5);
        return view('riwayat', compact('riwayats'));
    }
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return to_route('login');
    }
}
