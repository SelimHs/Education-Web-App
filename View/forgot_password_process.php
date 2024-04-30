<?php
require_once '../config.php'; // Inclure votre fichier de configuration PDO

if(isset($_POST['submit'])) {
    $email = $_POST['email'];
}
else {
    exit();
}

use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

require 'mail/Exception.php';
require 'mail/PHPMailer.php';
require 'mail/SMTP.php';

$mail = new PHPMailer(true);

try {
    $mail->isSMTP();                                     
    $mail->Host       = 'smtp.gmail.com';                
    $mail->SMTPAuth   = true;                               
    $mail->Username   = 'ines.rahrah@esprit.tn';               
    $mail->Password   = 'jlvc ixkw zhkc cezj';                           
    $mail->SMTPSecure = PHPMailer::ENCRYPTION_STARTTLS;         
    $mail->Port       = 587;                                

    $mail->setFrom('ines.rahrah@esprit.tn', 'Admin');
    $mail->addAddress($email);    

    $code = substr(str_shuffle('1234567890QWERTYUIOPASDFGHJKLZXCVBNM'),0,10);

    $mail->isHTML(true);                                 
    $mail->Subject = 'Password Reset';
    $mail->Body    = 'To reset your password click <a href="http://localhost/2A/projetWeb/View/change_password.php?code='.$code.'">here </a>. </br>Reset your password in a day.';

    // Utiliser PDO pour les requêtes SQL
    $conn = new PDO('mysql:host=localhost;dbname=projet', 'root', '');
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $verifyQuery = $conn->prepare("SELECT * FROM utilisateurs WHERE Email = :email");
    $verifyQuery->bindParam(':email', $email);
    $verifyQuery->execute();

    if($verifyQuery->rowCount()) {
        $codeQuery = $conn->prepare("UPDATE utilisateurs SET code = :code WHERE Email = :email");
        $codeQuery->bindParam(':code', $code);
        $codeQuery->bindParam(':email', $email);
        $codeQuery->execute();
            
        $mail->send();
        echo 'Message has been sent, check your email';
    }

    $conn = null;

} catch (Exception $e) {
    echo "Message could not be sent. Mailer Error: {$mail->ErrorInfo}";
}
?>
