@extends('layout.master_tabel')

@section('content')
    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
        </head>
        <body>
        <div class="container-sm">
        <div class="title m-b-md">
                Data Buku
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
                <form action="{{ route('buku.search') }}" method="get" class="d-flex">@csrf
                    <input type="text" name="kata" class="form-control me-2" placeholder="Cari Buku ..." aria-label="Search">
                    <button class="btn btn-outline-success" type="submit">Cari</button>
                </form>
                <div class="row">
                    <div class="col-sm-6">
                    @if(Auth::check() && Auth::user()->level == 'admin')
                        <a class="btn btn-dark" href="{{ route('buku.create') }}">Tambah Buku</a>
                    </div>
                    @endif
                    <div class="col-sm-6">
                        <a class="btn btn-secondary" href="{{ route('buku.list') }}">List Buku</a>
                    </div>
                </div>
            </div>
        </nav>
        <!-- <form action="{{ route('buku.search') }}" method="get" class="d-flex">@csrf
            <input type="text" name="kata" class="form-control" placeholder="Cari ..." style="width: 30%; display= inline; margin-top: 10px; margin-bottom: 10px; float: right;">
        </form> -->
            <div style="margin: 20px">
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>no</th>                        
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
                                <td>{{ $buku->judul }}</td>
                                <td>{{ $buku->penulis }}</td>
                                <td>{{ number_format($buku->harga, 0, ',', '.') }}</td>
                                <td>{{ Carbon\Carbon::parse($buku->tgl_terbit)->format('d/m/Y') }}</td>
                                <td style="display: flex; justify-content: center;">
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
            <!-- <h5>Total Data: {{ $jmlh_data }}</h5> -->
            <div><strong>Total Harga Buku = {{ "Rp ".number_format($total_harga, 2, ',', '.') }}</strong></div>
            </div>
            <div><strong>Jumlah Buku: {{ $jmlh_data }}</strong></div>
            <div>{{ $data_buku->links() }}</div>
        </div>
        </body> 
    </html>

@endsection
