@extends('dashboard.layouts.main')


@section('container')
<main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
  <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
    <h1 class="h2">Category</h1>
    @if(session()->has('success'))
      <div class="alert alert-success alert-dismissible fade-show mx-4" role="alert">
          {{ session('success') }} 
          <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
      </div><li class="nav-item">
          <a class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}" aria-current="page" href="/dashboard">
            <span data-feather="home" class="align-text-bottom "></span>
            Categories
          </a>
        </li>
    @endif
  </div>
  <a href="/dashboard/categories" class="btn btn-primary mb-2">Create New Categories</a>
  <div class="table-responsive col-md-9">
    <table class="table table-striped table-sm">
      <thead>
        <tr>
          <th scope="col">No</th>
          <th scope="col">Category Name</th>
          <th scope="col">Action</th>
        </tr>
      </thead>
      <tbody>
        @foreach ($categories as $category)
            <tr>
            <th scope="col">{{ $loop->iteration }}</th>
            <th scope="col">{{ $category->name }}</th>
            <th scope="col">
                <a href="/dashboard/categries/{{ $category->slug }}" class="bg-info badge"><span data-feather="eye"></span></a>
                <a href="/dashboard/categries/{{ $category->slug }}/edit" class="bg-warning badge"><span data-feather="edit"></span></a>
                <form action="/dashboard/categries/{{ $category->slug }}" method="post" class="d-inline">
                  @method('delete')
                  @csrf
                  <button class="badge bg-danger border-0" id="btn-delete" onclick=" return confirm('Yakin Bos?')"><span data-feather="x-circle"></span></button>
                </form>
            </th>
        </tr>
        @endforeach
      </tbody>
    </table>
  </div>
</main>

@endsection