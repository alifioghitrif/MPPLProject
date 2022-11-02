<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Desaboard | Infographic</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-Zenh87qX5JnK2Jl0vWa8Ck2rdkQ2Bzep5IDxbcnCeuOxjzrPF/et3URy9Bv1WTRi" crossorigin="anonymous">
    <link rel="stylesheet" href="https://maxst.icons8.com/vue-static/landings/line-awesome/line-awesome/1.3.0/css/line-awesome.min.css">
    <link rel="stylesheet" href="{{URL::asset('/css/home-stylesheet.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
  </head>

  <body>
    <div class = "sidebar">
        <div class="sidebar-brand">
            <a href="/"class="active"><h2>Desaboard</h2></a>
        </div>

        <div class = "sidebar-menu">
            <ul>
                <span>DEMOGRAFI</span>
                <li>
                    <a href="/kelahiran" class="active"><span>Kelahiran</span></a>
                </li>
                <li>
                    <a href="/kematian"><span>Kematian</span></a>
                </li>
                <li>
                    <a href="/pertumbuhan"><span>Pertumbuhan</span></a>
                </li>
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
                <li>
                    <a href="/pendidikan"><span>Pendidikan</span></a>
                </li>                
            </ul>

            <ul class="profile">
                <a href="/"><img src="{{URL::asset('/images/healthicons_ui-user-profile-outline.png')}}" width="30px" height="30px">
                <span>Profile Info</span></a>
            </ul>
        </div>
    </div>
    @yield('container')

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-OERcA2EqjJCMA+/3y+gxIOqMEjwtxJY7qPCqsdltbNJuaOe923+mo//f6V8Qbsw3" crossorigin="anonymous"></script>
</body>
</html>