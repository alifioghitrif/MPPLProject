@extends('layouts/chart')
@section('container')
@php
    $usia = [];

        $tanggallahir = [];
        foreach($wargadesa as $warga) {
            $year = date('Y', strtotime($warga["Tanggal_Lahir"]));
            array_push($tanggallahir, $year);
        }
        sort($tanggallahir);
        // print_r($tanggallahir);
        $counttanggallahir = array_values(array_count_values($tanggallahir));
        $uniquetanggallahir_old = array_values(array_unique($tanggallahir)); 
    
        $today = date('y');
        $uniquetanggallahir = [];
        foreach ($uniquetanggallahir_old as $tanggal) {
            $temp = $today - $tanggal + 2000;
            array_push($uniquetanggallahir, $temp);
        }
        // echo($today);
        // print_r($uniquetanggallahir);



@endphp

<div class="main-content">
    <main>
    <div class="wrapper">
    <canvas id="myChart"></canvas>
   </div>
    </div>
    <script>
        
        const data = {
            labels : <?php echo json_encode($uniquetanggallahir, JSON_NUMERIC_CHECK);?>,
            datasets: [{
            label: 'Usia',
            data: <?php echo json_encode($counttanggallahir, JSON_NUMERIC_CHECK);?>,
            backgroundColor: ['blue'],
            borderWidth: 1,
            }]
        };
        const config = {
            type: 'bar',
            data: data,
            options: {
                scales: {
                y: {
                    beginAtZero: true
                }
                }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
            );
    </script>
@endsection