<?php

namespace Database\Seeders;
use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class PinjamSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('pinjam')->insert([
            'id_ag' => '1',
            'id_buku' => '1',
            'tanggal_pinjam' => '2001-06-01',
            'tanggal_kembali' => '2001-06-07',
            'status' => 'Pinjam'

        ]);
    }
}
