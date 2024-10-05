<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Eventadmin; // Mengimpor model Eventadmin

class EventadminController
{
    public function index()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $events = Eventadmin::all(); // Mengambil semua data acara
        return view('eventadmin.index', compact('events'));
    }

    public function show($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $event = Eventadmin::findOrFail($id); // Mengambil data acara berdasarkan ID
        return view('eventadmin.show', compact('event')); // Mengirim data ke view
    }

    public function update(Request $request, $id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $event = Eventadmin::findOrFail($id);
        $event->event_name = $request->event_name;
        $event->address = $request->address;
        $event->schedule = $request->schedule;
        $event->ket = $request->ket;
        $event->save();

        return redirect()->route('eventadmin.index')->with('success', 'Data acara berhasil diperbarui.');
    }

    public function destroy($id)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $event = Eventadmin::findOrFail($id);
        $event->delete();

        return redirect()->route('eventadmin.index')->with('success', 'Data acara berhasil dihapus.');
    }

    public function create()
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        return view('eventadmin.create'); // Mengarahkan ke view add.blade.php
    }

    public function store(Request $request)
    {
        if(auth()->guest()){
            abort(403);
        }
        if(auth()->user()->role !== 'admin'){
            abort(403);
        }
        $event = new Eventadmin();
        $event->event_name = $request->event_name;
        $event->address = $request->address;
        $event->schedule = $request->schedule;
        $event->ket = $request->ket;
        $event->save();

        return redirect()->route('eventadmin.index')->with('success', 'Acara berhasil ditambahkan!');
    }



}
