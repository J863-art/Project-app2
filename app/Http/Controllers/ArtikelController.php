<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikelku;
use App\Models\Category;

class ArtikelController extends Controller
{
    public function index()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        return view('artikel', [
            "title" => "Artikel",
            "artikel" => Artikelku::latest()->get()
        ]);
    }

    public function show(Artikelku $artik)
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        return view('artik', [ // Menampilkan view artik.php untuk user
            "title" => "Single Post",
            "artik" => $artik
        ]);
    }

}
