@extends('layout.master_tabel')

@section('content')
@if(Auth::check() && Auth::user()->level == 'admin')
    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        </head>
        <body>
        <div class="container-sm">
        <div class="title m-b-md">
                Data Galeri Buku
        </div>
        @if(Session::has('tambah'))
            <div class="alert alert-success">{{Session::get('tambah')}}</div>
        @endif
        @if(Session::has('hapus'))
            <div class="alert alert-danger">{{Session::get('hapus')}}</div>
        @endif
        @if(Session::has('update'))
            <div class="alert alert-info">{{Session::get('update')}}</div>
        @endif
        <nav class="navbar navbar-light">
            <div class="container-fluid">
                <p align="right">
                    <a class="btn btn-dark" href="{{ route('galeri.create') }}">
                    Tambah Galeri
                    </a>
                </p>
            </div>
        </nav>
       
            <div style="margin: 20px">
            <table class="table table-hover table-bordered border-dark border-2">
                <thead class="table-primary">
                    <tr>
                        <th>no</th>                        
                        <th>Nama Galeri</th>
                        <th>Nama Buku</th>
                        <th>Gambar</th>
                        <th>Keterangan</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($galeri as $data)
                    <tr>
                        <td>{{ ++$no }}</td>
                        <td>{{ $data->nama_galeri }}</td>
                        <td>{{ $data->bukus->judul }}</td>
                        <td><img src="{{ asset('thumb/'.$data->foto) }}" style="width: 100px"></td>
                        <td>{{ $data->keterangan }}</td>
                        <td style="display: flex; justify-content: center;">
                            <div class="me-3">
                                <form action="{{ route('galeri.destroy', $data->id) }}" method="post">
                                @csrf
                                    <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                                        Hapus
                                    </button>
                                </form>
                            </div>
                            <div>
                                <a class="btn btn-warning" href="{{ route('galeri.edit', $data->id) }}">
                                    Edit
                                </a>
                            </div>                        
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
            <div>{{ $galeri->links() }}</div>
        </div>
        </body> 
    </html>
@endif
@endsection
