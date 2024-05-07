<?php

include '../Controller/UtilisateurC.php';
include '../Model/Utilisateur.php';

$error = "";
$success = "";
// create client
$user = null;

// create an instance of the controller
$userC = new UtilisateurC();
if (
    isset($_POST["Surname"]) &&
    isset($_POST["FirstName"]) &&
    isset($_POST["Password"]) &&
    isset($_POST["PasswordC"]) &&
    isset($_POST["Genre"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Age"]) &&
    isset($_POST["function"])&&
    isset($_POST["Status"])&&
    isset($_POST["code"])
) {
    //var_dump($_POST);
    if (
        !empty($_POST['Surname']) &&
        !empty($_POST["FirstName"]) &&
        !empty($_POST["Password"]) &&
        !empty($_POST["PasswordC"]) &&
        !empty($_POST["Genre"]) &&
        !empty($_POST["Email"]) &&
        !empty($_POST["Age"]) &&
        !empty($_POST["function"])&&
        isset($_POST["code"])
    ) {
        
        $user = new Utilisateur(
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
       
        
        if ($userC->addUser($user)) {
            $success = "User added successfully";
           
           
        } else {
            $error = "Failed to add user";
        }

    } else {
        $error = "Missing information";
    }
    } 

?>








