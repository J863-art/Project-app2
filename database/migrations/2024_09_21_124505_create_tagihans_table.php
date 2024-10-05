<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateTagihansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tagihans', function (Blueprint $table) {
            $table->id(); // Kolom ID sebagai primary key
            $table->string('nik')->unique(); // NIK pengguna, dibuat unique
            $table->string('jenis_tagihan'); // Jenis tagihan
            $table->string('status'); // Status tagihan
            $table->date('jatuh_tempo'); // Tanggal jatuh tempo
            $table->binary('bukti_pembayaran')->nullable(); // Kolom binary untuk bukti pembayaran
            $table->string('mime_type')->nullable(); // Tipe MIME dari bukti pembayaran
            $table->timestamps(); // Kolom created_at dan updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tagihans');
    }
}
