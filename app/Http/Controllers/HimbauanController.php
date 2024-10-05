<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Himbauan;

class HimbauanController extends Controller
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
        $himbauans = Himbauan::select('id', 'judul', 'ket', 'created_by')->get();
        $title = "Himbauan"; // Set variabel $title untuk halaman Rapat
        return view('himbauan.himbauan', compact('himbauans', 'title'));

    }
}
