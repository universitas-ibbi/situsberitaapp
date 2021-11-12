@extends('layouts.app')

@section('content')
    <div class="container">
        <form action="{{ isset($kategori)?route("kategori.update",$kategori):route("kategori.store") }}" method="post">
            @isset($kategori)
                @method("PUT")
            @endisset
            @csrf
            <div class="form-group">
                <label for="">Nama Kategori</label>
                <input type="text" class="form-control" name="nama_kategori"
                    value="{{ isset($kategori)?$kategori->nama_kategori:"" }}">
            </div>
            <div class="form-group">
                <input type="submit" value="Simpan" class="btn btn-success">
            </div>
        </form>
    </div>
@endsection
