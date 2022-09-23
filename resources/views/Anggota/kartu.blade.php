<!DOCTYPE html> 
<html>
    <head>
        <title>Kartu Anggota {{$anggota->nama_ag}}</title>
        <style>
            h4 { font-family: Duru Sans, Verdana, sans-serif; }
            p { font-family: Duru Sans, Verdana, sans-serif; }
        </style>
    </head>
    <body>
        <div style="border: 2px solid black; background: rgb(243, 255, 78); width: 400px; height: 260px;">
            <h4><center>KARTU ANGGOTA</center></h4>
            <h4 style="line-height: 0.5mm;"><center>PERPUSTAKAAN</center></h4><hr>
            <div>
                <img src="{{storage_path('app/public/'.$anggota->foto) }}" width="120px" height="120px" style="margin-left: 32px; border-radius: 50%; margin-top: 10px;">
                <div style="float: right; margin-right: 60px; margin-bottom: 20px;">
                    <p>Nama : {{$anggota->nama_ag}}</p>
                    <p>Alamat : {{$anggota->alamat}}</p>
                    <p>TTL : {{$anggota->ttl}}</p>
                    <p>Jenis Kelamin : {{$anggota->jenis_kelamin}}</p>
                </div>
            </div>
        </div>
    </body>
</html> 