    
    @extends('layouts.main')

    @section('container')
    <div class="row">
            <h1 class="text-center mb-3">{{ $title }}</h1>
            <div class="col-md-7 mx-auto">
                <form action="/blog" method="get">
                    <div class="input-group mb-3">
                        @if (request('category'))
                            <input type="hidden" name="category" value="{{ request('category') }}" >
                        @endif
                        <input class="form-control py-2" autocomplete="off" placeholder="Search" name="search" type="text" value="{{ request('search') }}" autofocus>
                        <button class="btn btn-primary" type="submit" id="button">Search</button>
                    </div>
                </form>
            </div>
        </div>

        @if ($post->count())
        <div class="container my-4">
            <div class="card mb-3">
                @if ($post[0]->image)
                    <img src="{{ asset('storage/' . $post[0]->image) }}" alt="{{ $post[0]->category->name }}" alt="{{ $post[0]->category->name }}" height="500px">
                @else
                    <img src="https://source.unsplash.com/900x300/?{{ $post[0]->category->name }}" alt="{{ $post[0]->category->name }}" alt="{{ $post[0]->category->name }}" class="card-img-top">
                @endif
            <div class="card-body text-center">
                <a href="/blog/{{ $post[0]->slug }}" class="card-title text-decoration-none text-dark"><h3>{{ $post[0]->title }}</h3></a>
                <small class="text-muted"> <p>Author by : <a href="/blog?author={{ $post[0]->author->username }}" class="text-decoration-none">{{ $post[0]->author->name }}</a> Category <a href="/blog?category={{ $post[0]->category->slug }}" class="text-decoration-none">{{ $post[0]->category->name }}</a> {{ $post[0]->created_at->diffForHumans() }}</p>
                <p class="card-text">{{ $post[0]->excerpt }}</p></small>
                <a href="/blog/{{ $post[0]->slug }}" class="text-decoration-none btn btn-primary mt-3">Read more</a>
            </div>
        </div>
        </div>
        
        
        <div class="container">
            <div class="row">
                @foreach ($post->skip(1) as $blog)
                <div class="col-md-4 my-3">
                    <div class="card" id="label-category">
                        <div>
                            @if ($blog->image)
                                <img src="{{ asset('storage/' . $blog->image) }}" alt="{{ $blog->category->name }}" alt="{{ $blog->category->name }}" class="card-img-top">
                            @else
                                <img src="https://source.unsplash.com/900x300/?{{ $blog->category->name }}" alt="{{ $blog->category->name }}" alt="{{ $blog->category->name }}" class="card-img-top">
                            @endif
                            <div class="card-body">
                            <h3 class="card-title">
                                <small class="text-muted">
                                <a href="/blog/{{ $blog->slug }}" class="text-decoration-none">{{ $blog->title }}</h3></a>
                                <h6>Author by : <a href="/blog?author={{ $blog->author->username }}" class="text-decoration-none">{{ $blog->author->name }}</a> {{ $post[0]->created_at->diffForHumans() }}  </h6></small>
                            <p>{{ $blog->excerpt }}</p>
                            <a href="/blog/{{ $blog->slug }}" class="btn btn-primary text-decoration-none">Read more</a>
                            </div>
                        </div>
                        <div class="position-absolute px-3 py-2 text-center text-white " style="background: rgba(0, 0, 0, 0.716); width:100%;" id="category"><a href="/blog?category={{ $blog->category->slug }}" class="text-decoration-none text-white">{{ $blog->category->name }}</a></div>
                        
                        
                    </div>
                </div>
                @endforeach
                
            </div>
        </div>
        @else
        <p class="text-center fs-4">No post found</p>
        @endif
        <div class="d-flex justify-content-center my-5">
            {{ $post->links() }}
        </div>
        
    @endsection


