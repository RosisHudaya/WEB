<?php

namespace Database\Seeders;

use Illuminate\Support\Facades\DB;

use Illuminate\Database\Seeder;

class BukuSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $buku = [
            [
                'judul' => 'Marmut Merah Jambu',
                'penerbit' => 'Bukune',
                'pengarang' => 'Raditya Dika',
                'jenis' => 'Novel',
                'stok' => '10',

            ],

            [
                'judul' => 'Matematika Diskrit',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Heru Nugroho',
                'jenis' => 'Buku Pelajaran',
                'stok' => '30',

            ],

            [
                'judul' => 'Koleksi Humor Gus Dur',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Guntur Wiguna',
                'jenis' => 'Buku Komedi',
                'stok' => '10',

            ],

            [
                'judul' => 'Dia Adalah Dilanku Tahun 1990',
                'penerbit' => 'PT Mizan Pustaka',
                'pengarang' => 'Pidi Baiq',
                'jenis' => 'Buku Komedi',
                'stok' => '10',

            ],

            [
                'judul' => 'Dasar Pemrograman',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Renaldi Munir',
                'jenis' => 'Buku Pelajaran',
                'stok' => '10',

            ],

            [
                'judul' => 'Dasar Pemrograman',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Renaldi Munir',
                'jenis' => 'Buku Pelajaran',
                'stok' => '10',

            ],

            [
                'judul' => 'Kumpulan Doa dan Tata Cara Sholat',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Abdul Qadir',
                'jenis' => 'Buku Agama',
                'stok' => '10',

            ],

            [
                'judul' => 'Kisah 25 Nabi',
                'penerbit' => 'Gramedia',
                'pengarang' => 'Ahmad Fuad',
                'jenis' => 'Buku Agama',
                'stok' => '12',
            ],

            [
                'judul' => 'Humor Kang Santri',
                'penerbit' => 'Bukune',
                'pengarang' => 'Zaki Latif',
                'jenis' => 'Buku Komedi',
                'stok' => '12',

            ],

        ];

        DB::table('buku')->insert($buku);
    }
}
