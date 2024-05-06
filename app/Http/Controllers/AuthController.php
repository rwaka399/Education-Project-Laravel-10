<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Cache\RedisTagSet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    // Login
    public function login() {
        return view('auth.login');
    }

    public function logproses(Request $request) {
        $request->validate([
            'email'     => 'required',
            'password'  => 'required'
        ]);
        
        if(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ])) {
            // jika berhasil maka redirect ke home
            return redirect()->route('admin.home');
        } else {
            //jikl gagal maka kembali lagi ke halaman login dan tampilkan pesan error
            return back()->with('error','Email atau Password salah');
        }
    }

    //Logout
    public function logout(){
        Auth::logout();
        return redirect()->route('login')->with('sukses','Anda telah log out');
    }

    // Register
    public function register() {
        return view('auth.register');
    }

    public function regproses(Request $request) {
        $request->validate([
            'name'      =>  'required',
            'email'     =>  'required|email|unique:users,email',
            'password'  =>  'required|min:6' // Perbaikan di sini
        ]);
        
        $data = [
            'name'      => $request->name,
            'email'     => $request->email,
            'password'  => bcrypt($request->password)
        ];
        
        User::create($data);
        
        if(Auth::attempt([
            'email'     => $request->email,
            'password'  => $request->password
        ])) {
            return redirect()->route('admin.home');
        } else {
            // Mengubah 'erorr' menjadi 'error'
            return redirect()->route('auth.register')->with('error', 'Kesalahan berpikir');
        }

    }
}
