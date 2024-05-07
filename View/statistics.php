<?php
include "../Controller/UtilisateurC.php";

$c = new UtilisateurC();
$stats = $c->getStatistics();

$totalUsers = $stats['total'];
$malePercentage = 0;
$femalePercentage = 0;

if (isset($stats['genres']['Male'])) {
    $malePercentage = ($stats['genres']['Male'] / $totalUsers) * 100;
}

if (isset($stats['genres']['Female'])) {
    $femalePercentage = ($stats['genres']['Female'] / $totalUsers) * 100;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Statistics</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>
<body>
    <h1>Statistics</h1>
    <div style="width: 80%; margin: auto;">
        <canvas id="genreChart"></canvas>
    </div>

    <script>
        var ctx = document.getElementById('genreChart').getContext('2d');
        var genreChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Male', 'Female'],
                datasets: [{
                    label: 'Gender Distribution',
                    data: [<?= $malePercentage ?>, <?= $femalePercentage ?>],
                    backgroundColor: [
                        'rgba(54, 162, 235, 0.5)',
                        'rgba(255, 99, 132, 0.5)'
                    ],
                    borderColor: [
                        'rgba(54, 162, 235, 1)',
                        'rgba(255, 99, 132, 1)'
                    ],
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            callback: function(value) {
                                return value + '%';
                            }
                        }
                    }
                }
            }
        });
    </script>
</body>
</html>
