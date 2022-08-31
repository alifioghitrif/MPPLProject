<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php include 'coba.php';?>
    <script>
        var hasil = <?php echo $dataku; ?>;
        // document.write(hasil);
        // document.write(typeof(hasil));
        
        // document.writeln("<div>Rizal</div>");
        // document.writeln(hasil);
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.9.1/chart.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <div>
        <canvas id="myChart"></canvas>
    </div>
    <script>
        const labels = [
            'January',
            'February',
            'March',
            'April',
            'May',
            'June',
        ];
        const data = {
            labels: labels,
            datasets: [{
            label: 'My First dataset',
            backgroundColor: 'rgb(255, 99, 132)',
            borderColor: 'rgb(255, 99, 132)',
            data: hasil,
            }]
        };

        const config = {
            type: 'line',
            data: data,
            options: {}
        };
</script>

<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

</body>
</html>
