@extends('layouts.frontend')

@section('title')
    {{$article->judul}}
@endsection

@section('content')
    <section class="single-post-content">
        <div class="container">
            <div class="row">
                <div class="col-md-10 post-content" data-aos="fade-up">

                    <!-- ======= Single Post Content ======= -->
                    <div class="single-post">
                        <div class="post-meta"><span class="date">{{$article->category->keterangan}}</span> <span
                                class="mx-1">&bullet;</span> <span>Jul 5th '22</span></div>
                        <h1 class="mb-5">{{$article->judul}}</h1>
                        <figure class="my-4 d-flex justify-content-center">
                            <img src="{{asset('storage/' . $article->foto)}}" width="500px" alt="" class="img-fluid">
                        </figure>
                        <p>{{$article->isi}}</p>

                    </div><!-- End Single Post Content -->

                    <!-- ======= Comments ======= -->
                    <div class="comments">
                        <h5 class="comment-title py-4">{{count($article->comments)}} Comments</h5>
                        @forelse($article->comments as $comment)
                            <div class="comment d-flex mb-4">
                                <div class="flex-grow-1 ms-2 ms-sm-3">
                                    <div class="comment-meta d-flex align-items-baseline">
                                        <h6 class="me-2">{{$comment->nama}}</h6>
                                        <span class="text-muted">2d</span>
                                    </div>
                                    <div class="comment-body">
                                        {{$comment->isi}}
                                    </div>
                                </div>
                            </div>
                        @empty
                            <h6>Tidak ada komentar terbaru</h6>
                        @endforelse
                    </div><!-- End Comments -->

                    <!-- ======= Comments Form ======= -->
                    <div class="row justify-content-center mt-5" id="comment">

                        <div class="col-lg-12">
                            <x-alert-message />

                            <h5 class="comment-title">Leave a Comment</h5>
                            <div class="row">
                                <form action="{{route('comment.store')}}" method="post">
                                    @csrf
                                    <input type="hidden" name="article_id" value="{{$article->id}}">
                                    <div class="col-12 mb-3">
                                        <label for="comment-name">Name</label>
                                        <input type="text" class="form-control @error('nama') is-invalid @enderror"
                                               id="comment-name" name="nama"
                                               value="{{old('nama')}}"
                                               placeholder="Enter your name">
                                        @error('nama')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12 mb-3">
                                        <label for="comment-message">Message</label>

                                        <textarea class="form-control @error('isi') is-invalid @enderror" name="isi" id="comment-message"
                                                  placeholder="Enter your name"
                                                  cols="30" rows="10">{{old('isi')}}</textarea>
                                        @error('isi')
                                        <div class="invalid-feedback">{{$message}}</div>
                                        @enderror
                                    </div>
                                    <div class="col-12">
                                        <button type="submit" class="btn btn-primary" value="Post comment">Post
                                            Comment
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div><!-- End Comments Form -->

                </div>
            </div>
        </div>
    </section>
@endsection
