@extends('layouts.app')

@section('content')
<div class="row">
				
				<div class="col-xl-3 col-md-6 mb-4">
                    <div class="card border-left-primary shadow h-100 py-2">
						<div class="card-body">
                            <div class="row no-gutters align-items-center">
                                <div class="col mr-2">
                                    <div class="text-lg font-weight-bold text-primary text-uppercase mb-1">
                                    <i class="bi bi-person-heart"></i></i> Anggota</div>
                                    <div class="h6 mb-0  text-gray-800">Pria : {{ $anggota_p }}</div>
                                    <div class="h6 mb-0  text-gray-800">Wanita : {{ $anggota_w }}</div>
                                    <div class="h6 mb-0  text-gray-800">Total : {{ $jumlah_anggota }}</div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						<div class="col-xl-3 col-md-6 mb-4">
                            <div class="card border-left-success shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-success text-uppercase mb-1">
                                            <i class="bi bi-journal-bookmark"></i> Peminjaman</div>
                                            <div class="h6 mb-0 font-weight text-gray-800">Pinjam : {{ $pinjam_p }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Kembali : {{ $pinjam_k }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Total : {{ $jumlah_pinjam }}</div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						<div class="row">
						<div class="col-xl-6 col-md-6 mb-4">
                            <div class="card border-left-warning shadow h-100 py-2">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-lg font-weight-bold text-warning text-uppercase mb-1" >
                                            <i class="bi bi-book"></i> Judul Buku</div>
                                            <div class="h6 mb-0 font-weight text-gray-800">Novel : {{ $buku_n }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Pelajaran : {{ $buku_p }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Komedi : {{ $buku_k }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Agama : {{ $buku_a }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Komik : {{ $buku_ko }}</div>
											<div class="h6 mb-0 font-weight text-gray-800">Total : {{ $jumlah_buku }}</div>
                                        </div>
                                        <div class="col-auto">
                                            
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
						</div>
						</div>
                <!-- End of Topbar -->
@endsection
