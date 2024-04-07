<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\ValidationException;


class AuthController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function authenticate(Request $request)
    {
        $request->validate([
            'email' => 'required|email:dns',
            'password' => 'required',
        ]);

        $login = [
            'email' => $request->input('email'),
            'password' => $request->input('password'),
        ];

        if (Auth::attempt($login)) {
            $request->session()->regenerate();
            return redirect()->intended('/admin')->with('success', 'Login berhasil');
        }

        return back()->with('failed', 'Email atau Password Anda Salah!!!');
    }

    /**
     * Show the form for creating a new resource.
     */
    // public function Register(Request $request)
    // {
    //     // Validasi input
    //     $validatedData = $request->validate([
    //         'name' => 'required|string',
    //         'email' => 'required|email|unique:users', // Pastikan email adalah unik di tabel karyawans
    //         'password' => 'required|string|min:6', // Sesuaikan dengan kebutuhan keamanan Anda
    //     ]);

    //     // Buat instansiasi karyawan baru
    //     $user = User::create([
    //         'name' => $validatedData['name'],
    //         'email' => $validatedData['email'],
    //         'password' => Hash::make($validatedData['password']),
    //     ]);

    //     // Respon berhasil
    //     $request->session()->flash('success', 'Akun Berhasil Dibuat!!');

    //     return redirect('/register');
    // }

    public function register(Request $request)
    {
        try {
            // Validasi input
            // $validatedData = $request->validate([
            //     'name' => 'required|string',
            //     'email' => 'required|email|unique:users', // Pastikan email adalah unik di tabel users
            //     'password' => 'required|string|min:6', // Sesuaikan dengan kebutuhan keamanan Anda
            // ]);
            $validatedData = $request->validate([
                'name' => 'required|string|unique:users',
                'email' => 'required|email|unique:users',
                'password' => 'required|string|min:6',
            ], [
                'name.required' => 'Nama harus diisi.',
                'name.unique' => 'Nama Sudah Di Pakai.',
                'email.required' => 'Email harus diisi.',
                'email.email' => 'Format email tidak valid.',
                'email.unique' => 'Email sudah digunakan.',
                'password.required' => 'Password harus diisi.',
                'password.min' => 'Password harus memiliki minimal :min karakter.',
            ]);
            // Buat instansiasi user baru
            $user = User::create([
                'name' => $validatedData['name'],
                'email' => $validatedData['email'],
                'password' => Hash::make($validatedData['password']),
                'role' => 'karyawan',
                
            ]);
            $user->assignRole('karyawan');
            // Respon berhasil
            $request->session()->flash('success', 'Akun Berhasil Dibuat!!');

            return redirect('/register');
        } catch (ValidationException $e) {
            // Jika validasi gagal, kembalikan pengguna ke halaman pendaftaran dengan pesan kesalahan
            return redirect('/register')->withErrors($e->validator->errors());
        }
    }


    public function logout(Request $request)
    {
        Auth::logout();

        $request->session()->invalidate();

        $request->session()->regenerateToken();

        return redirect('/login')->with('success','Logout Berhasil');
    }  

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, User $user)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}
