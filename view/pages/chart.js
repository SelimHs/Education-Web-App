<body>
    <h1>Statistiques</h1>
    <canvas id="myChart"></canvas>

    <script>
        // Récupérez les données JSON générées par PHP
        var data = <?php echo $data; ?>;
        
        // Extraire les labels et les données du JSON
        var labels = data.map(function(item) {
            return item.type;
        });

        var counts = data.map(function(item) {
            return item.total_students;
        });

        // Créer un graphique à l'aide de Chart.js
        var ctx = document.getElementById('myChart').getContext('2d');
        var myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Nombre d\'étudiants',
                    data: counts,
                    backgroundColor: 'rgba(54, 162, 235, 0.2)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    yAxes: [{
                        ticks: {
                            beginAtZero: true
                        }
                    }]
                }
            }
        });
    </script>
</body>
