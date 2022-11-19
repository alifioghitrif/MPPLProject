@extends('layouts/main')
@section('container')
    <div class="main-content">
        <main>
            <div class="wrapper">
                <section id="home">
                    <div class="kolom">
                        <h2>Selamat Datang di DesaBoard</h2>
                        @auth
                        <h4>Selamat datang kembali <b>{{ auth()->user()->name }}</b></h4>
                        @endauth
                        <p>Desaboard adalah aplikasi website yang memiliki sistem untuk menampilkan data penduduk agar aparat desa bisa menyusun strategi untuk melayani masyarakat dengan benar dan tepat sasaran.</p>
                        <p>Aplikasi ini dilengkapi fitur untuk menampilkan data penduduk desa sehingga mampu memberikan informasi yang sangat berguna untuk pengguna khususnya para aparat desa sebagai pengambil keputusan dan penentu strategi serta bagi masyarakat agar ada transparansi data di pemerintah.</p>
                        
                    </div>
                    <img src="{{URL::asset('/images/welcome-pict.png')}}">
                </section>
            </div>
        </main>
    </div>
@endsection

