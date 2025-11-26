<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    public function Index()
    {
        return view('login');
    }

    public function Register()
    {
        return view('register');
    }

    public function Regist(Request $request)
    {
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'username' => 'required|string|max:255|unique:users',
            'kontak' => 'required|string|max:15',
            'password' => 'required|string|min:6',
        ]);

        User::create([
            'name' => $validated['name'],
            'username' => $validated['username'],
            'kontak' => $validated['kontak'],
            'role' => 'member',
            'password' => bcrypt($validated['password']),
        ]);

        return redirect()->route('login')->with('pesan', 'Registrasi berhasil! Silakan login.');
    }

    public function Authentication(Request $request)
    {
        $validated = $request->validate([
            'username' => 'required',
            'password' => 'required',
        ]);
        if(Auth::attempt($validated)){
            $user = Auth::user();
            if($user->role == 'admin'){
                return redirect()->route('dashboard');
            }
            elseif ($user->role === 'member') {
                return redirect()->route('beranda');
            }
            else {
                Auth::logout();
                return redirect()->route('login')->with('pesan', 'Access denied. Invalid role.');
            }
        } else {
            return redirect()->route('login')->with('pesaneror', 'Username atau Password salah!');
        }
        
    }
    
    public function Logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
