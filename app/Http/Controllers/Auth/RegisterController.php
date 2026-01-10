<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function show()
    {
        return view('auth.register');
    }

    public function store(Request $request)
    {
        $request->validate([
            'email' => [
                'required',
                'email',
                'unique:users,email',
                'regex:/^[0-9]{9}@students\.mikroskil\.ac\.id$/'
            ],
            'username' => 'required|unique:users,username',
            'password' => 'required|min:6|confirmed',
        ], [
            'email.regex' => 'Email harus berupa NIM 9 digit dan menggunakan domain students.mikroskil.ac.id',
        ]);

        User::create([
            'email' => $request->email,
            'username' => $request->username,
            'password' => Hash::make($request->password),
            'role' => 'mahasiswa',
        ]);

        return redirect()->route('login')->with('success', 'Registrasi berhasil. Silakan login.');
    }
}
