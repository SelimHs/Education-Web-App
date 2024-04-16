<?php
session_start();
// Détruit toutes les données de la session
session_destroy();
// Redirection vers la page de connexion
header("Location: login.php");
exit();
?>
