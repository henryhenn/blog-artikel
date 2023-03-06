@extends('layouts.app')

@section('title')
    Detail Artikel: {{$article->judul}}
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-11 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <h6 class="text-capitalize">@yield('title')</h6>
                </div>
                <div class="card-body p-4">
                    <div class="d-flex justify-content-center">
                        <img src="{{asset('storage/' . $article->foto)}}" width="500px" alt="" class="img-fluid">

                    </div>
                    <div class="mt-4">
                        <p>Judul: <b>{{$article->judul}}</b></p>
                        <small>Kategori: {{$article->category->keterangan}}</small>
                        <p class="mt-3">{{$article->isi}}</p>
                    </div>

                </div>
            </div>
            <div class="card mt-3">
                <div class="card-header">
                    <h6>Komentar</h6>
                </div>
                <div class="card-body">
                    @forelse($article->comments as $comment)
                        <p><b>{{$comment->nama}}</b>: {{$comment->isi}}</p>
                    @empty
                        <b>Tidak ada komentar terini</b>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
@endsection
