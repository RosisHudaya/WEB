@extends('buku.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Anggota
            </div>
            <div class="card-body">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <strong>Whoops!</strong> There were some problems with your input.<br><br>
                    <ul>
                        @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <form method="post" action="{{ route('anggota.update', $anggota->id) }}" id="myForm" }} method="post" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="foto">Foto</label>         
                        <input type="file" class="form-control" name="foto" placeholder="{{ $anggota->foto}}"><br>
                        <img width="150px" src="{{asset('storage/'.$anggota->foto)}}"> 
                    </div> 
                    <div class="form-group">
                        <label for="nama">Nama</label>
                        <input type="text" name="nama" class="form-control" id="nama" value="{{ $anggota->nama_ag }}" aria-describedby="nama">
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <input type="text" name="alamat" class="form-control" id="alamat" value="{{ $anggota->alamat }}" aria-describedby="alamat">
                    </div>
                    <div class="form-group">
                        <label for="ttl">TTL</label>
                        <input type="date" name="ttl" class="form-control" id="ttl" value="{{ $anggota->ttl }}" aria-describedby="ttl">
                    </div>
                    <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option>{{$anggota->jenis_kelamin}}</option>
                            <option>Pria</option>
                            <option>Wanita</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-success" href="{{ route('anggota.index') }}">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 