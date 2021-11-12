<?php

namespace App\Http\Controllers;

use App\Models\Berita;
use Illuminate\Http\Request;

class BeritaController extends Controller
{
    public function index(){
        return view("admin.berita.list",[
            "berita" => Berita::latest()
                            ->where("user_id",\Auth::id())
                            ->get()
        ]);
    }

    public function show(){
        return view("admin.berita.form", [
            "kategori" => \App\Models\Kategori::all()
        ]);
    }

    public function store(Request $request){
        $request->validate([
            "kategori" => "required",
            "judul" => "required|min:50|max:255",
            "isi" => "required|min:100"
        ]);

        Berita::create([
            "user_id" => $request->user()->id,
            "kategori_id" => $request->kategori,
            "judul" => $request->judul,
            "gambar" => $request->file("gambar")->store("berita"),
            "isi" => $request->isi
        ]);

        return redirect()->route("admin.berita.index")
                ->with("info","Berhasil input berita");
    }

    public function edit(Berita $berita){
        return view("admin.berita.form",[
            "kategori" => \App\Models\Kategori::all(),
            "berita" => $berita
        ]);
    }

    public function update(Berita $berita,Request $request){
        $request->validate([
            "kategori" => "required",
            "judul" => "required|min:50|max:255",
            "isi" => "required|min:100"
        ]);

        $berita->update([
            "kategori_id" => $request->kategori,
            "judul" => $request->judul,
            "gambar" => $request->file("gambar")->store("berita"),
            "isi" => $request->isi
        ]);

        return redirect()->route("admin.berita.index")
            ->with("info","Berhasil update berita");
    }

    public function destory(Berita $berita){
        $berita->delete();

        return redirect()->route("admin.berita.index")
                ->with("info","Berhasil hapus berita");
    }

    public function simpanKomentar(Request $request){
        \App\Models\Komentar::create([
            "isi_komentar" => $request->komentar,
            "berita_id" => $request->berita_id,
            "user_id" => $request->user()->id
        ]);

        return redirect()->route('detail.berita',["berita_id" => $request->berita_id]);
    }
}
