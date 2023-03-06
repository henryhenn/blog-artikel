@extends('layouts.app')

@section('title')
    Edit Kategori: {{$category->keterangan}}
@endsection

@section('content')
    <div class="col-lg-10 mb-lg-0 mb-4">
        <div class="card z-index-2 h-100">
            <div class="card-header pb-0 pt-3 bg-transparent">
                <div class="d-flex justify-content-between">
                    <h6 class="text-capitalize">Edit Kategori: {{$category->keterangan}}</h6>
                </div>
            </div>
            <div class="card-body p-4">
                <form action="{{route('categories.update', $category)}}" method="post">
                    @csrf
                    @method('put')
                    <div class="mb-3">
                        <input type="text" name="keterangan"
                               value="{{ old('keterangan', $category->keterangan)}}"
                               class="form-control form-control-lg @error('keterangan') is-invalid @enderror"
                               placeholder="Keterangan" aria-label="Email">
                        @error('keterangan')
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
