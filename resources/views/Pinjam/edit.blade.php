@extends('pinjam.layout')

@section('content')

<div class="container mt-5">

    <div class="row justify-content-center align-items-center">
        <div class="card" style="width: 24rem;">
            <div class="card-header">
                Edit Data Peminjaman
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
                <form method="post" action="{{ route('pinjam.update', $pinjam->id) }}" id="myForm">
                    @csrf
                    @method('PUT')
                    <div class="form-group">
                        <label for="id_ag">Nama</label>
                        <select name="id_ag" class="form-control">
                            @foreach($anggota as $ag)
                            <option value="{{$ag->id}}" {{$pinjam->id_ag == $ag->id ? 'selected' : ''}}>{{$ag->nama_ag}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="id_buku">Judul</label>
                        <select name="id_buku" class="form-control">
                            @foreach($buku as $bk)
                            <option value="{{$bk->id_buku}}" {{$pinjam->id_buku == $bk->id_buku ? 'selected' : ''}}>{{$bk->judul}}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="tanggal_pinjam">Tanggal Pinjam</label> 
                        <input type="date" name="tanggal_pinjam" class="form-control" id="tanggal_pinjam" value="{{ $pinjam->tanggal_pinjam}}" aria-describedby="tanggal_pinjam" > 
                    </div>
                    <div class="form-group">
                        <label for="tanggal_kembali">Tanggal Kembali</label> 
                        <input type="date" name="tanggal_kembali" class="form-control" id="tanggal_kembali" value="{{ $pinjam->tanggal_kembali}}" aria-describedby="tanggal_kembali" > 
                    </div>
                    <div class="form-group">
                        <label for="kembali">Buku Kembali</label> 
                        <input type="date" name="kembali" class="form-control" id="kembali" value="{{ $pinjam->kembali}}" aria-describedby="kembali" > 
                    </div>
                    <div class="form-group">
                        <label for="lambat">Buku Kembali</label> 
                        <input type="number" name="lambat" class="form-control" id="lambat" value="{{ $pinjam->lambat}}" aria-describedby="lambat" > 
                    </div>
                    <div class="form-group">
                        <label for="status">Status</label>
                        <select name="status" class="form-control select2">
                                <option>{{ $pinjam->status}}</option>
                                <option value="Pinjam">Pinjam</option>
                                <option value="Kembali">Kembali</option>          
                        </select>
                    </div>
                    <button type="submit" class="btn btn-primary">Submit</button>
                    <button class="btn btn-success" href="{{ route('pinjam.index') }}">Kembali</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection