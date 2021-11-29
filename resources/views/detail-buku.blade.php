@extends('layout.master_tabel')

@section('content')
<html>
    <head>
        <link href="{{ asset('dist/css/lightbox.min.css') }}" rel="stylesheet">
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        
        <section id="album" class="py-1 text-center bg-light">
            <div class="container" >
                <h2 style="padding-top: 10px;">Buku: {{ $bukus->judul }}</h2>
                <hr>
                <div class="row">
                    @foreach ($galeris as $data)
                    <div class="col-md-4">
                        <a href="{{ asset('images/'.$data->foto) }}" data-lightbox="image-1" data-title="{{ $data->keterangan }}"> 
                            <img src="{{ asset('thumb/'.$data->foto) }}">
                        </a>
                        <p><h5>{{ $data->nama_galeri }}</h5></p>
                    </div>
                    @endforeach
                </div>
            
            <div class="container mt-5 mb-5">
                <div class="d-flex justify-content-center row">
                    <div class="d-flex flex-column col-md-8">
                        <div class="d-flex flex-row align-items-center text-left comment-top p-2 bg-white border-bottom px-4">
                            <div class="d-flex flex-column ml-3">
                                <div class="d-flex flex-row post-title">
                                    <h5>Hi, {{ Auth()->user()->name }}</h5><span class="ml-2"></span>
                                </div>
                            </div>
                        </div>
                        <div class="coment-bottom bg-white p-2 px-4">
                            <form method="post" action="{{ route('komentar.store', $bukus->id) }}">
                            @csrf
                            <div class="d-flex flex-row add-comment-section mt-4 mb-4">
                                <input type="text" name="comment" class="form-control mr-3" placeholder="Tambah Komentar...">
                                <button class="btn btn-primary" type="button">Kirim</button>
                            </div>
                            <div class="collapsable-comment">
                                <div class="d-flex flex-row justify-content-between align-items-center action-collapse p-2" data-toggle="collapse" aria-expanded="false" aria-controls="collapse-1" href="#collapse-1"><span>Comments</span><i class="fa fa-chevron-down servicedrop"></i>
                                </div>
                                <div id="collapse-1" class="collapse">
                                    @foreach ($komentar as $komen)
                                    <div class="commented-section mt-2 border">
                                        <div class="d-flex flex-row align-items-center commented-user">
                                            <h5 class="mr-2">{{ $komen->user->name }}</h5><span class="dot mb-1"></span>
                                            
                                        </div>
                                        <div class="comment-text-sm bg-light"><span>{{ $komen->comment }}</span>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>               
            
               
                <div>
                    <div>{{ $galeris->links() }}</div>                
                    
                </div>
                
            </div>

        </section>
        <!-- font awesome icon -->
        <script src="https://kit.fontawesome.com/003603851d.js" crossorigin="anonymous"></script>
        <script src="{{ asset('dist/js/lightbox-plus-jquery.min.js') }}"></script>
    </body>
    
</html>
@endsection
