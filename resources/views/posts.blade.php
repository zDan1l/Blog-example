@extends('layouts.main')


@section('container')
<div class="container">
    <div class="row mt-5 flex justify-content-center">
        <div class="col-md-9">
            <h3 class="card-title my-2">{{ $blog->title }}</h3>
            <p class="my-3">Author by : <a href="/blog?author={{ $blog->author->username }}" class="text-decoration-none"> {{ $blog->author->name }}</a> Category <a href="/blog?category={{ $blog->category->slug }}" class="text-decoration-none">{{ $blog->category->name }}</a> </p>
            @if ($blog->image)
                 <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->category->name }}" alt="{{ $blog->category->name }}" width="900px" height="350px">
            @else
                <img src="https://source.unsplash.com/900x300/?{{ $blog->category->name }}" alt="{{ $blog->category->name }}" alt="{{ $blog->category->name }}">
            @endif
            <article class="my-3 fs-5">
                <p>{!! $blog->body !!}</p>
            </article>
            
            <p>
            <a href="/blog">Back To Blogs</a></div>
            </p>
    </div>
</div>
            
@endsection


