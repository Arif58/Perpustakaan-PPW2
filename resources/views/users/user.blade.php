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
                Data User
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
                <p align="right"><a class="btn btn-dark" href="{{ route('user.create') }}">Tambah User</a></p>
            </div>
        </nav>
       
            <div style="margin: 20px">
            
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>no</th>                        
                        <th>Nama</th>
                        <th>Email</th>
                        <th>Level</th>
                        <th>Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($data_user as $user)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ $user->name }}</td>
                                <td>{{ $user->email }}</td>
                                <td>{{ $user->level }}</td>
                                <td style="display: flex; flex-flow: wrap; justify-content: center;">
                                    <div class="me-3" style="text-align: center;">
                                        <form action="{{ route('user.destroy', $user->id) }}" method="post">
                                            @csrf
                                            <button class="btn btn-danger" onClick="return confirm('Yakin mau dihapus?')">
                                                Hapus
                                            </button>
                                        </form>
                                    </div>
                                    <div>
                                        <a class="btn btn-warning" href="{{ route('user.edit', $user->id) }}">Edit</a>
                                    </div>
                                    
                                </td>
                            </tr>
                        @endforeach
                </tbody>
            </table>
            </div>
        </body> 
    </html>
@endif
@endsection