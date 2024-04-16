<?php
require_once '../Controller/UtilisateurC.php';
require_once '../Model/Utilisateur.php';

session_start();
if (isset($_SESSION['user'])) {
    $user = $_SESSION['user'];
    $id_utilisateur_connecte = $user['id']; // Récupération de l'id de l'utilisateur connecté

    $userC = new UtilisateurC();
    $user = $userC->showUser($id_utilisateur_connecte);

    if ($user) {
        if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['update'])) {
            // Créer un objet utilisateur avec les données du formulaire
            $updatedUser = new Utilisateur(null, $_POST['Surname'], $_POST['FirstName'], $_POST['Password'], $_POST['PasswordC'], $_POST['Genre'], $_POST['Email'], $_POST['Tel'], $_POST['Function']);

            // Appeler la méthode updateUser avec l'objet utilisateur créé
            $userC->updateUser($updatedUser, $id_utilisateur_connecte);
            // Actualiser les données de l'utilisateur après la mise à jour
            $user = $userC->showUser($id_utilisateur_connecte);
        }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Chargement du fichier CSS principal -->
    <link rel="stylesheet" href="../front/style.css">
    <link rel="stylesheet" href="../front/login.css">
    <script src="validation.js"></script>
    
    <title>Profile</title>
    <!-- Inclure vos fichiers CSS ici -->
</head>

<body>
    <h1>Profile</h1>
    <form action="" method="POST" class="form-container">
    <div style="display: flex;">
        <!-- Partie gauche du formulaire -->
        <div style="flex: 1; padding-right: 10px;">
            <input type="hidden" id="id" name="id" value="<?php echo $user['id'] ?>" readonly >
            <label for="Surname">Surname:</label><br>
            <input type="text" id="Surname" name="Surname" value="<?php echo $user['Surname'] ?>" required style="margin-bottom: 10px;"/><br>
            <label for="FirstName">FirstName:</label><br>
            <input type="text" id="FirstName" name="FirstName" value="<?php echo $user['FirstName'] ?>" required style="margin-bottom: 10px;"/><br>
            <label for="Password">Password:</label><br>
            <input type="password" id="Password" name="Password" value="<?php echo $user['Password'] ?>" required style="margin-bottom: 10px;"/><br>
            <label for="editPasswordC">Password Confirmation:</label><br>
            <input type="Password" id="PasswordC" name="PasswordC" value="<?php echo $user['PasswordC'] ?>" required style="margin-bottom: 10px;"/><br>
        </div>
        <!-- Partie droite du formulaire -->
        <div style="flex: 1; padding-left: 10px;">
            <label for="Genre">Genre:</label><br>
            <select id="Genre" name="Genre" required style="margin-bottom: 10px;">
                <option value="Male" <?php echo ($user['Genre'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($user['Genre'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select><br>
            <label for="Email">Email:</label><br>
            <input type="email" id="Email" name="Email" value="<?php echo $user['Email'] ?>" required style="margin-bottom: 10px;" /><br>
            <label for="Tel">Tel:</label><br>
            <input type="tel" id="Tel" name="Tel" value="<?php echo $user['Tel'] ?>" required style="margin-bottom: 10px;" /><br>
            <label for="Function">Function:</label><br>
            <input type="text" id="Function" name="Function" value="<?php echo $user['Function'] ?>" required style="margin-bottom: 10px;"/><br>
        </div>
    </div>
        <input type="submit" name="update" value="Update">
        <!-- Bouton de déconnexion -->
        <a href="logout.php">Log Out</a>
    </form>
</body>

</html>
<?php
    } else {
        echo "Utilisateur introuvable";
    }
} else {
    // Rediriger vers la page de connexion si l'utilisateur n'est pas connecté
    header("Location: se_connecter.html");
    exit();
}
?>
