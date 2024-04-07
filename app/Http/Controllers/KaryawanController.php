<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class KaryawanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        // Ambil semua karyawan
        $karyawan = User::whereHas('roles', function ($query) {
            $query->where('name', 'karyawan');
        })->get();
    
        // Meneruskan data karyawan ke tampilan
        return view('admin.Master.daftarkaryawan', compact('karyawan'));
    }
    

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function destroy(string $id)
    {
        try {
            // Cari user berdasarkan id
            $user = User::findOrFail($id);
            
            // Hapus user
            $user->delete();
            
            // Redirect atau tampilkan pesan sukses
            return redirect()->route('users.index')->with('success', 'User berhasil dihapus');
        } catch (\Exception $e) {
            // Jika terjadi error, redirect kembali dengan pesan error
            return redirect()->back()->with('error', 'Gagal menghapus user. ' . $e->getMessage());
        }
    }
}
