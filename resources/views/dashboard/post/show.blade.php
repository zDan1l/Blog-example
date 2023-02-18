@extends('dashboard.layouts.main')


@section('container')


<div class="container">
    <div class="row my-3 ml-5 justify-content-center">
        <div class="col-lg-8">
            <h3 class="card-title my-2">{{ $blog->title }}</h3>
            
            <a href="/dashboard/post" class="btn btn-success">Back To All Post</a>
            <a href="/dashboard/post/{{ $blog->slug }}/edit" class="btn btn-warning"><span data-feather="edit"></span> Edit</a>
            <form action="/dashboard/post/{{ $blog->slug }}" method="post" class="d-inline">
                @method('delete')
                @csrf
                <button class="btn btn-danger border-0" id="btn-delete" onclick=" return confirm('Yakin Bos?')"><span data-feather="x-circle"></span> Delete</button>
              </form>

            <h5 class="my-3">Category <a href="/blog?category={{ $blog->category->slug }}" class="text-decoration-none">{{ $blog->category->name }}</a> </h5>
            @if ($blog->image)
                 <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->category->name }}" alt="{{ $blog->category->name }}" width="900px" height="350px">
            @else
                <img src="https://source.unsplash.com/900x300/?{{ $blog->category->name }}" alt="{{ $blog->category->name }}" alt="{{ $blog->category->name }}">
            @endif
            
            <article class="my-3 fs-5">
                <p>{!! $blog->body !!}</p>
            </article>
            
            <p>
            <a href="/dashboard/post">Back To Blogs</a></div>
            </p>
    </div>
</div>



@endsection