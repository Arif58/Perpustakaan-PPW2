<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Komentar;
use App\Buku;
use App\Galeri;
use Auth;
use App\Http\Controllers\Middleware\Authenticate;
class KomentarController extends Controller
{
    public function store(Request $request, $id){
        $buku = Buku::find($id);
        $komentar = new Komentar;
        $komentar->user_id = Auth::user()->id;
        $komentar->book_id = $buku->id;
        $komentar->comment = $request->comment;
        $komentar->save();
        return back();

    }
}
