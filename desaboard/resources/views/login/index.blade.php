{{-- <div class="main-content">
<main>
  
  @if (session()->has('loginError'))
  <div class="alert alert-danger alert-dismissible fade show" role="alert">
   
      {{ session('loginError') }}
  
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
      <span aria-hidden="true">&times;</span>
    </button>
  </div>
  @endif

  @if (session()->has('success'))
  <div class="alert alert-success alert-dismissible fade show" role="alert">
   
      {{ session('success') }}
  
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
</div> --}}

@extends('layouts/login')
@section('container')
<body>
   <div class="container">
   
       <div class="login">
        @if (session()->has('loginError'))
        <div class="alert alert-danger" role="alert">
         
            {{ session('loginError') }}
        @endif
      
        @if (session()->has('success'))
        <div class="alert alert-success" role="alert"> 
            {{ session('success') }}
        </div>
        @endif
           <form method="post" action="/login">
            @csrf
               <h1>Masuk</h1>
               <hr>
               <label for="email">Email</label>
               <input type="email" class="form-control @error('email') is-invalid @enderror" id="email" placeholder="name@example.com" name="email" autofocus required value="{{ old('ema') }}">
               @error('email') 
                <div class="invalid-feedback">
                  {{ $message }}
                </div>
                @enderror
               <label for="">Kata Sandi</label>
               <input type="password" class="form-control" id="password" placeholder="Masukan Kata Sandi" name="password" required>
               <button type="submit"> Masuk</button>
               <p>
                   <label for="">Belum Punya Akun? <a href="/register">Daftar Di Sini</a></label>
               </p>
           </form>
       </div>
       <div class="right">
           <img src="{{ asset('images/bro.png') }}" alt="">
       </div>
   </div>
</body>
@endsection

