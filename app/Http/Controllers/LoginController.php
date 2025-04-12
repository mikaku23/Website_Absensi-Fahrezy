<?php

namespace App\Http\Controllers;

use App\Models\Guru;
use App\Models\Siswa;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{

    function tampilLogin()
    {
        return view('utama.login', [
            'menu' => 'login',
            'title' => 'Login Pengguna'
        ]);
    }

    function submitLogin(Request $request)
    {
        $credentials = $request->only('username', 'password');

        if (Auth::attempt($credentials)) {
            $user = Auth::user();

            // Cek apakah user ini adalah guru
            $guru = Guru::where('username', $user->username)->first();
            if ($guru) {
                if ($user->level === 'walikelas') {
                    return redirect()->route('dashboard-walikelas');
                }
                return redirect()->route('dashboard-guru');
            }

            // Cek apakah user ini adalah siswa
            $siswa = Siswa::where('username', $user->username)->first();
            if ($siswa) {
                return redirect()->route('rekap.index');
            }

            // Jika user adalah admin
            if ($user->level === 'admin') {
                return redirect()->route('dashboard-admin');
            }
        } else {
            return redirect()->back()->withErrors(['login' => 'Username atau Password salah.']);
        }
    }

    function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
}
