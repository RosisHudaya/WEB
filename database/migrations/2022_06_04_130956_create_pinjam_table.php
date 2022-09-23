<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePinjamTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('pinjam', function (Blueprint $table) {
            $table->id('id');
            $table->unsignedBigInteger('id_ag'); 
            $table->unsignedBigInteger('id_buku'); 
            $table->foreign('id_ag')->references('id')->on('anggota'); 
            $table->foreign('id_buku')->references('id_buku')->on('buku'); 
            $table->date('tanggal_pinjam');
            $table->date('tanggal_kembali');
            $table->string('status');
            $table->timestamps();
        });
       
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('pinjam');
    }
}
