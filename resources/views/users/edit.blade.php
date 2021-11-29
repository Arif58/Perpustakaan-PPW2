@extends('layout.master_tabel')

@section('content')
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-F3w7mX95PdgyTmZZMECAngseQB83DfGTowi0iMjiWaeVhAn4FJkqJByhZMI3AhiU" crossorigin="anonymous">
    </head>
    <body>
        <h2>Edit User</h2>
        @if (count($errors) > 0)
            <ul class="alert alert-danger">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        @endif
        <br>
        <form method="post" action="{{ route('user.update', $user->id) }}">
        @csrf
            <div class="mb-3">
                <label for="inputNama" class="form-label">Nama</label>
                <input type="text" name="name" class="form-control" value="{{$user->name}}">
            </div>
            <div class="mb-3">
                <label for="inputEmail" class="form-label">Email</label>
                <input type="email" name="email" class="form-control" value="{{$user->email}}">
            </div>
            <div class="mb-3">
                <label for="inputPassword" class="form-label">Password</label>
                <input type="password" name="password" class="form-control" value="{{$user->password}}">
            </div>
            <div class="mb-3">
                <label for="inputLevel" class="form-label">Level</label>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="level" id="admin" value="admin" @if($user->level=='admin') checked @endif>
                    <label class="form-check-label" for="inputAdmin">
                        Admin
                    </label>
                </div>
                <div class="form-check">
                    <input class="form-check-input" type="radio" name="level" id="user" value="user" @if($user->level=='user') checked @endif>
                    <label class="form-check-label" for="inputUser">
                        User
                    </label>
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Simpan</button>
            <a class="btn btn-danger" href="/users">Batal</a>
            </form>
    </body>
</html>
@endsection