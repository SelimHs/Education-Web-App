<html>
<head>
    <title>Ajouter orientation</title>
</head>
<body>
    <h1>Ajouter orientation</h1>
    <form method="POST" action="verfication.php">
        <label for="id">ID:</label>
        <input type="text" id="id" name="id" required><br><br>
        
        <label for="type">Type:</label>
        <input type="text" id="type" name="type" required><br><br>
        
        <label for="date_reservation">Date de réservation:</label>
        <input type="text" id="date_reservation" name="date_reservation" required><br><br>
        
        <label for="horaire_rdv">Horaire du rendez-vous:</label>
        <input type="text" id="horaire_rdv" name="horaire_rdv" required><br><br>
        
        <label for="num_salle">Numéro de salle:</label>
        <input type="text" id="num_salle" name="num_salle" required><br><br>
        
        <label for="prix">Prix:</label>
        <input type="text" id="prix" name="prix" required><br><br>
        
        <label for="nom_m">Nom du modèle:</label>
        <input type="text" id="nom_m" name="nom_m" required><br><br>
        
        <label for="nom_e">Nom de l'événement:</label>
        <input type="text" id="nom_e" name="nom_e" required><br><br>
        
        <input type="submit" value="Submit">
        <input type="reset" value="Reset">
    </form>
</body>
</html>
