<?php

namespace App\Http\Controllers;

use App\Models\Rapat;
use Illuminate\Http\Request;

class RapatController extends Controller
{
    public function index()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }

        // Mengambil data rapat
        $rapat = Rapat::select('id', 'tanggal', 'judul', 'alamat')->get();
        $title = "Rapat"; // Set variabel $title untuk halaman Rapat
        return view('rapat.rapat', compact('rapat', 'title')); // Kirim ke view
    }

    public function show($id)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        // Mengambil satu record rapat
        $rapat = Rapat::findOrFail($id);
        $title = "Rapat"; // Set variabel $title untuk halaman Detail Rapat
        return view('rapat.detailrapat', compact('rapat', 'title')); // Kirim ke view
    }

    public function download($id)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        $rapat = Rapat::findOrFail($id);

        if ($rapat->dokumentasi) {
            $filePath = storage_path('app/' . $rapat->dokumentasi);
            return response()->download($filePath);
        }

        return redirect()->back()->with('error', 'Dokumentasi tidak ditemukan.');
    }



}
