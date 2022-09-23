<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class AnggotaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('anggota')->insert([
            'nama_ag' => 'Rudi Tabuti',
            'jenis_kelamin' => 'pria',
            'alamat' => 'Tulungagung',
            'ttl' => '2001-06-08',
            'foto' => '',

        ]);
    }
}
