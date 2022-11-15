@extends('layouts/main')
@section('container')
    <div class="main-content">
        <main>
            <div class="wrapper">
                <section id="home">
                    <div class="kolom">
                        <h2>Selamat Datang di DesaBoard</h2>
                        {{-- <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Iusto totam vero quis! Nobis impedit molestias blanditiis ea consequuntur ratione quia.</p> --}}
                        @auth
                        <p>Selamat datang kembali {{ auth()->user()->name }}</p>
                        @endauth
                    </div>
                    <img src="{{URL::asset('/images/welcome-pict.png')}}">
                </section>
            </div>
        </main>
    </div>
@endsection

