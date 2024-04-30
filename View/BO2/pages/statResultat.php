<?php
    require_once '../../../config.php';

    function generateStatsByNoteExam() {
        try {
            $conn = config::getConnexion();
            $query = $conn->prepare("SELECT COUNT(*) AS count_students FROM resultat WHERE noteExamen > 10");
            $query->execute();
            $stats = $query->fetch(PDO::FETCH_ASSOC);
            return $stats['count_students'];
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }
    
    function generateStatsByNoteCC() {
        try {
            $conn = config::getConnexion();
            $query = $conn->prepare("SELECT COUNT(*) AS count_students FROM resultat WHERE noteCC > 10");
            $query->execute();
            $stats = $query->fetch(PDO::FETCH_ASSOC);
            return $stats['count_students'];
        } catch (PDOException $e) {
            echo 'Connection failed: ' . $e->getMessage();
            return false;
        }
    }

    // Generate statistics for students with noteExam > 10
    $statsExam = generateStatsByNoteExam();

    // Generate statistics for students with noteCC > 10
    $statsCC = generateStatsByNoteCC();

    // Convert PHP arrays to JSON for JavaScript consumption
    $labels = ['Note Exam > 10', 'Note CC > 10'];
    $dataExam = [$statsExam, 0];
    $dataCC = [0, $statsCC];


    ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Statistics</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/3.7.0/chart.min.js"></script>
    <style>
        canvas {
            width: 90%;
            height: 500px;
            max-width: 1000px;
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
                labels: <?php echo json_encode($labels); ?>,
                datasets: [{
                    label: 'Students with Note Exam > 10',
                    data: <?php echo json_encode($dataExam); ?>,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                },{
                    label: 'Students with Note CC > 10',
                    data: <?php echo json_encode($dataCC); ?>,
                    backgroundColor: 'rgba(255, 99, 132, 0.2)',
                    borderColor: 'rgba(255, 99, 132, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    </script>
</body>
</html>
