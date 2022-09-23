@extends('pinjam.layout')

@section('content')

<div class="container mt-5">
    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Tambah Data Peminjaman
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
                <form method="post" action="{{ route('pinjam.store') }}" id="myForm">
                    @csrf
                    <div class="form-group">
                        <label for="id">Nama</label>
                        <select name="id" class="form-control select2">
                            @foreach($pinjam_a as $ag)
                            <option value="{{$ag->id}}">{{$ag->nama_ag}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_buku">Judul</label>
                        <select name="id_buku" class="form-control select2">
                        @foreach($pinjam_b as $bk)
                            <option value="{{$bk->id_buku}}">{{$bk->judul}}</option>
                            @endforeach 
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label>
                        <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" aria-describedby="tanggal_pinjam">
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label>
                        <input type="date" name="tanggal_kembali" class="form-control" id="tanggal_kembali" aria-describedby="tanggal_kembalii">
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <input type="text" name="status" class="form-control" id="status" aria-describedby="status" value="Pinjam">
                    </div>

                    <button type="submit" class="btn btn-primary">Submit</button>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection