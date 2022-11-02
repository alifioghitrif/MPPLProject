@extends('layouts/chart')
@section('container')
    @php
        $tanggallahir = [];
        foreach($wargadesa as $warga) {
            $year = date('Y', strtotime($warga["Tanggal_Lahir"]));
            array_push($tanggallahir, $year);
        }
        sort($tanggallahir);
        // print_r($tanggallahir);
        $counttanggallahir = array_count_values($tanggallahir);
        $uniquetanggallahir = array_unique($tanggallahir); 
    @endphp

<div class="main-content">
    <main>
        <div class="wrapper">
    <canvas id="myChart"></canvas>
   </div>
    </div>
    <script>
        const data = {
            datasets: [{
            label: 'Kelahiran',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: <?php echo json_encode($counttanggallahir, JSON_NUMERIC_CHECK);?>,
            }]
        };
    </script>
    <script src="{{ URL::asset('js/chart_kelahiran.js') }}"></script>
@endsection