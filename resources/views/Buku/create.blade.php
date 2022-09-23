@extends('buku.layout')

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
                <form method="post" action="{{ route('buku.store') }}" id="myForm">
                    @csrf
                    <!-- <div class="form-group">
                        <label for="Id_Buku">Id_Buku</label> 
                        <input type="Id_Buku" name="Id_Buku" class="form-control" id="Id_Buku" aria-describedby="Id_Buku" > 
                    </div> -->
                    <div class="form-group">
                        <label for="Judul">Judul</label> 
                        <input type="text" name="Judul" class="form-control" id="Judul" aria-describedby="Judul" > 
                    </div>
                    <div class="form-group">
                        <label for="Penerbit">Penerbit</label> 
                        <input type="Penerbit" name="Penerbit" class="form-control" id="Penerbit" aria-describedby="Penerbit" > 
                    </div>
                    <div class="form-group">
                        <label for="Pengarang">Pengarang</label> 
                        <input type="Pengarang" name="Pengarang" class="form-control" id="Pengarang" aria-describedby="password" > 
                    </div>
                    <div class="form-group">
                        <label for="Jenis">Jenis</label> 
                        <input type="Jenis" name="Jenis" class="form-control" id="Jenis" aria-describedby="Jenis" > 
                    </div>
                    <div class="form-group">
                        <label for="Stok">Stok</label> 
                        <input type="Stok" name="Stok" class="form-control" id="Stok" aria-describedby="Stok" > 
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>






            
        </div>
    </div>
</div>
@endsection 