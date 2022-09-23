@extends('layouts.app')

@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left mt-2">
            <h2>DATA BUKU</h2>
        </div>
        <div class="float-right my-2">
        </div>
        <div class="float-left my-3">
            <form action="{{ route('buku.index') }}">
                <div class="input-group mb-3">
                    <input type="text" class="form-control" placeholder="" name="search" value="{{ request('search')}}" style="width: 825px">
                    <button class="btn btn-primary" type="submit"><i class="bi bi-search"></i> Search</button>&emsp;
                    <a class="btn btn-success" href="{{ route('buku.create') }}"><i class="bi bi-pencil-square"></i> Input Buku</a>
                </div>
            </form>
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
            <th><center>ID Buku</th>
            <th><center>Judul</th>
            <th><center>Penerbit</th>
            <th><center>Pengarang</th>
            <th><center>Jenis</th>
            <th><center>Stok</th>
            <th width="250px"><center>Action</th>
        </tr>
        @foreach ($paginate as $bk)
        <tr>
            <td><center>{{ $bk ->id_buku }}</td>
            <td>{{ $bk ->judul }}</td>
            <td>{{ $bk ->penerbit }}</td>
            <td>{{ $bk ->pengarang }}</td>
            <td>{{ $bk ->jenis }}</td>
            <td>{{ $bk ->stok }}</td>
            <td><center>
                <form action="{{ route('buku.destroy',['buku'=>$bk->id_buku]) }}" method="POST">
                    <a class="btn btn-info" href="{{ route('buku.show',$bk->id_buku) }}"><i class="bi bi-layers-fill"></i></a>
                    <a class="btn btn-primary" href="{{ route('buku.edit',$bk->id_buku) }}"><i class="bi bi-pencil-square"></i></a>
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