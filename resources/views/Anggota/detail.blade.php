@extends('buku.layout')

@section('content')
<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                <center><b>DETAIL ANGGOTA</b></center>
            </div>
            <div class="card-body">
                <img width="120px" height="120px" src="{{ $anggota->foto==''? asset('images/default.png'): asset('storage/'.$anggota->foto) }}" class="rounded mx-auto d-block" alt="">
                <ul class="list-group list-group-flush">
                    <li class="list-group-item"><b>NAMA</b>&emsp;&emsp;&emsp;&emsp;&nbsp;&nbsp;: {{$anggota->nama_ag}}</li>
                    <li class="list-group-item"><b>ALAMAT</b>&emsp;&emsp;&emsp;&nbsp;&nbsp;: {{$anggota->alamat}}</li>
                    <li class="list-group-item"><b>TTL</b>&emsp;&emsp;&emsp;&emsp;&emsp;&emsp;: {{$anggota->ttl}}</li>
                    <li class="list-group-item"><b>JENIS KELAMIN</b>&nbsp;: {{$anggota->jenis_kelamin}}</li>
                </ul>
            </div>
            <a class="btn btn-success mt-3" href="{{ route('anggota.index') }}">Kembali</a>
        </div>
    </div>
</div>
@endsection