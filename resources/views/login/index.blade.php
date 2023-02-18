@extends('layouts.main')

@section('container')
    

<div class="row d-flex"></div>
    <div class="col-md-5 mx-auto justify-content-center">
        <div class="text-center">
            <h1 class="font-bold mt-5 mb-1 font-monospace">Sign In</h1>
            <h4 class="font-medium mb-2">Please Sign In</h4>   
            @if(session()->has('success'))
                <div class="alert alert-success alert-dismissible fade-show mx-4" role="alert">
                    {{ session('success') }} 
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
            @if(session()->has('Failed'))
                <div class="alert alert-danger alert-dismissible fade-show mx-4" role="alert">
                    {{ session('Failed') }} 
                    <button class="btn-close" type="button" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            @endif
        </div>
        <div class="card bg-primary mt-3 mx-4">
            <div class="card-title"></div>
            <div class="card-body">
                <form action="/login" method="post" class="text-white">
                @csrf
                    <div class="form-input mt-3">
                        <label for="email" class="my-2 font-semibold" id="email">Email</label>
                        <input type="email" class="form-control" name="email"  placeholder="Email" autocomplete="off" autofocus value="{{ old('email') }}">
                    </div>
                    <div class="form-input mt-3">
                        <label for="password" class="mb-2 font-semibold" id="password">Password</label>
                        <input type="password" class="form-control" name="password"  placeholder="Password" autocomplete="off">
                    </div>
                    <div class="form-input mt-2 ">
                        <p>Have't account ? <span class="font-bold"><a href="/register" class="text-white">Sign Up</a></span> Now</p>
                    </div>
                    <button class="mt-3 mb-3 btn bg-white text-black btn-outline-light d-block" type="submit" style="width:100%;">Sign In</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection 