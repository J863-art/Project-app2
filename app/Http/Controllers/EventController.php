<?php

namespace App\Http\Controllers;

use App\Models\Event;
use Illuminate\Http\Request;

class EventController extends Controller
{
    public function index()
    {
        if (!auth()->check() || auth()->user()->role === 'user') {
            // Guest atau user dengan role 'user' diizinkan
            // Logika kamu bisa dimasukkan di sini
        } else {
            abort(403); // Selain guest atau role 'user' dilarang
        }
        $events = Event::all(); // Mengambil semua data dari tabel 'events'
        return view('events.index', [
        'title' => 'Events', // Menyediakan variabel $title
        'events' => $events
        ]);
    }

}
