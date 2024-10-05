<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Himbauan extends Model
{
    use HasFactory;

    // Tambahkan kolom yang diizinkan untuk mass assignment
    protected $fillable = [
        'judul',
        'ket',
        'created_by',
    ];

    public $timestamps = false; // Nonaktifkan timestamps

}
