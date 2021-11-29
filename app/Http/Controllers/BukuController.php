<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
//code untuk memanggil model buku yg sudah dibuat
use App\Buku;
use App\Http\Controllers\Middleware\Authenticate;
use Image;
use App\Galeri;
use App\Komentar;
use File;
use Illuminate\Support\Str;

class BukuController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index(){
        $batas = 5;
        $data_buku = Buku::orderBy('id', 'desc')->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $jmlh_data = Buku::all()->count();
        $total_harga = Buku::sum('harga');        
        return view('buku.index', compact('data_buku', 'no', 'jmlh_data', 'total_harga'));
    }

    public function list(){
        $batas = 4;
        $data_buku = Buku::orderBy('id','desc')->paginate($batas);
        return view('buku.list_buku', compact('data_buku'));
    }

    public function create(){
        return view('buku.create');
    }

    public function store(Request $request){
        // $massages = [
        //     'required' => ':attribute harus diisi!',
        //     'max' => ':attribute harus diisi :max karakter!',
        //     'numeric' => ':attribute harus diisi dengan angka!',
        // ];
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
        ]);
        $buku = new Buku;
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->buku_seo = Str::slug($request->judul, '-');
        $foto = $request->foto;
        $buku->suka = 0;
        $namafile = time().'.'.
        $foto->getClientOriginalExtension();

        Image::make($foto)->resize(250,200)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $buku->foto = $namafile;
        $buku->save();
        return redirect('/buku')->with('tambah', 'Data Buku Berhasil di Simpan');
    }

    public function destroy($id) {
        $buku = Buku::find($id);
        $buku->delete();
        return redirect('/buku')->with('hapus', 'Data Buku Berhasil di Hapus');
    }

    public function edit($id) {
        $buku = Buku::find($id);
        return view('buku/edit', compact('buku'));
    }

    public function update(Request $request, $id){
        // $massages = [
        //     'required' => ':attribute harus diisi!',
        //     'max' => ':attribute harus diisi :max karakter!',
        //     'numeric' => ':attribute harus diisi dengan angka!',
        // ];
        $this->validate($request,[
            'judul' => 'required|string',
            'penulis' => 'required|string|max:30',
            'harga' => 'required|numeric',
            'tgl_terbit' => 'required|date',
            'foto'=>'required|image|mimes:jpeg,jpg,png',
            ]);//,$massages);
        $buku = Buku::find($id);
        $buku->judul = $request->judul;
        $buku->penulis = $request->penulis;
        $buku->harga = $request->harga;
        $buku->tgl_terbit = $request->tgl_terbit;
        $buku->buku_seo = Str::slug($request->judul, '-');
        $foto = $request->foto;
        $buku->suka = $request->suka;
        $namafile = time().'.'.
        $foto->getClientOriginalExtension();

        Image::make($foto)->resize(250,200)->save('thumb/'.$namafile);
        $foto->move('images/', $namafile);

        $buku->foto = $namafile;
        $buku->update();

        return redirect('/buku')->with('update', 'Data Buku Berhasil di Perbarui');;
    }

    public function search(Request $request){
        $batas = 5;
        $cari = $request->kata;
        $data_buku = Buku::where('judul', 'like', "%".$cari."%")->orwhere('penulis','like',"%".$cari."%")->paginate($batas);
        $no = $batas * ($data_buku->currentPage() - 1);
        $jmlh_data = Buku::all()->count();
        $total_harga = Buku::sum('harga');        
        return view('buku.search', compact('jmlh_data', 'data_buku','no', 'cari'));
    }

    
    public function galbuku($judul){
        $bukus = Buku::where('buku_seo', $judul)->first();
        $galeris = $bukus->photos()->orderBy('id', 'desc')->paginate(6);
        $komentar = Komentar::where('book_id', $bukus->id)->get();
        return view('detail-buku', compact('bukus', 'galeris', 'komentar'));
    }

    public function likefoto(Request $request, $id){
        $buku = Buku::find($id);
        $buku->increment('suka');
        Return back();
    }

}
