@extends('layout.master_tabel')

@section('content')
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
    <div class="container-sm">
        <h2>Edit</h2>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <br>
        <form method="post" action="{{ route('buku.update', $buku->id) }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="inputJudul" class="form-label">Judul</label>
                <input type="text" name="judul" class="form-control" value="{{$buku->judul}}">
            </div>
            <div class="mb-3">
                <label for="inputPenulis" class="form-label">Penulis</label>
                <input type="text" name="penulis" class="form-control" value="{{$buku->penulis}}">
            </div>
            <div class="mb-3">
                <label for="inputHarga" class="form-label">Harga</label>
                <input type="text" name="harga" class="form-control" value="{{$buku->harga}}">
            </div>
            <div class="mb-3">
                <label for="inputTglTerbit" class="form-label">Tgl. Terbit</label>
                <input type="text" id="tgl_terbit" name="tgl_terbit" class="date form-control" value="{{$buku->tgl_terbit}}">
            </div>
            <div class="mb-3 text-center">
                @if($buku->foto)
                <img src="{{ asset('thumb/' . $buku->foto) }}" class="img-preview img-fluid d-block mb-3 mx-auto">
                @else
                <img class="img-preview img-fluid">
                @endif
                <label for="foto" class="form-label">Upload Foto Cover</label>
                <input type="file" id="image" name="foto" class="form-control @error('image') is-invalid @enderror" 
                onchange="previewImage()">
            </div>
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a class="btn btn-danger" href="/buku">Batal</a>
            </form>
            <script>
                function previewImage() {
                    const image = document.querySelector('#image');
                    const imgPreview = document.querySelector('.img-preview');

                    imgPreview.style.display = "block";
                    imgPreview.style.width = "170px";
                    imgPreview.style.height = "200px";

                    const oFReader = new FileReader();
                    oFReader.readAsDataURL(image.files[0]);

                    oFReader.onload = function(oFREvent) {
                        imgPreview.src = oFREvent.target.result;
                    }
                }
                

            </script>
    </div>
    </body>
</html>
    <!-- <div class="container">
        <h4>Edit</h4>
        <form method="post" action="{{ route('buku.update', $buku->id) }}">
        @csrf
            <div>Judul <input type="text" name="judul" value="{{$buku->judul}}"></div>
            <div>Penulis <input type="text" name="penulis" value="{{$buku->penulis}}"></div>
            <div>Harga <input type="text" name="harga" value="{{$buku->harga}}"></div>
            <div>Tgl. Terbit <input type="date" name="tgl_terbit" value="{{$buku->tgl_terbit}}"></div>
            <div><button type="submit">Simpan Perubahan</button></div>
            <a href="/buku">Batal</a>
        </form>

    </div> -->

@endsection