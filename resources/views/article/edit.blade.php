@extends('layouts.app')

@section('title')
    Edit Artikel: {{$article->judul}}
@endsection

@section('content')
    <div class="col-lg-10 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <div class="d-flex justify-content-between">
                    <h6 class="text-capitalize">Edit Artikel: {{$article->judul}}</h6>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{route('articles.update', $article)}}" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <select name="category_id" id="category_id"
                                class="form-select form-select-lg @error('category_id') is-invalid @enderror">
                            <option value="">-- PILIH KATEGORI --</option>
                            @foreach($categories as $category)
                                <option
                                    value="{{$category->id}}" @selected($category->id == $article->category_id)>{{$category->keterangan}}</option>
                            @endforeach
                        </select>
                        @error('category_id')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="text" name="judul" id="judul" placeholder="Judul Artikel"
                               value="{{old('judul', $article->judul)}}"
                               class="form-control form-control-lg @error('judul') is-invalid @enderror">
                        @error('judul')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="isi">Isi Artikel</label>
                        <textarea name="isi" id="isi" rows="10"
                                  class="form-control form-control-lg @error('isi') is-invalid @enderror">
                            {{old('isi', $article->isi)}}
                        </textarea>
                        @error('isi')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <input type="file" name="foto" id="foto" placeholder="Judul Artikel"
                               class="form-control form-control-lg @error('foto') is-invalid @enderror">
                        @error('foto')
                        <div class="invalid-feedback">{{$message}}</div>
                        @enderror
                    </div>
                    <div class="text-center">
                        <button type="submit" class="btn btn-lg btn-primary btn-lg w-100 mt-4 mb-0">Submit
                        </button>
                    </div>
                </form>
            </div>
        </div>
    </div>
@endsection
