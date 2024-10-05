<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Carbon\Carbon;

class Event extends Model
{
    protected $fillable = ['event_name', 'address', 'schedule'];

    // Menambahkan metode akses untuk mengonversi string ke Carbon
    public function getScheduleAttribute($value)
    {
        return Carbon::parse($value);
    }
}
