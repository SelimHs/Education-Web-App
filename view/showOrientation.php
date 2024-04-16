<?php
    // Inclusion du fichier de contrôleur pour les orientations
    include '../controller/orientationC.php';
    
    // Création d'une instance du contrôleur des orientations
    $orientationC = new OrientationC();
    
    // Récupération de la liste des orientations
    $list = $orientationC->listOrientation();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des Orientations</title>
</head>
<body>
    <h1>Liste des Orientations</h1>
    <table border="1">
        <tr>
            <th>Id Orientation</th>
            <th>Type</th>
            <th>Date Reservation</th>
            <th>Horaire RDV</th>
            <th>Num Salle</th>
            <th>Prix</th>
            <th>Nom Monteur</th>
            <th>Nom Eleve</th>
            <th>Actions</th>
        </tr>
        <?php foreach ($list as $orientation): ?>
            <tr>
                <td><?= $orientation['id']; ?></td>
                <td><?= $orientation['type']; ?></td>
                <td><?= $orientation['date_reservation']; ?></td>
                <td><?= $orientation['horaire_rdv']; ?></td>
                <td><?= $orientation['num_salle']; ?></td>
                <td><?= $orientation['prix']; ?></td>
                <td><?= $orientation['nom_m']; ?></td>
                <td><?= $orientation['nom_e']; ?></td>
                <td>
                    <!-- Lien de suppression avec passage de l'ID de l'orientation à supprimer -->
                    <a href="deleteOrientation.php?id=<?= $orientation['id']; ?>">Supprimer</a>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>
</body>
</html>
