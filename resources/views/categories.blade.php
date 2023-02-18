    
    @extends('layouts.main')

    @section('container')
        <h1>{{ $title }}</h1>
        
        <div class="row my-3 justify-content-center">
            @foreach ($categories as $category)
                <div class="card p-3 col-md-5 m-3">
                    <img src="https://source.unsplash.com/800x500/?{{ $category->name }}" alt="{{ $category->name }}" class="card-img-top">
                    <div class="card-body">
                        <h3 class="card-title text-center">
                            <a href="/blog?category={{ $category->slug }}" class="text-decoration-none">{{ $category->name }}</h3></a>
                    </div>
                </div>
            @endforeach
        </div>
            {{-- <a href="/blog/{{ $blog->slug }}">Back to Post</a> --}}
    @endsection



 