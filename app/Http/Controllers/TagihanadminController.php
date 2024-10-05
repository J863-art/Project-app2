<?php

namespace App\Http\Controllers;

use App\Models\Tagihan;
use Illuminate\Http\Request;

class TagihanadminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        // Ambil semua tagihan dari database
        $tagihans = Tagihan::select('id', 'nik', 'jenis_tagihan', 'status', 'jatuh_tempo')->get();

        return view('tagihanadmin.index', compact('tagihans'));
    }


    public function destroy($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $tagihan = Tagihan::findOrFail($id);

        // Hapus tagihan dari database
        $tagihan->delete();

        return redirect()->route('tagihanadmin.index')->with('success', 'Tagihan berhasil dihapus.');
    }


    // public function guest()
    // {
    //     return view('tagihanadmin.default'); // Ganti dengan path view yang sesuai
    // }

    public function download($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $tagihan = Tagihan::findOrFail($id);

        if ($tagihan->bukti_pembayaran) {
            $fileName = $tagihan->nik . '_bukti_pembayaran.png'; // Ubah ekstensi menjadi PNG
            $headers = [
                'Content-Type' => 'image/png', // Ubah content type menjadi image/png
            ];

            return response()->make($tagihan->bukti_pembayaran, 200, $headers)
                ->header('Content-Disposition', 'attachment; filename="' . $fileName . '"');
        }

        return redirect()->back()->with('error', 'Dokumentasi tidak ditemukan.');
    }


    public function uploadBuktiPembayaran(Request $request, $id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:png|max:2048',
        ]);

        $tagihan = Tagihan::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileContent = file_get_contents($file);

            $tagihan->bukti_pembayaran = $fileContent;
            $tagihan->status = 'menunggu konfirmasi';
            $tagihan->save();
        }

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }

    public function create()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('tagihanadmin.create'); // Mengarahkan ke view add.blade.php
    }

    public function store(Request $request)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $tagihan = new Tagihan();
        $tagihan->nik = $request->nik;
        $tagihan->jenis_tagihan = $request->jenis_tagihan;
        $tagihan->status = $request->status;
        $tagihan->jatuh_tempo = $request->jatuh_tempo;
        $tagihan->save();

        return redirect()->route('tagihanadmin.index')->with('success', 'Acara berhasil ditambahkan!');
    }

    public function edit($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $tagihan = Tagihan::findOrFail($id);
        return view('tagihanadmin.edit', compact('tagihan'));
    }

    // Method untuk mengupdate tagihan
    public function update(Request $request, $id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $request->validate([
            'nik' => 'required|string',
            'jenis_tagihan' => 'required|string',
            'status' => 'required|string',
            'jatuh_tempo' => 'required|date',
        ]);

        $tagihan = Tagihan::findOrFail($id);
        $tagihan->nik = $request->nik;
        $tagihan->jenis_tagihan = $request->jenis_tagihan;
        $tagihan->status = $request->status;
        $tagihan->jatuh_tempo = $request->jatuh_tempo;

        $tagihan->save();

        return redirect()->route('tagihanadmin.index')->with('success', 'Tagihan berhasil diupdate.');
    }


}
