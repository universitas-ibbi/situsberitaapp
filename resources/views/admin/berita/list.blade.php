@extends('layouts.app')

@section('content')
    <div class="container">
        @if (session("info"))
            <div class="alert alert-success">
                {{ session("info") }}
            </div>
        @endif
        <h1>List Berita</h1>
        <hr>
        <div class="d-flex flex-row-reverse mb-3">
            <a href="{{ route("admin.berita.form") }}" class="btn btn-success">Tambah</a>
        </div>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <td width="10%">No.</td>
                    <td>Judul</td>
                    <td colspan=2 width="10%">Action</td>
                </tr>
            </thead>
            <tbody>
            @foreach ($berita as $item)
                <tr>
                    <td>{{ $loop->iteration }}.</td>
                    <td><a href="{{ route("detail.berita",["berita_id" => $item->id]) }}">{{ $item->judul }}</a></td>
                    <td><a href="{{ route("admin.berita.edit",$item) }}" class="btn btn-warning btn-block">Rubah</a></td>
                    <td><a href="{{ route("admin.berita.destroy",$item) }}" class="btn btn-danger btn-block">Hapus</a></td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
