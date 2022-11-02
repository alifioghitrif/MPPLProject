@extends('layouts/main')
@section('container')
@php
//     foreach($wargadesa as $warga){
//         print_r($warga);
//         echo('\n');
// }
@endphp

<div class="main-content">
    <main>
        <h3>
            Data Penduduk Desa Temboro
        </h3>
        <table class="table">
        <thead>
            <tr>
                <th scope="col">#</th>
                <th scope="col">NIK</th>
                <th scope="col">Nama</th>
                <th scope="col">Nomor KK</th>
                <th scope="col">Jenis Kelamin</th>
                <th scope="col">Status Perkawinan</th>
                <th scope="col">Tanggal lahir</th>
                <th scope="col">Pekerjaan</th>
                <th scope="col">Status dalam Keluarga</th>
                <th scope="col">Nomor Telepon</th>
            </tr>
        </thead>
            <tbody>
            @php
                

                foreach($wargadesa as $warga){
                    echo("<tr>");
                        echo("<td>");
                            echo($warga['WargaID']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['NIK']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Nama']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Nomor_KK']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Jenis_Kelamin']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Status_Perkawinan']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Tanggal_Lahir']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Pekerjaan']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Status_Dalam_Keluarga']);
                            echo("</td>");
                        echo("<td>");
                            echo($warga['Nomor_Telepon']);
                            echo("</td>");   
                    echo("</tr>");
                }
            
            @endphp
            
        </tbody>
        </table>
        {{ $wargadesa->links() }}
    </main>
</div>
@endsection