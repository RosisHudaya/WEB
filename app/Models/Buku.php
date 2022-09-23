<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\Buku as Authenticatable;
use Illuminate\Notifications\Notifiable;


class Buku extends Model
{
    protected $table='buku';    

    protected $fillable = [
        'id_buku',
        'judul',
        'penerbit',
        'pengarang',
        'jenis',
        'stok', 
        
    ];
       
}
