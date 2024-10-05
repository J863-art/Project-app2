<?php

namespace App\Http\Controllers;

use App\Models\Tagihan; // Import model Tagihan
use Illuminate\Http\Request;

class TagihanController extends Controller
{
    // Menampilkan semua data tagihan untuk pengguna yang sedang login
    public function index()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        // Dapatkan NIK pengguna yang sedang login
        $nik = auth()->user()->nik; // Pastikan model User memiliki atribut 'nik'

        // Ambil tagihan yang sesuai dengan NIK
        $tagihans = Tagihan::where('nik', $nik)
            ->select('id', 'jenis_tagihan', 'status', 'jatuh_tempo')
            ->get(); // Pilih kolom yang ingin ditampilkan

        return view('tagihan.index', compact('tagihans'));
    }

    // Menampilkan halaman untuk pengguna yang tidak login (guest)
    public function guest()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        return view('tagihan.default'); // Ganti dengan path view yang sesuai
    }

    // Menampilkan detail tagihan secara lengkap
    public function download($id)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
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



    // Mengunggah bukti pembayaran untuk tagihan
    public function uploadBuktiPembayaran(Request $request, $id)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:png|max:2048', // Validasi file PNG dengan maksimal 2MB
        ]);

        $tagihan = Tagihan::findOrFail($id);

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileContent = file_get_contents($file);

            // Simpan ke database
            $tagihan->bukti_pembayaran = $fileContent;
            $tagihan->status = 'menunggu konfirmasi';
            $tagihan->save();
        }

        return redirect()->back()->with('success', 'Bukti pembayaran berhasil diupload.');
    }

    // Menyimpan data tagihan baru
    public function store(Request $request)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        // Validasi input
        $request->validate([
            'nik' => 'required|string|unique:tagihans,nik',
            'jenis_tagihan' => 'required|string',
            'status' => 'required|string',
            'jatuh_tempo' => 'required|date',
            'bukti_pembayaran' => 'required|image|mimes:png|max:2048', // Validasi file PNG
        ]);

        // Simpan data tagihan
        $tagihan = new Tagihan();
        $tagihan->nik = $request->nik;
        $tagihan->jenis_tagihan = $request->jenis_tagihan;
        $tagihan->status = $request->status;
        $tagihan->jatuh_tempo = $request->jatuh_tempo;

        if ($request->hasFile('bukti_pembayaran')) {
            $file = $request->file('bukti_pembayaran');
            $fileContent = file_get_contents($file);

            $tagihan->bukti_pembayaran = $fileContent;
            $tagihan->mime_type = $file->getMimeType(); // Simpan tipe MIME file
        }

        $tagihan->save();

        return redirect()->route('tagihan.index')->with('success', 'Tagihan berhasil disimpan.');
    }

    // Menampilkan halaman untuk membuat tagihan baru
    public function create()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        return view('tagihan.create'); // Pastikan view ini ada di resources/views/tagihan/create.blade.php
    }

    public function show($id)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        $tagihan = Tagihan::findOrFail($id);
        return view('tagihan.show', compact('tagihan'));
    }


}
