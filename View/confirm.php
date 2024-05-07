<?php
include '../Controller/UtilisateurC.php';

if(isset($_GET['email'])) {
    $email = $_GET['email'];
    $userC = new UtilisateurC();
    $userC->updateVerifByEmail($email, 1);
    // Redirection vers la page de login
    header('Location: login.php');
    exit();
} else {
    // Redirection vers une page d'erreur si l'e-mail n'est pas défini dans l'URL
    header('Location: erreur.php');
    exit();
}
?>
