<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\User;

class AuthController extends Controller
{
    /**
     * Tampilkan halaman register
     */
    public function showRegister()
    {
        return view('authentication.register');
    }

    public function register(Request $request)
{
    $request->validate([
        'phone' => 'required|unique:users,phone',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|confirmed|min:6',
        'role' => 'required|in:peternak,vendor' // admin TIDAK boleh
    ]);

    User::create([
        'phone' => $request->phone,
        'email' => $request->email,
        'password' => Hash::make($request->password),
        'role' => $request->role,
    ]);

    return redirect('/login')->with('success', 'User berhasil terdaftar!');
}

    /**Tampilkan form login**/
    public function showLogin()
    {
        return view('authentication.login');
    }

    /**Proses login**/
    public function login(Request $request)
    {
        $credentials = $request->validate([
            'email'    => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::attempt($credentials)) {
            $request->session()->regenerate();

            $user = Auth::user();

            if ($user->role === 'admin') {
                return redirect()->route('admin.dashboard');
            } elseif ($user->role === 'vendor') {
                return redirect()->route('vendor.dashboard');
            } elseif ($user->role === 'peternak') {
                return redirect()->route('peternak.dashboard');
            }

            // fallback kalau role tidak dikenali
            return redirect()->route('landing');
        }

        return back()->withErrors([
            'email' => 'Email atau password salah.',
        ])->onlyInput('email');
    }

    /**Logout**/
    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return redirect('/login');
    }
}
