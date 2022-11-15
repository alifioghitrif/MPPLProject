@extends('layouts/chart')
@section('container')
    @php
        $JK = [];
        foreach($wargadesa as $warga) {
            array_push($JK, $warga["Jenis_Kelamin"]);
        }
        // print_r($tanggallahir);
        $countJK = array_values(array_count_values($JK));
        $uniqueJK = array_unique($JK);
    @endphp

<div class="main-content">
    <main>
    <div>
    <canvas id="myChart" width="850" height="850" class="JK-canvas"></canvas>
    </div>

    <script>
        
        const data = {
            labels : <?php echo json_encode($uniqueJK, JSON_NUMERIC_CHECK);?>,
            datasets: [{
            label: 'Jenis Kelamin',
            data: <?php echo json_encode($countJK, JSON_NUMERIC_CHECK);?>,
            backgroundColor: ['pink', 'blue'],
            }]
        };
        const config = {
            type: 'pie',
            data: data,
            options: {
            responsive: true,
            plugins: {
                legend: {
                position: 'top',
                },
                title: {
                display: true,
                text: 'Jenis Kelamin'
                }
            }
            },
        };

        const myChart = new Chart(
            document.getElementById('myChart'),
            config
            );
    </script>

</div>
@endsection