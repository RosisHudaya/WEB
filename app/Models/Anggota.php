<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Anggota extends Model
{
    protected $table='anggota';

    protected $fillable= [
        'id',
        'nama_ag',
        'alamat',
        'jenis_kelamin',
        'ttl',
        'foto',
    ];
    public function Pinjam(){
        return $this->belongsToMany(Pinjam::class, 'id');
    }
}
