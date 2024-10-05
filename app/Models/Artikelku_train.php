<?php

namespace App\Models;

//use Illuminate\Database\Eloquent\Factories\HasFactory;
//use Illuminate\Database\Eloquent\Model;

//class artikel extends Model
class artikelku
{
    private static $artikelan=[
        [
            "title" => "Artikel 1",
            "slug" => "artikel 1",
            "author" => "Januar Simanjuntak",
            "body" => "Plis wok, aku mau sprei gratis nya wok, ibu aku itu agak miskin, kok saya lihat livestream mu kenapa kamu ketawa hah, mana
            sprei gratis yang janjikan itu hahhh disaat pendukung mu oke gas oke gas kamu malah ketawa itu gak respek banget wok, dan jangan lupa
            makanan siang gratisnya wok"
        ],

        [
            "title" => "Artikel Pemilu",
            "slug" => "artikel 2",
            "author" => "Must a nice",
            "body" => "Walaupun saya kalah pemilu, namun saya mensyukuri atas apa yang sudah saya lalui saat ini, oleh karena itu saya ingin membagikan
            kacama minus gratis, barangnya bagus, bermanfaat, dan harga terjangkau"
        ]
    ];

    public static function all()
    {
        return collect(self::$artikelan);
    }

    public static function find($slug)
    {
        $artikel = static::all();
        //$artik =[];
        //foreach($artikel as $a) {
            //if($a["slug"] ===$slug){
                //$artik =$a;
            //}
        //}

        return $artikel->firstwhere('slug', $slug);
    }

}

