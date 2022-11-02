@extends('layouts/chart')
@section('container')
    @php
    $pendidikan = [];
    foreach($wargadesa as $warga) {
        array_push($pekerjaan, $warga["Pendidikan"]);
    }
    // print_r($tanggallahir);
    sort($pendidikan);
    $countpendidikan = array_values(array_count_values($pendidikan));
    $uniquependidikan = array_values(array_unique($pendidikan));


@endphp

<div class="main-content">
    <main>
    <div class="wrapper">
    <canvas id="myChart"></canvas>
    </div>
    </div>
    <script>
        
        const data = {
            labels : <?php echo json_encode($uniquependidikan, JSON_NUMERIC_CHECK);?>,
            datasets: [{
            label: 'Pekerjaan',
            data: <?php echo json_encode($countpendidikan, JSON_NUMERIC_CHECK);?>,
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