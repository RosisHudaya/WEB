@extends('buku.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
             Tambah Anggota
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
                <form method="post" action="{{ route('anggota.store') }}" id="myForm" enctype="multipart/form-data"> 
                    @csrf
                    <div class="form-group">
                        <label for="foto">Foto</label> 
                        <input type="file" name="foto" class="form-control" id="foto" aria-describedby="foto" > 
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama</label> 
                        <input type="text" name="nama" class="form-control" id="nama" aria-describedby="nama" > 
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label> 
                        <input type="text" name="alamat" class="form-control" id="alamat" aria-describedby="alamat" > 
                    </div>
                    <div class="form-group">
                        <label for="ttl">TTL</label> 
                        <input type="date" name="ttl" class="form-control" id="ttl" aria-describedby="ttl" > 
                    </div>
                    <div class="form-group">
                    <label for="jenis_kelamin">Jenis Kelamin</label>
                        <select name="jenis_kelamin" class="form-control">
                            <option>Pria</option>
                            <option>Wanita</option>
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>            
        </div>
    </div>
</div>
@endsection 