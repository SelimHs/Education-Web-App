<html>
<head>
    <title>Ajouter paiement</title>
</head>
<body>

<h1>Ajouter paiement</h1>
<form method="POST" action="verificationP.php">
    <label for="id">ID Paiement:</label>
    <input type="text" id="idP" name="idP" pattern="[0-9]+" title="Veuillez saisir un ID valide (chiffres uniquement)" required><br><br>

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

    <label for="id">ID Orientation:</label>
    <input type="text" id="id" name="id" pattern="[0-9]+" title="Veuillez saisir un ID valide (chiffres uniquement)" required><br><br>

    <input type="submit" value="Confirmer">
    <input type="reset" value="Annuler">
</form>

</body>
</html>
