<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;
use Yajra\DataTables\Facades\DataTables;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;


class UserController extends Controller
{
    public function index()
    {
        return view('Admin.page.userPage'); // Pastikan nama view sesuai
    }

    // Fetch user data for DataTables
    public function dataUser(Request $request)
    {
        if ($request->ajax()) {
            // Fetching users data
            $data = User::select('id_user', 'name', 'email', 'no_hp')->get();
            
            return DataTables::of($data)
                ->addColumn('action', function ($row) {
                    return '<button class="btn btn-edit" data-id="' . $row->id_user . '">Edit</button>
                            <button class="btn btn-delete" data-id="' . $row->id_user . '">Delete</button>';
                })
                ->rawColumns(['action'])
                ->make(true);
        }
    }

    /**
     * Store a newly created user in storage.
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function storeUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email',
            'no_hp' => 'required|digits_between:10,15',
            'password' => 'required|min:6'
        ], [
            'name.required' => 'Nama tidak boleh kosong',
            'name.string' => 'Nama harus berupa teks',
            'name.max' => 'Nama tidak boleh lebih dari 255 karakter',
            'email.required' => 'Email tidak boleh kosong',
            'email.email' => 'Format email tidak valid',
            'email.unique' => 'Email sudah terdaftar',
            'no_hp.required' => 'Nomor HP tidak boleh kosong',
            'no_hp.digits_between' => 'Nomor HP harus terdiri dari 10 hingga 15 angka',
            'password.required' => 'Password tidak boleh kosong',
            'password.min' => 'Password harus minimal 6 karakter'
        ]);

        
        User::create([
            'name' => $request->name,
            'email' => $request->email,
            'no_hp' => $request->no_hp,
            'password' => bcrypt($request->password) // Encrypt password
        ]);

        return response()->json(['success' => 'Pengguna berhasil ditambahkan.']);
    }

    /**
     * Show the form for editing the specified user.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function editUser($id)
    {
        $user = User::find($id);

        if ($user) {
            return response()->json(['result' => $user]);
        } else {
            return response()->json(['error' => 'Data tidak ditemukan'], 404);
        }
    }

    /**
     * Update the specified user in storage.
     * @param Request $request
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function updateUser(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:users,email,' . $request->id_user . ',id_user',
            'no_hp' => 'required|string|max:15',
            'password' => 'nullable|string|min:8|confirmed',
        ]);

        $user = User::findOrFail($request->id_user);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->no_hp = $request->no_hp;

        if ($request->password) {
            $user->password = Hash::make($request->password);
        }

        $user->save();

        return response()->json(['success' => 'Data pengguna berhasil diperbarui.']);
    }




    /**
     * Remove the specified user from storage.
     * @param int $id
     * @return \Illuminate\Http\JsonResponse
     */
    public function destroyUser($id)
    {
        $user = User::where('id_user', $id);
        $user->delete();
        
        return response()->json(['success' => 'Data pengguna berhasil dihapus.']);
    }
}
