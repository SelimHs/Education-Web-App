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
            $updatedUser = new Utilisateur(
                null,
                $_POST['Surname'],
                $_POST['FirstName'],
                $_POST['Password'],
                $_POST['PasswordC'],
                $_POST['Genre'],
                $_POST['Email'],
                $_POST['Age'],
                $_POST['function'],
                $_POST['Status'],
                $_POST['code']
            );

            // Appeler la méthode updateUser avec l'objet utilisateur créé
            $userC->updateUser($updatedUser, $id_utilisateur_connecte);
            // Actualiser les données de l'utilisateur après la mise à jour
            $user = $userC->showUser($id_utilisateur_connecte);
        } else if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['delete'])) {

            // Appeler la fonction delete de UtilisateurC
            $userC->deleteUser($id_utilisateur_connecte);

            // Rediriger vers la page d'inscription
            header("Location: register.php");
            exit();
        }
        ?>






















<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    
    <title>Se connecter | Wadhahli</title>
    <!-- Chargement des polices tierces -->
    <link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Chargement du fichier CSS principal -->
    <link rel="stylesheet" href="style.css">
    <link rel="stylesheet" href="login.css">
    
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

</head>

<body>



    <div class="header-container">
        <header class="site-header">
            <div class="primary-header">
                <div class="container">
                    <a href="index.html" id="branding">
                        <img src="images/logo.png" alt="Wadhahli">
                        <h1 class="site-title">Wadhahli</h1>
                    </a>
                    <div class="main-navigation">
                        <button type="button" class="menu-toggle"><i class="fa fa-bars"></i></button>
                        <ul class="menu">
                            <li class="menu-item"><a href="index.html">Accueil</a></li>
                            <li class="menu-item current-menu-item"><a href="course.html">Cours</a></li>
                            <li class="menu-item"><a href="student.html">Étudiants</a></li>
                            <li class="menu-item"><a href="event.html">Événements</a></li>
                            <li class="menu-item"><a href="contact.html">Contact</a></li>
                            <li class="menu-item"><a href="se_connecter.html">Se connecter</a></li>
                            <li class="menu-item"><a href="sinscrire.html">S'inscrire</a></li>
                            <li class="menu-item"><a href="profile.php">Profile</a></li>
                        </ul>
                    </div>
                    <div class="mobile-navigation"></div>
                </div>
            </div>
        </header>
    </div>
    




   
    <div class="container login-container">
                <div class="box form-box">
                    <h1>Profile</h1>
                    <form action="" method="POST" class="form-container">
                        <div style="display: flex;">
                            <!-- Partie gauche du formulaire -->
                            <div style="flex: 1; padding-right: 10px;">
                                <input type="hidden" id="id" name="id" value="<?php echo $user['id'] ?>" readonly>
                                <input type="hidden" id="status" name="Status" value="0" />
                    <input type="hidden" id="code" name="code" value="your_hidden_value_here" />
                                <label for="Surname">Surname:</label><br>
                                <input type="text" id="Surname" name="Surname" value="<?php echo $user['Surname'] ?>" required style="margin-bottom: 10px;" /><br>
                                <label for="FirstName">FirstName:</label><br>
                                <input type="text" id="FirstName" name="FirstName" value="<?php echo $user['FirstName'] ?>" required style="margin-bottom: 10px;" /><br>
                                <label for="Password">Password:</label><br>
                                <input type="password" id="Password" name="Password" value="<?php echo $user['Password'] ?>" required style="margin-bottom: 10px;" /><br>
                                <label for="PasswordC">Password Confirmation:</label><br>
                                <input type="password" id="PasswordC" name="PasswordC" value="<?php echo $user['PasswordC'] ?>" required style="margin-bottom: 10px;" /><br>
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
                                <label for="Age">Age:</label><br>
                                <input type="number" id="Age" name="Age" value="<?php echo $user['Age'] ?>" required style="margin-bottom: 10px;" /><br>
                                <label for="Function">Function:</label><br>
                                <input type="text" id="function" name="function" value="<?php echo $user['function'] ?>" required style="margin-bottom: 10px;" /><br>
                            </div>
                        </div>
                        <input type="submit" name="update" value="Update">
                        <input type="submit" name="delete" value="Delete">
                        <!-- Bouton de déconnexion -->
                        <a href="../View/logout.php">Log Out</a>
                    </form>
                </div>
            </div>
    

  
                   
                   
                   
                 
                    











                   
                   
                   
                   
                   
                   
    

    <footer class="site-footer">
        <div class="container">
            <div class="row">
                <div class="col-md-12">
                    <div class="widget">
                        <h3 class="widget-title">Contactez-nous</h3>
                        <address>ESPRIT <br>Ghazela <br>Ariana</address>


                        <a href="mailto:info@Wadhahli.com">info@Wadhahli.com</a> <br>
                        <a href="tel:48942652394324">(489) 42652394324</a>
                    </div>
                </div>
            </div>
        </div>
    </footer>

   
    <script src="http://maps.google.com/maps/api/js?sensor=false&amp;language=fr"></script>
    <script src="js/plugins.js"></script>
    <script src="js/app.js"></script>
    
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