@extends('buku.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Buku
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
                <form method="post" action="{{ route('buku.update', $Buku->id_buku) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <!-- <div class="form-group">
                        <label for="Id_Buku">Id_Buku</label>
                        <input type="text" name="Id_Buku" class="form-control" id="Id_Buku" value="{{ $Buku->id_buku }}" aria-describedby="Id_Buku">
                    </div> -->
                    <div class="form-group">
                        <label for="Judul">Judul</label>
                        <input type="Judul" name="Judul" class="form-control" id="Judul" value="{{ $Buku->judul }}" aria-describedby="Judul">
                    </div>
                    <div class="form-group">
                        <label for="Penerbit">Penerbit</label>
                        <input type="Judul" name="Penerbit" class="form-control" id="Penerbit" value="{{ $Buku->penerbit }}" aria-describedby="Penerbit">
                    </div>
                    <div class="form-group">
                        <label for="Pengarang">Pengarang</label>
                        <input type="Pengarang" name="Pengarang" class="form-control" id="Pengarang" value="{{ $Buku->pengarang }}" aria-describedby="Pengarang">
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Jenis</label>
                        <input type="Jenis" name="Jenis" class="form-control" id="Jenis" value="{{ $Buku->jenis }}" aria-describedby="Jenis">
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok</label>
                        <input type="number" name="Stok" class="form-control" id="Stok" value="{{ $Buku->stok }}" aria-describedby="Stok">
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-success" href="{{ route('buku.index') }}">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection