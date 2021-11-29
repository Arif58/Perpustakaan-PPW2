@extends('layout.master_tabel')
@section('content')
    <html>
        <head>
            <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
            
        </head>
        <body>
        <div class="container-sm">
        <div class="title m-b-md">
                List Buku
        </div>
        <div class="container">
            <div class="row">
                @foreach($data_buku as $data)
                <div class="col">
                    <div>
                        <div class="card-body">
                        <a href="{{ route('galeri.buku', $data->buku_seo) }}" class="text-decoration-none text-dark">
                            <img src="{{ asset('thumb/'.$data->foto) }}" class="card-img-top" style="width: 250px">
                            <h5 class="card-title" style="padding-top:10px">{{ $data->judul }}</h5>
                        </a>
                        <a href="{{ route('buku.like', $data->id) }}" class="btn btn-primary btn-sm">
                            <i class="fa fa-thumbs-up"></i> Like
                            <span class="badge"> {{ $data->suka }}</span>
                        </a>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        </div>
        <div>{{ $data_buku->links() }}</div>
        <a class="btn btn-primary" href="/buku">Kembali</a>
        </div>
        <!-- font awesome icon -->
        <script src="https://kit.fontawesome.com/003603851d.js" crossorigin="anonymous"></script>
        </body> 
    </html>
@endsection