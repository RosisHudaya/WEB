<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Anggota;
use App\Models\Buku;
use App\Models\Pinjam;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $jumlah_anggota = Anggota::all()->count();
        $anggota_p = Anggota::where('jenis_kelamin', 'like', 'pria')->count();
        $anggota_w = Anggota::where('jenis_kelamin', 'like', 'wanita')->count();
        $jumlah_buku = Buku::all()->count();
        $buku_n = Buku::where('jenis', 'like', 'novel')->count();
        $buku_p = Buku::where('jenis', 'like', 'buku pelajaran')->count();
        $buku_k = Buku::where('jenis', 'like', 'buku komedi')->count();
        $buku_a = Buku::where('jenis', 'like', 'buku agama')->count();
        $buku_ko = Buku::where('jenis', 'like', 'komik')->count();
        $jumlah_pinjam = Pinjam::all()->count();
        $pinjam_p = Pinjam::where('status', 'like', 'pinjam')->count();
        $pinjam_k = Pinjam::where('status', 'like', 'kembali')->count();
        return view('home', ['anggota_p' => $anggota_p, 'anggota_w' => $anggota_w, 'jumlah_anggota' => $jumlah_anggota,
                                'jumlah_buku' => $jumlah_buku, 'buku_n' => $buku_n, 'buku_p' => $buku_p, 'buku_k' => $buku_k,
                                'buku_a' => $buku_a, 'buku_ko' => $buku_ko, 'jumlah_pinjam' => $jumlah_pinjam,
                                'pinjam_p' => $pinjam_p, 'pinjam_k' => $pinjam_k]);
    }
}
