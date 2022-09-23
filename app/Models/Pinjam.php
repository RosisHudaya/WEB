<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pinjam extends Model
{
    use HasFactory;
    protected $table = 'pinjam';
    
    protected $fillable = [

        'id',
        'id_ag',
        'id_Buku',
        'tanggal_pinjam',
        'tanggal_kembali',
        'kembali',
        'lambat',
        'status',
        'denda',
    ];

        public function buku(){
            return $this->belongsTo(Buku::class, 'id_buku', 'id_buku');
        }

        public function anggota(){
            return $this->belongsTo(Anggota::class, 'id_ag', 'id');
        }

}
