@extends('layouts.app')

@section('content')
<div class="container">
    <h1>{{ $berita->judul }}</h1>
    <p><span class="text-danger">{{ $berita->kategori->nama_kategori }}</span> - {{ $berita->created_at }}</p>
    {{-- <img src="https://picsum.photos/id/{{ $berita->id }}/800/400" alt="" class="w-100"> --}}
    <img src="{{ Storage::url($berita->gambar) }}" alt=""  class="w-100">
    <p class="mt-4">
        {{ $berita->isi }}
    </p>

    <h2>{{ $berita->komentar->count() }} Komentar</h2>
    <hr>
    @auth
    <form action="{{ route("simpan.komentar") }}" method="POST" autocomplete="off">
        @csrf
        <input type="hidden" name="berita_id" value="{{ $berita->id }}">
        <div class="form-group">
            <input type="text" name="komentar" class="form-control" placeholder="Ketikkan komentar anda">
        </div>
        <div class="form-group d-flex flex-row-reverse">
            <input type="submit" value="Kirim Komentar" class="btn btn-success">
        </div>
    </form>
    @endauth
    <ul class="list-unstyled">
        @foreach ($berita->komentar as $item)
        <li class="media">
            <div class="media-body">
                <h5 class="mt-0 mb-1">{{ $item->user->name }}</h5>
                <span class="text-muted">{{ $item->created_at }}</span>
                <p>{{ $item->isi_komentar }}</p>
            </div>
        </li>
        @endforeach
    </ul>
</div>
@endsection
