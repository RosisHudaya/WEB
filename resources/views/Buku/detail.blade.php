@extends('buku.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
            Detail Buku
         </div>
         <div class="card-body">
             <ul class="list-group list-group-flush">
                 <li class="list-group-item"><b>ID Buku : </b>{{$Buku->id_buku}}</li>
                 <li class="list-group-item"><b>Judul : </b>{{$Buku->judul}}</li>
                 <li class="list-group-item"><b>Penerbit : </b>{{$Buku->penerbit}}</li>
                  <li class="list-group-item"><b>Pengarang : </b>{{$Buku->pengarang}}</li>
                  <li class="list-group-item"><b>Jenis : </b>{{$Buku->jenis}}</li>
                  <li class="list-group-item"><b>Stok : </b>{{$Buku->stok}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('buku.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection