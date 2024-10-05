<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Rapat extends Model
{
    protected $fillable = ['tanggal', 'judul', 'alamat', 'keputusan', 'dokumentasi'];
}
