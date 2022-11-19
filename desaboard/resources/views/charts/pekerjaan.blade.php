@extends('layouts/chart')
@section('container')
    @php
    $pekerjaan = [];
    foreach($wargadesa as $warga) {
        array_push($pekerjaan, $warga["Pekerjaan"]);
    }
    // print_r($tanggallahir);
    sort($pekerjaan);
    $countpekerjaan = array_values(array_count_values($pekerjaan));
    $uniquepekerjaan = array_values(array_unique($pekerjaan));
    

@endphp

<div class="main-content">
    <main>
    <div class="wrapper">
    <canvas id="myChart"></canvas>
    </div>
    </div>
    <script>
        
        const data = {
            labels : <?php echo json_encode($uniquepekerjaan, JSON_NUMERIC_CHECK);?>,
            datasets: [{
            label: 'Pekerjaan',
            data: <?php echo json_encode($countpekerjaan, JSON_NUMERIC_CHECK);?>,
            backgroundColor: ['red', 'orange', 'yellow', 'green', 'blue', 'purple'],
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