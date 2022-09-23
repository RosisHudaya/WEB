@extends('pinjam.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Detail Peminjaman
         </div>
         <div class="card-body">
             <ul class="list-group list-group-flush">
                 <li class="list-group-item"><b>ID Pinjam : </b>{{$Pinjam->id}}</li>
                 <li class="list-group-item"><b>Nama : </b>{{$Pinjam_a->anggota->nama_ag}}</li>
                 <li class="list-group-item"><b>Judul : </b>{{$Pinjam_b->buku->judul}}</li>
                 <li class="list-group-item"><b>Tanggal Pinjam : </b>{{$Pinjam->tanggal_pinjam}}</li>
                  <li class="list-group-item"><b>Tanggal Kembali : </b>{{$Pinjam->tanggal_kembali}}</li>
                  <li class="list-group-item"><b>Buku Kembali : </b>{{$Pinjam->kembali}}</li>
                  <li class="list-group-item"><b>Terlambat : </b>{{$Pinjam->lambat}} hari</li>
                  <li class="list-group-item"><b>Status : </b>{{$Pinjam->status}}</li>
                  <li class="list-group-item"><b>Denda : </b>{{$Pinjam->denda}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('pinjam.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection