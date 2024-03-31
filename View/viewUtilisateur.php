<?php

require_once '../Controller/UtilisateurC.php';

$utilisateurC = new UtilisateurC();

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $utilisateurC->ajouterUtilisateur();
}
if (isset($_POST['delete_id'])) { // Utilisez 'delete_id' au lieu de 'delete'
    // Récupérer l'ID de l'utilisateur à supprimer depuis le formulaire
    $idToDelete = $_POST['delete_id'];
    // Appeler la méthode pour supprimer l'utilisateur avec l'ID récupéré
    $suppressionReussie = $utilisateurC->supprimerUtilisateur($idToDelete);
    // Vérifier si la suppression a réussi ou non
    if ($suppressionReussie) {
        echo 'Utilisateur supprimé avec succès';
    } else {
        echo 'Erreur lors de la suppression de l\'utilisateur';
    }
}



$listeUtilisateur = $utilisateurC->afficherListeUtilisateurs();
?>

<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Liste des utilisateurs</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>

<h2>Liste des utilisateurs</h2>

<button onclick="afficherFormulaire()">Ajouter</button>

<div id="formulaireAjout" style="display: none;">
    <h2>Ajouter un utilisateur</h2>

    <form action="" method="POST">
        <div class="form-group">
            <label for="id">ID :</label>
            <input type="number" id="id" name="id" required>
        </div>
        <div class="form-group">
            <label for="nom">Nom :</label>
            <input type="text" id="nom" name="nom" required>
        </div>
        <div class="form-group">
            <label for="prenom">Prénom :</label>
            <input type="text" id="prenom" name="prenom" required>
        </div>
        <div class="form-group">
            <label for="adresse">Adresse :</label>
            <input type="text" id="adresse" name="adresse" required>
        </div>
        <div class="form-group">
            <label for="email">Email :</label>
            <input type="email" id="email" name="email" required>
        </div>
        <div class="form-group">
            <label for="pwd">Mot de passe :</label>
            <input type="password" id="pwd" name="pwd" required>
        </div>
        <div class="form-group">
            <label for="tel">Téléphone :</label>
            <input type="tel" id="tel" name="tel" required>
        </div>
        <div class="form-group">
            <label for="genre">Genre :</label>
            <input type="text" id="genre" name="genre" required>
        </div>
        <div class="form-group">
            <label for="fonction">Fonction :</label>
            <input type="text" id="fonction" name="fonction" required>
        </div>
        <button type="submit">Ajouter</button>
    </form>
</div>

<?php if (!empty($listeUtilisateur)) : ?>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Email</th>
                <th>Nom</th>
                <th>Prénom</th>
                <th>Adresse</th>
                <th>Genre</th>
                <th>Téléphone</th>
                <th>Fonction</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($listeUtilisateur as $utilisateur) : ?>
                <tr>
                    <td><?php echo $utilisateur['id']; ?></td>
                    <td><?php echo $utilisateur['email']; ?></td>
                    <td><?php echo $utilisateur['nom']; ?></td>
                    <td><?php echo $utilisateur['prenom']; ?></td>
                    <td><?php echo $utilisateur['adresse']; ?></td>
                    <td><?php echo $utilisateur['genre']; ?></td>
                    <td><?php echo $utilisateur['tel']; ?></td>
                    <td><?php echo $utilisateur['fonction']; ?></td>
                
                <td>
                <td>
    <button onclick="supprimerUtilisateur(<?php echo $utilisateur['id']; ?>)">Supprimer</button>
</td>

                    </td>
                    </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
<?php else : ?>
    <p>Aucun utilisateur trouvé.</p>
<?php endif; ?>

<script>
function afficherFormulaire() {
    document.getElementById("formulaireAjout").style.display = "block";}




    function supprimerUtilisateur(id) {
    // Confirmer la suppression avec l'utilisateur
    if (confirm("Êtes-vous sûr de vouloir supprimer cet utilisateur?")) {
        // Créer un formulaire temporaire
        var form = document.createElement('form');
        form.method = 'POST';
        form.action = ''; // Laissez cette chaîne vide ou spécifiez l'URL de votre page PHP

        // Ajouter un champ caché pour envoyer l'ID de l'utilisateur à supprimer
        var input = document.createElement('input');
        input.type = 'hidden';
        input.name = 'delete_id';
        input.value = id;
        form.appendChild(input);

        // Ajouter le formulaire à la page et le soumettre
        document.body.appendChild(form);
        form.submit();
    }
}

</script>









</body>
</html>
