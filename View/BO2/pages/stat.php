<?php

require_once '../../../config.php';

function generateStatsByNbrE() {
    try {
        // Se connecter à la base de données
        $conn = config::getConnexion();
        
        // Préparer et exécuter la requête SQL pour récupérer les statistiques
        $query = $conn->prepare("SELECT nomCours, AVG(satisfaction) as avg_satisfaction FROM evalformation GROUP BY nomCours");
        $query->execute();        
        // Récupérer les résultats sous forme de tableau associatif
        $stats = $query->fetchAll(PDO::FETCH_ASSOC);
        
        // Retourner les statistiques
        return $stats;
    } catch (PDOException $e) {
        // En cas d'erreur, afficher un message d'erreur
        echo 'Connection failed: ' . $e->getMessage();
        return false;
    }
}

// Exemple d'utilisation de la fonction pour générer les statistiques
$stats = generateStatsByNbrE();

// Convertir les données PHP en format JavaScript pour Chart.js
$labels = []; // Will hold labels for each data point (nomCours)
$data = []; // Will hold the data points (average satisfaction)
foreach ($stats as $stat) {
    // Add nomCours to labels array
    $labels[] = $stat['nomCours'];
    
    // Add average satisfaction to data array
    $data[] = $stat['avg_satisfaction'];
}

// Convert PHP arrays to JSON for JavaScript consumption
$labels = json_encode($labels);
$data = json_encode($data);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistiques</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        canvas {
            width: 90%; /* Adjust the width as needed */
            height: 500px; /* Adjust the height as needed */
            max-width: 1000px; /* Adjust the max-width as needed */
            margin: 20px auto;
            display: block;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
    </style>
</head>
<body>
    <canvas id="myChart"></canvas>

    <script>
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: <?php echo $labels; ?>,
                datasets: [{
                    label: 'Satisfaction moyenne par cours',
                    data: <?php echo $data; ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true,
                        suggestedMax: 5 // Assuming satisfaction is on a scale of 1-5
                    }
                }
            }
        });
    </script>
</body>
</html>