<?php

namespace App\Http\Controllers;

use App\Models\Himbauan;
use Illuminate\Http\Request;

class HimbauanadminController extends Controller
{
    // Menampilkan halaman himbauan
    public function index()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $himbauan = Himbauan::all(); // Mengambil semua data himbauan
        return view('himbauanadmin.index', compact('himbauan'));
    }

    // Menampilkan form untuk menambah himbauan
    public function create()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('himbauanadmin.create'); // Ganti dengan path view yang sesuai
    }

    // Menyimpan himbauan ke database
    public function store(Request $request)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'ket' => 'required|string',
            'created_by' => 'required|string',
        ]);

        // Debug log
        \Log::info('Data yang akan disimpan:', $validatedData);

        Himbauan::create($validatedData);

        return redirect()->route('himbauanadmin.index')->with('success', 'Himbauan berhasil ditambahkan!');
    }

    // Menampilkan form untuk mengedit himbauan
    public function edit($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $himbauan = Himbauan::findOrFail($id); // Mencari himbauan berdasarkan ID
        return view('himbauanadmin.edit', compact('himbauan')); // Ganti dengan path view yang sesuai
    }

    // Mengupdate himbauan ke database
    public function update(Request $request, $id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $validatedData = $request->validate([
            'judul' => 'required|string|max:255',
            'ket' => 'required|string',
            'created_by' => 'required|string',
        ]);

        $himbauan = Himbauan::findOrFail($id);
        $himbauan->update($validatedData);

        return redirect()->route('himbauanadmin.index')->with('success', 'Himbauan berhasil diupdate!');
    }

    // Menghapus himbauan dari database
    public function destroy($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $himbauan = Himbauan::findOrFail($id); // Menemukan himbauan berdasarkan ID
        $himbauan->delete(); // Menghapus himbauan

        return redirect()->route('himbauanadmin.index')->with('success', 'Himbauan berhasil dihapus!');
    }
}
