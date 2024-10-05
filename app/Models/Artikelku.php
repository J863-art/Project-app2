<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Artikelku extends Model
{
    use HasFactory;

    //protected $fillable =['title', 'excerpt', 'body'];
    protected $guarded = ['id'];

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function author(){
        return $this->belongsTo(User::class, 'user_id'); // Pastikan 'user_id' benar sesuai dengan kolom di database
    }

}
