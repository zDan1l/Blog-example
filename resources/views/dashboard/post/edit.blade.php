@extends('dashboard.layouts.main')


@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
    <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h1>Edit New Post</h1>
    </div>
    <div class="col-md-7">
        <form action="/dashboard/post/{{ $post->slug }}" method="post" class="mb-5" enctype="multipart/form-data">
            @method('put')
            @csrf
            <div class="form-input my-3">
                <label for="title" class="mb-2 font-bold">Title</label>
                <input type="text" class="input form-control @error('title') is-invalid
                @enderror" name="title" id="title" placeholder="Title" value="{{ old('title', $post->title) }}">
                @error('title')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
                
            </div>
            <div class="form-input my-3">
                <label for="slug" class="mb-2 font-bold">Slug</label>
                <input type="text" class="input form-control" name="slug" id="slug" placeholder="Slug" readonly value="{{ old('slug', $post->slug) }}">
            </div>
            <div class="form-input my-3">
                <label for="category" class="mb-2 font-bold">Category</label>
                <select name="category_id" class="form-control" id="category">
                    @foreach ($categories as $category)
                        @if (old('category_id', $post->category_id ) == $category->id)
                            <option  value="{{ $category->id }}" selected>{{ $category->name }}</option>
                        @else
                            <option  value="{{ $category->id }}">{{ $category->name }}</option>
                        @endif
                    @endforeach
                </select>
            </div>
            <div class="form-input my-3">
                <label for="image" class="mb-2 ">Thumbnail</label>
                <input type="hidden" name="oldImage" value="{{ $post->image }}">
                @if ($post->image)
                    <img src="{{ asset('storage/'. $post->image) }}" class="img-preview img-fluid mb-3 col-sm-10 mt-2 d-block">
                @else
                    <img class="img-preview img-fluid mb-3 col-sm-10 mt-2">
                @endif
                <input type="file" class="input form-control" name="image" id="image" @error('image') is-invalid
                @enderror placeholder="name" onchange="previewImage()">
                @error('image')
                    <div class="invalid-feedback">
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-input my-3">
                <label for="body" class="mb-2 font-bold">Body</label>
                @error('body')
                    <p class="text-danger text-sm">{{ $message }}</p>
                @enderror
                <input type="hidden" id="x" name="body" value="{{ old('body', $post->body) }}">
                <trix-editor input="x"></trix-editor>
            </div>
            <div class="form-input my-3">
                <button type="submit" class="btn btn-primary py-2 mt-3">Update Post</button>
            </div>
        </form>
    </div>

<script>
    const title = document.querySelector('#title');
    const slug = document.querySelector('#slug');

    title.addEventListener('change', function() {
        fetch('/dashboard/post/checkSlug?title=' + title.value)
        .then(response => response.json())
        .then(data => slug.value = data.slug)
    });
    document.addEventListener('trix-file-accept', function(e){
        e.preventDefault();
    })

    function previewImage() {
        const image = document.querySelector('#image');
        const imgPreview = document.querySelector('.img-preview');
        imgPreview.style.display = 'block';

        const oFReader = new FileReader();
        oFReader.readAsDataURL(image.files[0])

        oFReader.onload = function(oFREvent){
            imgPreview.src = oFREvent.target.result;
        }

        // const blop = URL.createObjectURL(image.files[0]);
        // imgPreview.src = blop;
    }
</script>    
</main>


@endsection