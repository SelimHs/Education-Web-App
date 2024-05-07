<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Filtered Results</title>
    <style>
        /* Style pour la sortie JSON */
        .json-output {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ccc;
            border-radius: 5px;
            margin: 50px auto; /* Ajoutez une marge supplémentaire en haut et en bas */
            max-width: 600px;
            overflow: auto;
        }

        /* Style pour les clés */
        .json-key {
            color: #007bff; /* Bleu */
        }

        /* Style pour les valeurs */
        .json-value {
            color: #28a745; /* Vert */
        }

        /* Style pour les chaînes de caractères */
        .json-string {
            color: #dc3545; /* Rouge */
        }

        /* Style pour les numéros */
        .json-number {
            color: #17a2b8; /* Turquoise */
        }

        /* Style pour les parenthèses, les crochets et les virgules */
        .json-punctuation {
            color: #6c757d; /* Gris */
        }

        /* Style pour le tableau */
        table {
            width: 80%; /* Définissez la largeur de la table */
            margin: 20px auto; /* Ajoutez une marge en haut et en bas et centrez horizontalement */
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }
    </style>
</head>
<body>
    <div class="json-output">
        <?php
        require_once '../../config.php';

        // Fonction de filtrage par type
        function filtrageParType($type) {
            try {
                // Obtenez la connexion à la base de données
                $conn = config::getConnexion();

                // Préparez la requête SQL pour sélectionner les enregistrements en fonction du type
                $query = $conn->prepare("SELECT * FROM formation WHERE type = :type");
                $query->bindParam(':type', $type);
                
                // Exécutez la requête
                $query->execute();
                
                // Récupérez tous les enregistrements correspondants sous forme de tableau associatif
                $result = $query->fetchAll();

                // Retourne les résultats filtrés
                return $result;
            } catch (PDOException $e) {
                // Si une exception PDO est levée, enregistrer l'erreur dans un journal par exemple
                error_log('Erreur PDO: ' . $e->getMessage());
                return null; // Retourne null en cas d'erreur
            }
        }

        // Vérifier si un type a été sélectionné dans le formulaire
        if (isset($_GET['filterType']) && !empty($_GET['filterType'])) {
            $filterType = $_GET['filterType'];
            
            // Appeler la fonction de filtrage avec le type sélectionné
            $filteredResults = filtrageParType($filterType);

            // Vérifier si des résultats ont été obtenus
            if ($filteredResults !== null) {
                // Afficher les résultats sous forme de tableau
                if (!empty($filteredResults)) {
                    echo "<table>";
                    echo "<tr>";
                    foreach ($filteredResults[0] as $key => $value) {
                        echo "<th>$key</th>";
                    }
                    echo "</tr>";
                    foreach ($filteredResults as $row) {
                        echo "<tr>";
                        foreach ($row as $value) {
                            echo "<td>$value</td>";
                        }
                        echo "</tr>";
                    }
                    echo "</table>";
                } else {
                    echo "Aucun résultat trouvé.";
                }
            } else {
                // En cas d'erreur, renvoyer un message d'erreur
                echo "Une erreur est survenue lors du filtrage des données.";
            }
        } else {
            // Si aucun type n'a été sélectionné, afficher un message indiquant de sélectionner un type
            echo "Veuillez sélectionner un type de filtrage.";
        }
        ?>
    </div>

    <!-- Your additional HTML code here -->

    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="style.css">
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->
</body>
</html>
