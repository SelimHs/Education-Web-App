<?php



?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Update Session Information</title>
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

<h2>Update Session Information</h2>

<div class="container">
    <form method="POST" action="verification.php">
        <div class="form-group">
            <label for="idS">idS:</label>
            <input type="text" id="idS" name="idS" pattern="[0-9]+" title="Veuillez saisir un ID valide (chiffres uniquement)" required>
        </div>
        <div class="form-group">
            <label for="type">Type:</label>
            <select id="type" name="type" required>
                <option value="francais">francais</option>
                <option value="math">math</option>
                <option value="web">web</option>
            </select>
        </div>
        <div class="form-group">
            <label for="code">code:</label>
            <input type="number" id="code" name="code" pattern="[0-9]+" title="Veuillez saisir un numéro de salle valide (chiffres uniquement)" required><br><br>
        </div>
        <div class="form-group">
            <label for="nbrE">nbrE:</label>
            <input type="number" id="nbrE" name="nbrE" min="0" required><br><br>
        </div>
        <div class="form-group">
            <label for="nomProf">Nom du Prof:</label>
            <input type="text" id="nomProf" name="nomProf" pattern="[A-Za-z]+" title="Veuillez saisir un nom valide (lettres uniquement)" required><br><br>
        </div>
        <div class="form-group">
            <button type="submit" class="btn btn-primary">Confirmer</button>
            <button type="reset" class="btn btn-primary" style="background-color: #525050;">Annuler</button>
        </div>
    </form>
</div>

<div class="row">
    <div class="col-12">
        <div class="card my-4">
            <div class="card-header p-0 position-relative mt-n4 mx-3 z-index-2">
                <div class="bg-gradient-primary shadow-primary border-radius-lg pt-4 pb-3">
                    <h6 class="text-white text-capitalize ps-3">formation table</h6>
                </div>
            </div>
            <?php
            // Inclusion du fichier de contrôleur pour les orientations
            include '../../controller/formation.php';
            
            // Création d'une instance du contrôleur des orientations
            $formation = new formation();
            
            // Récupération de la liste des orientations
            $list = getAllFormation(); 
            ?>
            <div class="card-body px-0 pb-2">
                <div class="table-responsive p-0">
                    <table class="table align-items-center mb-0">
                        <thead>
                            <tr>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">idS</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">type</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nomProf</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">code</th>
                                <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">nbrE</th>
                                <th class="text-secondary opacity-7"></th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($list as $formation): ?>
                                <tr>
                                    <td class="mb-0 text-sm align-middle text-center font-weight-bold text-uppercase text-secondary text-xxs font-weight-bolder opacity-100000"><?= $formation['idS']; ?></td>
                                    <td class="align-middle text-center text-sm">
                                        <?php 
                                        // Récupérer le statut de l'orientation
                                        $type = $formation['type'];
                                        // Définir la classe CSS en fonction du statut
                                        $class = '';
                                        switch ($type) {
                                            case 'francais':
                                                $class = 'bg-gradient-success';
                                                break;
                                            case 'math':
                                                $class = 'bg-gradient-warning';
                                                break;
                                            case 'anglais':
                                                $class = 'bg-gradient-danger';
                                                break;
                                            default:
                                                $class = '';
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

</body>
</html>
