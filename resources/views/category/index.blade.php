@extends('layouts.app')

@section('title')
    List Kategori
@endsection

@section('content')
    <div class="row mt-4">
        <div class="col-lg-10 mb-lg-0 mb-4">
            <div class="card z-index-2 h-100">
                <div class="card-header pb-0 pt-3 bg-transparent">
                    <div class="d-flex justify-content-between">
                    <h6 class="text-capitalize">List Kategori</h6>
                        <a href="{{route('categories.create')}}" class="btn btn-primary">Tambah Category</a>
                    </div>
                </div>
                <div class="card-body p-4">
                    <x-alert-message />
                    <div class="table-responsive">
                        <table class="table table-primary">
                            <thead>
                            <th>#</th>
                            <th>Kategori</th>
                            <th>Aksi</th>
                            </thead>
                            <tbody>
                            @forelse($categories as $key => $category)
                                <tr>
                                    <td>{{$key+1}}</td>
                                    <td>{{$category->keterangan}}</td>
                                    <td>
                                        <div class="d-flex">
                                            <a href="{{route('categories.edit', $category->id)}}"
                                               class="btn btn-warning btn-sm">Edit</a>

                                            <form action="{{route('categories.destroy', $category)}}" method="post">
                                                @csrf
                                                @method('delete')
                                                <button type="submit" class="btn ms-3 btn-danger btn-sm"
                                                        onclick="return confirm('Apakah Anda Yakin?')">Hapus
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="text-center">Tidak ada data terkini</td>
                                </tr>
                            @endforelse
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
