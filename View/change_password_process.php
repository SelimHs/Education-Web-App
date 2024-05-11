<?php
require_once '../config.php'; // Inclure votre fichier de configuration PDO

if(isset($_GET['code'])) {
    $code = $_GET['code'];

    try {
        $conn = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $verifyQuery = $conn->prepare("SELECT * FROM utilisateurs WHERE code = :code");
        $verifyQuery->bindParam(':code', $code);
        $verifyQuery->execute();

        if($verifyQuery->rowCount() == 0) {
            header("Location: front/se_connecter.html");
            exit();
        }

        if(isset($_POST['change'])) {
            $email = $_POST['email'];
            $new_password = $_POST['new_password'];
        
            // Assurez-vous de sécuriser vos requêtes SQL en utilisant des requêtes préparées
            $stmt = $conn->prepare("UPDATE utilisateurs SET Password = :password, passwordC = :passwordC WHERE Email = :email");
            $hashed_password = password_hash($new_password, PASSWORD_DEFAULT); // Hashage du nouveau mot de passe
            $stmt->bindParam(':password', $hashed_password);
            $stmt->bindParam(':passwordC', $new_password);
            $stmt->bindParam(':email', $email);
            $stmt->execute();
        
            header("Location: success.html");
            exit();
        }
        
        
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }

    $conn = null;
} else {
    header("Location: front/se_connecter.html");
    exit();
}
?>
