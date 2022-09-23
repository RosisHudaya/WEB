<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use App\Models\Buku;
use App\Models\Pinjam;
use Illuminate\Http\Request;

class BukuController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // //fungsi eloquent menampilkan data menggunakan pagination
        // $buku = Buku::all(); // Mengambil semua isi tabel
        // $paginate = Buku::orderBy('id_buku', 'asc')->paginate(3);
        // return view('buku.index', ['buku' => $buku, 'paginate' => $paginate]);
        if (request('search')) {
            $paginate = Buku::where('id_buku', 'like', '%' . request('search') . '%')
                ->orwhere('judul', 'like', '%' . request('search') . '%')
                ->orwhere('penerbit', 'like', '%' . request('search') . '%')
                ->orwhere('pengarang', 'like', '%' . request('search') . '%')
                ->orwhere('jenis', 'like', '%' . request('search') . '%')
                ->orwhere('stok', 'like', '%' . request('search') . '%')->paginate(5);
            return view('buku.index', ['paginate' => $paginate]);
        } else {
            //fungsi eloquent menampilkan data menggunakan pagination
            $buku = Buku::all(); // Mengambil semua isi tabel
            $paginate = Buku::orderBy('id_buku', 'asc')->paginate(5);
            return view('buku.index', ['buku' => $buku, 'paginate' => $paginate]);
      }

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buku.create');

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
            // 'Id_Buku' => 'required',
            'Judul' => 'required',
            'Penerbit' => 'required',
            'Pengarang' => 'required',
            'Jenis' => 'required',
            // 'Stok '=> 'required',  
        ]);
        //fungsi eloquent untuk menambah data
        Buku::create($request->all());

        //jika data berhasil ditambahkan, akan kembali ke halaman utama
        return redirect()->route('buku.index')
        ->with('success', 'Buku Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //menampilkan detail data dengan menemukan/berdasarkan Nim Mahasiswa
        $Buku = Buku::where('id_buku', $id)->first();
        return view('buku.detail', compact('Buku'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //menampilkan detail data 
        $Buku = DB::table('buku')->where('id_buku', $id)->first();
        return view('buku.edit', compact('Buku'));
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
        $request->validate([
            // 'Id_Buku' => 'required',
            'Judul' => 'required',
            'Penerbit' => 'required',
            'Pengarang' => 'required',
            'Jenis' => 'required', 
            // 'Stok' => 'required', 
        ]);

        //fungsi eloquent untuk mengupdate data inputan kita
        Buku::where('id_buku', $id)
        ->update([
            // 'Id_Buku' => $request->id_buku,
            'judul'=>$request->Judul,
            'penerbit'=>$request->Penerbit,
            'pengarang'=>$request->Pengarang,
            'jenis' => $request->Jenis,
            'stok'=> $request->Stok, 
]);
    //jika data berhasil diupdate, akan kembali ke halaman utama
    return redirect()->route('buku.index')
    ->with('success', 'Buku Berhasil Diupdate');
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
        Pinjam::where('id_buku', $id)->delete();
        Buku::where('id_buku', $id)->delete();
        return redirect()->route('buku.index')
        -> with('success', 'Buku Berhasil Dihapus');

    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
