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
    <style>
        body {
            text-align: center;
        }

        .stats-container {
            display: flex;
            justify-content: space-around;
            margin-top: 20px;
        }
        
        .stats-circle {
            width: 150px;
            height: 150px;
            border-radius: 50%;
            text-align: center;
            line-height: 150px;
            font-size: 24px;
            font-weight: bold;
            position: relative;
        }

        .stats-male {
            background-color: lightblue;
        }

        .stats-female {
            background-color: lightpink;
        }

        .stats-label {
            position: absolute;
            bottom: -20px;
            width: 100%;
            font-size: 16px;
            font-weight: normal;
        }
    </style>
</head>
<body>
    <h1>Statistics</h1>
    <div class="stats-container">
        <div class="stats-circle stats-male"><?= number_format($malePercentage, 2) ?>%</div>
        <div class="stats-label">Male</div>
        <div class="stats-circle stats-female"><?= number_format($femalePercentage, 2) ?>%</div>
        <div class="stats-label">Female</div>
    </div>
</body>
</html>
