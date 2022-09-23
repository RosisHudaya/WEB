<?php

namespace App\Http\Controllers;
use App\Models\Pinjam;
use App\Models\Buku;
use App\Models\Anggota;

use Illuminate\Http\Request;

class PinjamController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        
        if (request('search')) {
            $paginate = Pinjam::where('id', 'like', '%' . request('search') . '%')
                ->orwhere('id_ag', 'like', '%' . request('search') . '%')
                ->orwhere('id_buku', 'like', '%' . request('search') . '%')
                ->orwhere('tanggal_pinjam', 'like', '%' . request('search') . '%')
                ->orwhere('tanggal_kembali', 'like', '%' . request('search') . '%')
                ->orwhere('status', 'like', '%' . request('search') . '%')->paginate(5);
            return view('pinjam.index', ['paginate' => $paginate]);
        } else {
            $pinjam_a = Pinjam::with('anggota')->get();
            $pinjam_b = Pinjam::with('buku')->get();
            $paginate = Pinjam::orderBy('id','asc')->paginate(5);
            return view('pinjam.index', ['pinjam_a' => $pinjam_a, 'pinjam_b' => $pinjam_b ,'paginate' => $paginate]);
      }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $pinjam_a= Anggota::all(); //mendapatkan data dari tabel 
        $pinjam_b= Buku::all(); //mendapatkan data dari tabel 
        $pinjam= Pinjam::all(); //mendapatkan data dari tabel 

        return view('pinjam.create',['pinjam_a'=> $pinjam_a , 'pinjam_b'=>$pinjam_b,'pinjam'=>$pinjam]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
         //melakukan validasi data
         $request->validate([
            // 'id' => 'required',
            // 'id_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            // 'Status' => 'required',
        ]);

        $Pinjam = new Pinjam;
        $Pinjam->id_ag = $request->get('id');
        $Pinjam->id_buku = $request->get('id_buku');
        $Pinjam->tanggal_pinjam = $request->get('tanggal_pinjam');
        $Pinjam->tanggal_kembali = $request->get('tanggal_kembali');
        $Pinjam->status = $request->get('status');
        $Pinjam->save();

        // $buku = new Buku;
        // $buku->id_buku = $request->get('Buku');

        // //fungsi eloquent untuk menambah data dengan relasi belongsTo
        // $Pinjam->buku()->associate($buku);
        $Pinjam->save();


        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pinjam.index')
        ->with('success','Peminjaman Berhasil Ditambahakan');
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $pinjam = Pinjam::where('id', $id)->first();
        $pinjam_a = Pinjam::with('anggota')->where('id', $id)->first();
        $pinjam_b = Pinjam::with('buku')->where('id', $id)->first();
        return view('Pinjam.detail', ['Pinjam_a' => $pinjam_a , 'Pinjam_b'=>$pinjam_b, 'Pinjam'=>$pinjam]); 
     
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $pinjam_a = Pinjam::with('anggota')->where('id', $id)->first();
        $anggota = Anggota::all();

        $pinjam_b = Pinjam::with('buku')->where('id', $id)->first();
        $buku = Buku::all();
        $pinjam = Pinjam::where('id', $id)->first();
        return view('Pinjam.edit', compact('pinjam_a','pinjam_b','anggota','buku','pinjam'));   

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //melakukan validasi data
        $request->validate([
            // 'id' => 'required',
            // 'id_buku' => 'required',
            'tanggal_pinjam' => 'required',
            'tanggal_kembali' => 'required',
            // 'Status' => 'required',
        ]);

        // $pinjam= Pinjam::with('anggota','buku')->where('id', $id)->first();
        // $pinjam_b = Pinjam::with('buku')->where('id', $id)->first();
        $pinjam = Pinjam::where('id', $id)->first();
        $pinjam-> id_ag= $request->get('id_ag');
        $pinjam-> id_buku = $request->get('id_buku');
        $pinjam->tanggal_pinjam = $request->get('tanggal_pinjam');
        $pinjam->tanggal_kembali = $request->get('tanggal_kembali');
        $pinjam->lambat = $request->get('lambat');
        $pinjam->kembali = $request->get('kembali');
        $pinjam->status = $request->get('status');

        $lambat = $pinjam->lambat = $request->get('lambat');
        if($lambat > 0){
            $pinjam->denda = $lambat * 1500;
        }else{
            $pinjam->denda = 0;
        }
        $pinjam->save();
        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('pinjam.index')
        ->with('success','Data Peminjaman berhasil di update');
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         //fungsi eloquent untuk menghapus data
         Pinjam::where('id', $id)->delete();
         return redirect()->route('pinjam.index')
             ->with('success', 'Data Berhasil Dihapus');
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
