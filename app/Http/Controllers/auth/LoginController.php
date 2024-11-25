<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Password;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class LoginController extends Controller
{
    // Menampilkan form login
    public function showLoginForm()
    {
        return view('auth.login');
    }


    // Fungsi login
    public function login(Request $request)
    {
        // Validasi input
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // Coba autentikasi user berdasarkan input
        $credentials = $request->only('email', 'password');

        if (Auth::attempt($credentials)) {
            // Jika sukses login, redirect ke dashboard atau halaman sesuai role
            if (Auth::user()->role == 'admin') {
                return redirect()->route('peserta.index');
            } else {
                return redirect()->route('home');
            }
        }

        // Jika gagal, kembali ke halaman login dengan error
        return redirect()->back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->withInput($request->only('email'));
    }

    // Fungsi logout
    public function logout()
    {
        Auth::logout();
        return redirect()->route('login');
    }
    // Menampilkan Formulir Reset Password
    public function showDirectResetPasswordForm()
    {
        return view('auth.direct-reset-password');
    }

    // Proses Reset Password
    public function resetPasswordDirect(Request $request)
    {
        $request->validate([
            'email' => 'required|email|exists:users,email',
            'password' => 'required|min:8|confirmed',
        ]);

        $user = User::where('email', $request->email)->first();
        if ($user) {
            $user->password = Hash::make($request->password);
            $user->save();

            return redirect()->route('login')->with('status', 'Password berhasil direset. Silakan login dengan password baru.');
        } else {
            return back()->withErrors(['email' => 'Email tidak ditemukan']);
        }
    }
}
