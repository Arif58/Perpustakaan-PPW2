@extends('layout.master_tabel')

@section('content')
    
    <html>
    @if(count($data_buku))
        <div class="alert alert-primary">Ditemukan <strong>{{count($data_buku)}}</strong> data dengan kata: <strong>{{ $cari }}</strong></div>
    @else
        <div class="alert alert-danger">Data <strong>{{ $cari }}</strong> tidak ditemukan</div>
    @endif 
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        </head>
        <body>
        
        <div class="title m-b-md">
                Data Buku
        </div>
        
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <form action="{{ route('buku.search') }}" method="get" class="d-flex">@csrf
                    <input type="text" name="kata" class="form-control me-2" placeholder="Cari Buku ..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
                <p align="right"><a class="btn btn-dark" href="{{ route('buku.create') }}">Tambah Buku</a></p>
            </div>
        </nav>
        <!-- <form action="{{ route('buku.search') }}" method="get">@csrf
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; display= inline; margin-top: 10px; margin-bottom: 10px; float: right;">
        </form> -->
            <div style="margin: 20px">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>no</th>                        
                        <th>id</th>
                        <th>Judul Buku</th>
                        <th>Penulis</th>
                        <th>Harga</th>
                        <th>Tgl. Terbit</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_buku as $buku)
                            <tr>
                                <td>{{ ++$no }}</td>
                                <td>{{ $buku->id }}</td>
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ number_format($buku->harga, 0, ',', '.') }}</td>
                                <td>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}</td>
                                <td style="display: flex">
                                    <div class="me-3">
                                        <form action="{{ route('buku.destroy', $buku->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">Hapus</button>
                                        </form>
                                    </div>
                                    <div>
                                        <a class="btn btn-warning" href="{{ route('buku.edit', $buku->id) }}">Edit</a>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
           <div><a class="btn btn-warning" href="/buku">Kembali</a></div>
           
        </body>
    </html>
    
@endsection