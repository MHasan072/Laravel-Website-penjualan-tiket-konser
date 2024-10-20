<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;


class LoginController extends Controller
{
    public function showLoginForm()
    {
        return view('User.Auth.LoginUser');
    }

    public function login(Request $request)
    {
        // Validate the incoming request data
        //dd($request);
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ], [
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'password.required' => 'Password tidak boleh kosong',
        ]);


        // Attempt to log the user in
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user(); // Ambil data user yang sedang login

            // Periksa apakah email dan password adalah untuk admin
            if ($user->email == 'admin@concertly.com' && Hash::check('admin123', $user->password)) {
                return response()->json(['success' => true, 'redirect' => route('dashboard-page')]); // Redirect ke halaman dashboard admin
            } else {
                return response()->json(['success' => true, 'redirect' => route('home')]); // Redirect ke halaman home user biasa
            }
        } else {
            return response()->json(['success' => false, 'message' => 'Email atau password salah.']);
        }
    }

    public function logout()
    {
        Auth::logout();
        return redirect('/');
    }
}
