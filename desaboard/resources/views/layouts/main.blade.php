<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ $title }}</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{asset('/css/home-stylesheet.css')}}">
    {{-- <link rel="stylesheet" href="{{secure_asset('/css/home-stylesheet.css')}}"> --}}
  </head>

  <body>
    <div class = "sidebar">
        <div class="sidebar-brand">
            <a href="/" ><h2>Desaboard</h2></a>
        </div>

        <div class = "sidebar-menu">
            <ul>
                <span>DEMOGRAFI</span>
                <li>
                    <a href="/kelahiran" class="active"><span>Kelahiran</span></a>
                </li>
                {{-- <li>
                    <a href="/kematian"><span>Kematian</span></a>
                </li>
                <li>
                    <a href="/pertumbuhan"><span>Pertumbuhan</span></a>
                </li> --}}
            </ul>

            <hr class="hr1" size="3" width="70%" color="white" noshade>
            
            <ul>
                <span>BIO</span>
                <li>
                    <a href="/usia"><span>Usia</span></a>
                </li>
                <li>
                    <a href="/jenis-kelamin"><span>Jenis Kelamin</span></a>
                </li>
                <li>
                    <a href="/pekerjaan"><span>Pekerjaan</span></a>
                </li>
                {{-- <li>
                    <a href="/pendidikan"><span>Pendidikan</span></a>
                </li>                 --}}
            </ul>
            @auth
            <hr class="hr1" size="3" width="70%" color="white" noshade>
            <ul>
                <span>DATA</span>
                <li>
                    <a href="/data"><span>Data Penduduk</span></a>
                </li>
                <li>
                    <a href="/tambah-data"><span>Tambahkan Data Penduduk</span></a>
                </li>                
            </ul>
            @endauth

            <ul class="profile">
                <img src="{{asset('/images/healthicons_ui-user-profile-outline.png')}}" width="30px" height="30px"><span></span>
                {{-- <a href="/login"><img src="{{secure_asset('/images/healthicons_ui-user-profile-outline.png')}}" width="30px" height="30px"> --}}
                @auth
                <form action="/logout" method="post" class="inl">
                @csrf
                <button type="submit" class=dropdown-item><span>logout</span></button>
                </form>
                @endauth
                @guest
                <a href="/login" class="inl">Login</a>
                @endguest
            </ul>
        </div>
    </div>
    @yield('container')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>