@extends('layouts/login')
@section('container')
{{-- <div class="main-content">
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
</div> --}}
<body>
  <div class="container">
      <div class="login">
          <form method="post" action="/register">
            @csrf
              <h1>Daftar</h1>
              <hr>
              <label for="name">Nama Pengguna</label>
              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" placeholder="Nama Pengguna" name="name" value="{{ old('name') }}">
              @error('name') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              <label for="email">Email address</label>
              <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" value="{{ old('email') }}">
              @error('email') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              <label for="password">Kata Sandi</label>
              <input type="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="Kata Sandi" name="password" >
              @error('password') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror

              <label for="">Konfirmasi Kata Sandi</label>
              <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" id="password_confirmation" placeholder="Kata Sandi" name="password_confirmation" >
              @error('password_confirmation') 
              <div class="invalid-feedback">
                {{ $message }}
              </div>
              @enderror
              <button type="submit"> Daftar</button>
          </form>
      </div>
      <div class="right">
          <img src="{{ asset('images/bro.png') }}" alt="">
      </div>
  </div>
</body>

@endsection
