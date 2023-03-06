@extends('layouts.app')

@section('title')
    List Artikel
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-11 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="d-flex justify-content-between">
                        <h6 class="text-capitalize">List Artikel</h6>
                        <a href="{{route('articles.create')}}" class="btn btn-primary">Tambah Artikel</a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <x-alert-message/>
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                            <th>#</th>
                            <th>Foto</th>
                            <th>Kategori</th>
                            <th>Judul</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @forelse($articles as $key => $article)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>
                                        <img src="{{asset('storage/' . $article->foto)}}" alt="Foto" width="300px"
                                             class="img-fluid">
                                    </td>
                                    <td>{{$article->category->keterangan}}</td>
                                    <td>{{$article->judul }}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('articles.show', $article->id)}}"
                                               class="btn btn-primary btn-sm">Detail</a>

                                            <a href="{{route('articles.edit', $article->id)}}"
                                               class="btn mx-3 btn-warning btn-sm">Edit</a>

                                            <form action="{{route('articles.destroy', $article)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="5" class="text-center">Tidak ada data terkini</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>

                        <div class="mt-4">
                            {{$articles->links()}}
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
