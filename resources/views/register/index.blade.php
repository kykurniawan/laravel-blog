@extends('layouts.main')

@section('container')
<div class="row justify-content-center">
    <div class="col-lg-4">
        <main class="form-registration">
            <h1 class="h3 mb-3 fw-normal text-center">Register Your Account</h1>
            @if ($errors->any())
            <div class="alert alert-danger">
                <ul class="mb-0">
                    @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
            @endif
            <form action="/register" method="POST">
                @csrf
                <div class="form-floating">
                    <input type="text" class="form-control rounded-top @error('name') is-invalid @enderror" id="name" name="name" placeholder="Name" value="{{old('name')}}">
                    <label for="name">Name</label>
                </div>
                <div class="form-floating">
                    <input type="text" class="form-control @error('username') is-invalid @enderror" id="username" name="username" placeholder="Username" value="{{old('username')}}">
                    <label for="username">Username</label>
                </div>
                <div class="form-floating">
                    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" name="email" placeholder="name@example.com" value="{{old('email')}}">
                    <label for="email">Email address</label>
                </div>
                <div class="form-floating">
                    <input type="password" class="form-control rounded-bottom @error('password') is-invalid @enderror" id="password" name="password" placeholder="Password">
                    <label for="password">Password</label>
                </div>
                <button class="w-100 btn btn-lg btn-primary mt-3" type="submit">Register</button>
            </form>
            <small class="text-center d-block mt-3"><a href="/login">Login here</a></small>
        </main>
    </div>
</div>
@endsection