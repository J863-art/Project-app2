<?php

namespace App\Http\Controllers;

use App\Models\Artikel;
use App\Models\Artikelku;
use Illuminate\Http\Request;
use Illuminate\Support\Str; // Tam

class ArtikeladminController extends Controller
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
        $artikel = Artikelku::all(); // Mengambil semua artikel dari model Artikelku
        return view('Artikeladmin.index', compact('artikel'));
    }


    public function show($slug)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        // Mengambil artikel berdasarkan slug dan memuat relasi author
        $artik = Artikelku::where('slug', $slug)->with('author')->firstOrFail();
        return view('Artikeladmin.show', compact('artik'));
    }


    public function create()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('Artikeladmin.create');
    }

    public function store(Request $request)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        // Jika ada upload gambar
        if ($request->file('image')) {
            $validatedData['image'] = $request->file('image')->store('artikel-images');
        }

        $validatedData['user_id'] = auth()->user()->id; // Set author sebagai user yang sedang login
        $validatedData['slug'] = Str::slug($request->title); // Membuat slug dari judul

        Artikelku::create($validatedData);

        return redirect('/Artikeladmin')->with('success', 'Artikel berhasil ditambahkan!');
    }



    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $artikel = Artikelku::findOrFail($id);
        return view('Artikeladmin.edit', compact('artikel'));
    }


    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $validatedData = $request->validate([
            'title' => 'required|max:255',
            'excerpt' => 'required',
            'body' => 'required',
        ]);

        $artikel = Artikelku::findOrFail($id);
        $artikel->update($validatedData);

        return redirect()->route('Artikeladmin.index')->with('success', 'Artikel berhasil diperbarui!');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $artikel = Artikelku::findOrFail($id);
        $artikel->delete();

        return redirect()->route('Artikeladmin.index')->with('success', 'Artikel berhasil dihapus.');
    }





}
