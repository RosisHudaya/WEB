<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TambahKolomDiTabelPinjam extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('pinjam', function (Blueprint $table){
            $table->date('kembali')->after('tanggal_kembali')->nullable();
            $table->string('denda')->after('status')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('pinjam', function (Blueprint $table){
            $table->dropColumn('kembali');
            $table->dropColumn('denda');
        });
    }
}
