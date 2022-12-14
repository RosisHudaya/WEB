<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use App\Models\Anggota;
use App\Models\Pinjam;
use Illuminate\Http\Request;
use PDF;
use Illuminate\Support\Facades\Storage;
use Google\Cloud\Storage\StorageClient;
use Illuminate\Support\Facades\URL;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if (request('search')) {
            $paginate = Anggota::where('id', 'like', '%' . request('search') . '%')
                ->orwhere('nama_ag', 'like', '%' . request('search') . '%')
                ->orwhere('alamat', 'like', '%' . request('search') . '%')
                ->orwhere('jenis_kelamin', 'like', '%' . request('search') . '%')->paginate(5);
            return view('Anggota.index', ['paginate' => $paginate]);
        } else {
            $anggota = Anggota::all(); 
            $paginate = Anggota::orderBy('id', 'asc')->paginate(5);
            return view('Anggota.index', ['anggota' => $anggota, 'paginate' => $paginate]);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Anggota.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       
        if ($request->file('foto')) {
            $image_name = $request->file('foto');
            // $image_name = $request->file('foto')->store('images', 'public');
            $storage = new StorageClient([
                'keyFilePath' => public_path('key.json')
            ]);

            $bucketName = env('GOOGLE_CLOUD_BUCKET');
            $bucket = $storage->bucket($bucketName);

            //get filename with extension
            $filenamewithextension = pathinfo($request->file('foto')->getClientOriginalName(), PATHINFO_FILENAME);
            // $filenamewithextension = $request->file('foto')->getClientOriginalName();

            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);

            //get file extension
            $extension = $request->file('foto')->getClientOriginalExtension();

            //filename to store
            $filenametostore = $filename . '_' . uniqid() . '.' . $extension;

            Storage::put('app/public/' . $filenametostore, fopen($request->file('foto'), 'r+'));

            $filepath = storage_path('app/public/' . $filenametostore);

            $object = $bucket->upload(
                fopen($filepath, 'r'),
                [
                    'predefinedAcl' => 'publicRead'
                ]
            );

            // delete file from local disk
            Storage::delete('public/uploads/' . $filenametostore);
        }
        Anggota::create([
            'nama_ag' => $request->nama,
            'alamat' => $request->alamat,
            'ttl' => $request->ttl,
            'jenis_kelamin' => $request->jenis_kelamin,
            'foto' => $filenametostore,
        ]);

        return redirect()->route('Anggota.index')
            ->with('success', 'Anggota Berhasil Ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $anggota = DB::table('anggota')->where('id', $id)->first();
        return view('Anggota.detail', compact('anggota'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $anggota = DB::table('anggota')->where('id', $id)->first();
        return view('Anggota.edit', compact('anggota'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $anggota = Anggota::where('id', $id)->first();

        if ($request->hasFile('foto')) {
            // ada file yang diupload
            if ($anggota->foto && $anggota->foto != 'images/profile/default.png' && file_exists(storage_path('app/public/' . $anggota->foto))) {
                Storage::delete('public/' . $anggota->foto);
            }
            $filenameWithExt = $request->file('foto')->getClientOriginalName();
            $filename = pathinfo($filenameWithExt, PATHINFO_FILENAME);
            $extension = $request->file('foto')->getClientOriginalExtension();
            $filenameSimpan = $filename . '_' . time() . '.' . $extension;
            $path = $request->file('foto')->storeAs('public/img/profile/anggota', $filenameSimpan);
            $savepath = 'img/profile/anggota/' . $filenameSimpan;
        } else {
            // tidak ada file yang diupload
            $savepath = $anggota->foto;
        }
        $anggota->foto = $savepath;

        $anggota->nama_ag = $request->get('nama');
        $anggota->alamat = $request->get('alamat');
        $anggota->ttl = $request->get('ttl');
        $anggota->jenis_kelamin = $request->get('jenis_kelamin');
        $anggota->save();
        $anggota->save();
        return redirect()->route('Anggota.index')->with('success', 'Data Anggota Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        Pinjam::where('id_ag', $id)->delete();
        Anggota::where('id', $id)->delete();
        return redirect()->route('anggota.index')
        -> with('success', 'Data Anggota Berhasil Dihapus');
    }

    public function cetak($id){
        $anggota = DB::table('anggota')->where('id', $id)->first();
        $pdf = PDF::loadview('Anggota.kartu',['anggota'=>$anggota]);
        return $pdf->stream();
    }

    public function __construct()
    {
        $this->middleware('auth');
    }
}
