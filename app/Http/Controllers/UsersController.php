<?php

namespace App\Http\Controllers;
use App\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Middleware\Authenticate;
use App\Http\Controllers\Middleware\admin;
class UsersController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('admin');
    }

    public function index(){
        $data_user = User::all();

        return view('users.user', compact('data_user'));
    }

    public function create(){
        return view('users.user_create');
    }

    public function store(Request $request){
        $this->validate($request,[
            'name' => 'required|string',
            'email' => 'required|string',
            'password' => 'required|string',
            'level' => 'required|string',
        ]);
        $user = new User;
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->save();
        return redirect('/users')->with('tambah', 'Data User Berhasil di Simpan');

    }

    public function destroy($id) {
        $user = User::find($id);
        $user->delete();
        return redirect('/users')->with('hapus', 'Data User Berhasil di Hapus');
    }

    public function edit($id) {
        $user = User::find($id);
        return view('users.edit', compact('user'));
    }

    public function update(Request $request, $id){
        $user = User::find($id);
        $user->name = $request->name;
        $user->email = $request->email;
        $user->password = bcrypt($request->password);
        $user->level = $request->level;
        $user->update();
        return redirect('/users')->with('update', 'Data User Berhasil diperbarui');
    }
}
