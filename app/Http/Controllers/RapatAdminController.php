<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class RapatAdminController extends Controller
{
    // Menampilkan daftar rapat
    public function index()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $rapat = Rapat::all();
        return view('rapatadmin.index', compact('rapat'));
    }

    // Menampilkan detail rapat
    public function show($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $rapat = Rapat::findOrFail($id);
        return view('rapatadmin.show', compact('rapat'));
    }

    // Menyimpan data rapat baru
    public function store(Request $request)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string',
            'alamat' => 'required|string',
            'keputusan' => 'required|string',
            'dokumentasi' => 'nullable|mimes:pdf|max:2048',
        ]);

        $input = $request->all();

        if ($request->hasFile('dokumentasi')) {
            $input['dokumentasi'] = $request->file('dokumentasi')->store('rapat_dokumentasi');
        }

        Rapat::create($input);

        return redirect()->route('rapatadmin.index')->with('success', 'Rapat berhasil ditambahkan');
    }

    // Menampilkan form untuk mengedit rapat
    public function edit($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $rapat = Rapat::findOrFail($id); // Mencari rapat berdasarkan ID
        return view('rapatadmin.edit', compact('rapat')); // Mengembalikan view dengan data rapat
    }

// Memperbarui data rapat yang diedit
    public function update(Request $request, $id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $validatedData = $request->validate([
            'tanggal' => 'required|date',
            'judul' => 'required|string|max:255',
            'alamat' => 'required|string',
            'keputusan' => 'required|string',
            'dokumentasi' => 'nullable|mimes:pdf|max:2048', // Validasi tipe file dan ukuran
        ]);

        $rapat = Rapat::findOrFail($id); // Mencari rapat berdasarkan ID

        // Menyimpan semua input ke dalam variabel
        $input = $validatedData;

        // Cek jika ada file dokumentasi yang di-upload
        if ($request->hasFile('dokumentasi')) {
            // Hapus file yang lama jika ada
            if ($rapat->dokumentasi) {
                Storage::delete($rapat->dokumentasi);
            }
            // Simpan file baru
            $input['dokumentasi'] = $request->file('dokumentasi')->store('rapat_dokumentasi');
        }

        // Update data rapat dengan input baru
        $rapat->update($input);

        return redirect()->route('rapatadmin.index')->with('success', 'Rapat berhasil diperbarui!');
    }



    // Menghapus rapat
    // public function destroy(Rapat $rapat)
    // {
    //     if ($rapat->dokumentasi) {
    //         Storage::delete($rapat->dokumentasi);
    //     }

    //     $rapat->delete();

    //     return redirect()->route('rapatadmin.index')->with('success', 'Rapat berhasil dihapus');
    // }

    public function destroy($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $rapat = Rapat::findOrFail($id); // Menemukan himbauan berdasarkan ID
        $rapat->delete(); // Menghapus himbauan

        return redirect()->route('rapatadmin.index')->with('success', 'Himbauan berhasil dihapus!');
    }


    // Menampilkan form untuk menambahkan rapat baru
    public function create()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('rapatadmin.create'); // Pastikan view ini ada di resources/views/rapatadmin/create.blade.php
    }

    public function download($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $rapat = Rapat::findOrFail($id);

        if ($rapat->dokumentasi) {
            $filePath = $rapat->dokumentasi;
            $fileName = basename($filePath);
            return response()->download(storage_path('app/' . $filePath), $fileName);
        }

        return redirect()->back()->with('error', 'Dokumentasi tidak ditemukan.');
    }

}
