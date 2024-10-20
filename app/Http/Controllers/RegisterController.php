<?php

namespace App\Http\Controllers;

use App\User; // Gunakan App\User untuk Laravel 6
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class RegisterController extends Controller
{
    public function showRegistrationForm()
    {
        return view('User.Auth.RegisterUser');
    }

    public function register(Request $request)
    {
        // Validasi input
        //dd($request->all());

        $validator = Validator::make($request->all(), [
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users,email',
            'password' => 'required',
            'no_hp' => 'required|numeric|digits_between:10,13',
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'email.max' => 'Email tidak boleh lebih dari 255 karakter',
            'password.required' => 'Password tidak boleh kosong',
            'no_hp.required' => 'Nomor HP tidak boleh kosong',
            'no_hp.numeric' => 'Nomor HP Harus berupa angka',
            'no_hp.digits_between' => 'Nomor HP harus terdiri dari 10 hingga 15 angka',
        ]);




        // Jika validasi gagal
        if ($validator->fails()) {
            return response()->json([
                'success' => false,
                'errors' => $validator->errors(),
            ], 422);
        }

        // Buat user baru
        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => Hash::make($request->password),
        ]);

        // Login otomatis setelah registrasi
        Auth::login($user);

        return response()->json([
            'success' => true,
            'message' => 'Registrasi berhasil',
        ]);
    }
}
