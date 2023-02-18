@extends('layouts.main')

@section('container')
    

<div class="row d-flex mb-5"></div>
    <div class="col-md-6 mx-auto justify-content-center">
        <div class="text-center">
            <h1 class="font-bold mt-5 mb-1 font-monospace">{{ $title }}</h1>
            <h4 class="font-medium mb-4">Please {{ $title }}</h4>
            @if ($errors->any())
                @foreach ($errors->all() as $error)
                    <div class="row justify-content-center">
                        <div class="alert alert-danger py-1 text-start">
                                <ul>
                                    <li>{{ $error }}</li>
                                </ul>
                        </div>
                    </div>
               @endforeach
            @endif
        </div>
        <div class="card bg-primary mt-3 mx-4 mb-5">
            <div class="card-title"></div>
            <div class="card-body">
                <form action="" method="post" class="text-white">
                    @csrf
                    <div class="form-input mt-3">
                        <label for="name" class="my-2 font-semibold">Name</label>
                        <input type="text" class="form-control" name="name" id="name" placeholder="name" autocomplete="off" autofocus @error('name') is-invalid @enderror value="{{ old('name') }}">
                        {{-- @error('name')
                        @enderror --}}
                    </div>
                    <div class="form-input mt-3">
                        <label for="email" class="my-2 font-semibold">Email</label>
                        <input type="email" class="form-control"name="email" id="email" placeholder="email" autocomplete="off" autofocus value="{{ old('email') }}">
                    </div>
                    <div class="form-input mt-3">
                        <label for="username" class="my-2 font-semibold">Username</label>
                        <input type="text" class="form-control" name="username" id="username" placeholder="Username" autocomplete="off" autofocus value="{{ old('username') }}">
                    </div>
                    <div class="form-input mt-3">
                        <label for="password" class="mb-2 font-semibold">Password</label>
                        <input type="password" class="form-control" name="password" id="password" placeholder="Password" autocomplete="">
                    </div>
                    <div class="form-input mt-2 ">
                        <p>Have account ? <span class="font-bold"><a href="/login" class="text-white">Sign In</a></span> Now</p>
                    </div>
                    <button class="mt-3 mb-3 btn bg-white text-black btn-outline-light d-block" type="submit" style="width:100%;">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 