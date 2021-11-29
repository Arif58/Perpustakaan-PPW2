@extends('layout.master_tabel')

@section('content')
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" 
        integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <div class="d-block m-2 p-2">
        <h2>Edit Galeri Buku</h2>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <br>
        <form method="post" action="{{ route('galeri.update', $galeri->id) }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="nama_galeri" class="form-label">Judul</label>
                <input type="text" name="nama_galeri" class="form-control" value="{{$galeri->nama_galeri}}">
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">Buku</label>
                <select name="id_buku" class="form-select" aria-label="Default select example">
                    @foreach ($buku as $data)
                    <option value="{{ $data->id }}" @if($data->id==$galeri->id_buku) selected @endif>{{ $data->judul }}</option>
                    @endforeach
                    
                </select>
            </div>
            <div class="mb-3">
                <label for="inputHarga" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control" value="{{$galeri->keterangan}}">{{$galeri->keterangan}}</textarea>
            </div>
            <div class="mb-3 text-center">
                @if($galeri->foto)
                <img src="{{ asset('thumb/' . $galeri->foto) }}" class="img-preview img-fluid d-block mb-3 mx-auto">
                @else
                <img class="img-preview img-fluid">
                @endif
                <label for="foto" class="form-label">Upload Foto</label>
                <input type="file" id="image" name="foto" class="form-control @error('image') is-invalid @enderror" 
                onchange="previewImage()">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/galeri">Batal</a>
            </form>
        </div> 
    </body>
</html>
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
@endsection