@extends('layouts.app')

@section('content')
<div class="container">
    @if (session("info"))
        <div class="alert alert-success">
            {{ session("info") }}
        </div>
    @endif
    <h1>List Kategori</h1>
    <hr>
    <div class="d-flex flex-row-reverse">
        <a href="{{ route("kategori.create") }}" class="btn btn-success mb-2">Tambah</a>
    </div>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th width="10%">No.</th>
                <th>Nama Kategori</th>
                <th colspan="2" width="10%">Action</th>
            </tr>
        </thead>
        <tbody>
        @foreach ($kategori as $item)
        <tr>
            <td>{{ $loop->iteration }}</td>
            <td>{{ $item->nama_kategori }}</td>
            <td><a href="{{ route("kategori.edit",$item) }}" class="btn btn-block btn-warning">Rubah</a></td>
            <td>
                <a href="" class="btn btn-block btn-danger"
                    onclick="event.preventDefault();
                    document.getElementById('delete-form-{{ $item->id }}').submit();">Hapus</a>
                <form method="POST" id="delete-form-{{ $item->id }}" action="{{ route("kategori.destroy",$item) }}">
                    @method("DELETE")
                    @csrf
                </form>
            </td>
        </tr>
        @endforeach
        </tbody>
    </table>
</div>
@endsection
