<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <title>Document</title>
</head>
<body>
    @php
        $tanggallahir = [];
        foreach($wargadesa as $warga) {
            array_push($tanggallahir, $warga["Tanggal_Lahir"]);
        }
        print_r($tanggallahir)
    @endphp

    <div>
    <canvas id="myChart"></canvas>
    </div>
</body>
</html>