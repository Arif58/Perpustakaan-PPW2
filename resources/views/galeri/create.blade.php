@extends('layout.master_tabel')

@section('content')
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <h2>Tambah Galeri Buku</h2>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <br>
        <form method="post" action="{{ route('galeri.store') }}" enctype="multipart/form-data">
        @csrf
            <div class="mb-3">
                <label for="nama_galeri" class="form-label">Judul</label>
                <input type="text" name="nama_galeri" class="form-control">
            </div>
            <div class="mb-3">
                <label for="id_buku" class="form-label">Buku</label>
                <select name="id_buku" class="form-select" aria-label="Default select example">
                    <option value="" selected>Pilih Buku</option>
                    @foreach ($buku as $data)
                    <option value="{{ $data->id }}">{{ $data->judul }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="keterangan" class="form-label">Keterangan</label>
                <textarea name="keterangan" class="form-control"></textarea>
            </div>
            <div class="mb-3 text-center">
                <label for="foto" class="form-label">Upload Foto</label>
                <img class="img-preview img-fluid mb-3 mx-auto">
                <input type="file" id="image" name="foto" class="form-control d-block @error('image') is-invalid @enderror" onchange="previewImage()">
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/galeri">Batal</a>
            </form>
    </body>
</html>
@endsection

<script>
    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');

        imgPreview.style.display = "block";
        imgPreview.style.height = "200px";
        imgPreview.style.width = "180px";

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0]);

        oFReader.onload = function(oFREvent) {
            imgPreview.src = oFREvent.target.result;
        }
    }

</script>