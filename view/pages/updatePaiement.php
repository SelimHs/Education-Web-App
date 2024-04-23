<?php
include_once '../../model/paiement.php';
include_once '../../controller/paiementC.php';

$error = "";

// create paiement
$paiement = null;

// create an instance of the controller
$paiementC = new paiementC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    if (
        isset($_POST["idP"]) &&
        isset($_POST["montant"]) &&
        isset($_POST["date_paiement"]) &&
        isset($_POST["methode_paiement"]) &&
        isset($_POST["id"])
    ) {
        if (
            !empty($_POST["idP"]) &&
            !empty($_POST["montant"]) &&
            !empty($_POST["date_paiement"]) &&
            !empty($_POST["methode_paiement"]) &&
            !empty($_POST["id"])
        ) {
            $idP = $_POST['idP'];
            $montant = $_POST['montant'];
            $date_paiement = $_POST['date_paiement'];
            $methode_paiement = $_POST['methode_paiement'];
            $id = $_POST['id'];

            $paiement = new Paiement($idP, $montant, $date_paiement, $methode_paiement, $id);
            $paiementC->modifierPaiement($idP, $montant, $date_paiement, $methode_paiement, $id);
            header('Location: billing.php');
            
        } else {
            $error = "Tous les champs sont requis";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modifier paiement</title>
    <style>
        /* Styles CSS */
        .container {
            max-width: 600px;
            margin: auto;
            padding: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        .form-group {
            margin-bottom: 15px;
        }
        label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }
        input[type="text"],
        input[type="number"],
        select {
            width: 100%;
            padding: 8px;
            border: 1px solid #ccc;
            border-radius: 5px;
        }
        button {
            padding: 10px 20px;
            background-color: #007bff;
            color: #fff;
            border: none;
            border-radius: 5px;
            cursor: pointer;
        }
        button[type="reset"] {
            background-color: #dc3545;
        }
    </style>
</head>
<body>
    <form method="POST">
        <div class="form-group">
            <label for="idP">ID Paiement:</label><br>
            <input type="text" id="idP" name="idP" value="<?= $_GET['idP'] ?? ''; ?>" readonly><br><br>

            <label for="montant">Montant:</label>
            <input type="number" id="montant" name="montant" min="0" required><br><br>

            <label for="date_paiement">Date de paiement:</label>
            <input type="date" id="date_paiement" name="date_paiement" required><br><br>

            <label for="methode_paiement">Méthode de paiement:</label>
            <select id="methode_paiement" name="methode_paiement" required>
                <option value="carte">Carte</option>
                <option value="espece">Espèces</option>
                <option value="cheque">Chèque</option>
            </select><br><br>

            <label for="id">ID d'Orientation:</label>
            <input type="text" id="id" name="id" value="<?= $_GET['id'] ?? ''; ?>" readonly><br><br>

            <input type="hidden" name="id_ini" value="<?php echo $_GET['idP'] ?? ''; ?>">
            <input type="hidden" name="id_ini" value="<?php echo $_GET['id'] ?? ''; ?>">
            <div class="d-flex justify-content-end">
            <button type="submit" name="modifier" value="modifier" class="btn btn-link text-dark px-3 mb-0">Modifier</button>
            <button type="reset" class="btn btn-link text-dark px-3 mb-0" onclick="window.location.href='billing.php';">Annuler</button>
    </div>

            
                    
        </div>
    </form>
</body>
</html>
