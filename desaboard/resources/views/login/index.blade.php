@extends('layouts/login')
@section('container')
<div class="main-content">
<main>
  
  @if (session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   
      {{ session('loginError') }}
  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif
<form action="/login" method="post">
  @csrf
  <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">
  <h1 class="h3 mb-3 fw-normal">Please sign in</h1>

  <div class="form-floating">
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('ema') }}">
    <label for="email">Email address</label>
    @error('email') 
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror

  </div>
  <div class="form-floating">
    <input type="password" class="form-control" id="password" placeholder="Password" name="password" required>
    <label for="password">Password</label>
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit">Sign in</button>
  <small><a href="/register"> Register Now</a></small>
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
</form>
</main>
</div>
@endsection
