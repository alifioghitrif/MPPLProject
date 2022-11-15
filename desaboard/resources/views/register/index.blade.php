@extends('layouts/login')
@section('container')
<div class="main-content">
<main>
<form action="/register" method="post">
  @csrf
  <img class="mb-4" src="../assets/brand/bootstrap-logo.svg" alt="" width="72" height="57">

  <h1 class="h3 mb-3 fw-normal">Registration</h1>

  <div class="form-floating">
    <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="name" name="name" value="{{ old('name') }}">
    <label for="name">Nama</label>
    @error('name') 
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>
  

  <div class="form-floating">
    <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
    <label for="email">Email address</label>
    @error('email') 
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="form-floating">
    <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Password" name="password" >
    <label for="password">Password</label>
    @error('password') 
    <div class="invalid-feedback">
      {{ $message }}
    </div>
    @enderror
  </div>

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me"> Remember me
    </label>
  </div>
  <button class="w-100 btn btn-lg btn-primary" type="submit">Register</button>
  <p class="mt-5 mb-3 text-muted">&copy; 2017–2022</p>
</form>
</main>
</div>
@endsection
