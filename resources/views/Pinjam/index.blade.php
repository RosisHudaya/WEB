@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>DATA PEMINJAMAN BUKU</h2>
        </div>
        <div class="float-right my-2">
        </div>
        <div class="float-left my-3">
            <form action="{{ route('pinjam.index') }}">
                <div class="input-group mb-3">
                    <!-- <input type="text" class="form-control" placeholder="" name="search" value="{{ request('search')}}" style="width: 890px">
                    <button class="btn btn-primary" type="submit">Search</button>&emsp; -->
                    <a class="btn btn-success" href="{{ route('pinjam.create') }}"><i class="bi bi-pencil-square"></i> Input Data</a>
                </div>
        </div>
    </div>
</div>

@if ($message = Session::get('success'))
<div class="alert alert-success">
    <p>{{ $message }}</p>
</div>
@endif
@if ($message = Session::get('error'))
<div class="alert alert-error">
    <p>{{ $message }}</p>
</div>
@endif
<table class="table table-bordered">
    <tr>
        <!-- <th><center>ID Pinjam</th> -->
        <th><center>Nama</th>
        <th><center>Judul</th>
        <th><center>Tanggal Pinjam</th>
        <th><center>Tanggal Kembali</th>
        <th><center>Status</th>
        <th width="250px"><center>Action</th>
    </tr>
    @foreach ($paginate as $pj)
    <tr>
        <!-- <td><center>{{ $pj->id}}</td> -->
        <td><center>{{ $pj->anggota->nama_ag}}</td>
        <td>{{ $pj->buku->judul}}</td>
        <td>{{ $pj->tanggal_pinjam}}</td>
        <td>{{ $pj->tanggal_kembali}}</td>
        <td>{{ $pj->status}}</td>
        <td><center>
            <form action="{{ route('pinjam.destroy',['pinjam'=>$pj->id]) }}" method="POST">
                <a class="btn btn-info" href="{{ route('pinjam.show',$pj->id) }}"><i class="bi bi-layers-fill"></i></a>
                <a class="btn btn-primary" href="{{ route('pinjam.edit',$pj->id) }}"><i class="bi bi-pencil-square"></i></a>
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger"><i class="bi bi-trash"></i></button>
            </form>
        </td>
    </tr>
    @endforeach
</table>
{{ $paginate->links()}}

@endsection