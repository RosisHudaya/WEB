@extends('Buku.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
        <div class="card-header">
             Tambah Buku
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
                <form method="post" action="{{ route('Buku.store') }}" id="myForm">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="Id_Buku">Id_Buku</label> 
                        <input type="Id_Buku" name="Id_Buku" class="form-control" id="Id_Buku" aria-describedby="Id_Buku" > 
                    </div> -->
                    <div class="form-group">
                        <label for="Judul">Judul</label> 
                        <input type="text" name="judul" class="form-control" id="judul" aria-describedby="judul" > 
                    </div>
                    <div class="form-group">
                        <label for="Penerbit">Penerbit</label> 
                        <input type="Penerbit" name="penerbit" class="form-control" id="penerbit" aria-describedby="penerbit" > 
                    </div>
                    <div class="form-group">
                        <label for="Pengarang">Pengarang</label> 
                        <input type="Pengarang" name="pengarang" class="form-control" id="pengarang" aria-describedby="pengarang" > 
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Jenis</label> 
                        <input type="Jenis" name="jenis" class="form-control" id="jenis" aria-describedby="jenis" > 
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok</label> 
                        <input type="Stok" name="stok" class="form-control" id="stok" aria-describedby="stok" > 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>






            
        </div>
    </div>
</div>
@endsection 