<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Eventadmin extends Model
{
    protected $table = 'events'; // Tentukan nama tabel yang digunakan

    protected $fillable = ['event_name', 'address', 'schedule', 'ket'];
}
