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
    isset($_POST["Adress"]) &&
    isset($_POST["Genre"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Tel"]) &&
    isset($_POST["Function"])
) {
    if (
        !empty($_POST['Surname']) &&
        !empty($_POST["FirstName"]) &&
        !empty($_POST["Password"]) &&
        !empty($_POST["Adress"]) &&
        !empty($_POST["Genre"]) &&
        !empty($_POST["Email"]) &&
        !empty($_POST["Tel"]) &&
        !empty($_POST["Function"])
    ) {
        
        $user = new Utilisateur(
            null,
            $_POST['Surname'],
            $_POST['FirstName'],
            $_POST['Password'],
            $_POST['Adress'],
            $_POST['Genre'],
            $_POST['Email'],
            $_POST['Tel'],
            $_POST['Function']
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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="pagestyle" href="style.css" rel="stylesheet" />
    <title> User </title>
</head>

<body >
    <a href="listUser.php">Back to list </a>
    <hr>
    <?php if (!empty($error)) : ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($success)) : ?>
        <div style="color: green;"><?php echo $success; ?></div>
        <script>
            setTimeout(function() {
                window.location.href = 'listUser.php';
            }, 2000); // Rediriger après 2 secondes
        </script>
    <?php endif; ?>
    <form action="" method="POST" class="form-container">
    <div style="display: flex;">
            <!-- Partie gauche du formulaire -->
            <div style="flex: 1; padding-right: 10px;">
                <label for="Surname">Surname:</label><br>
                <input type="text" id="Surname" name="Surname" required style="margin-bottom: 10px;"><br>
                <label for="FirstName">FirstName:</label><br>
                <input type="text" id="FirstName" name="FirstName" required style="margin-bottom: 10px;"><br>
                <label for="Password">Password:</label><br>
                <input type="password" id="Password" name="Password" required style="margin-bottom: 10px;"><br>
                <label for="Adress">Adress:</label><br>
                <input type="text" id="Adress" name="Adress" required style="margin-bottom: 10px;"><br>
            </div>
            <!-- Partie droite du formulaire -->
            <div style="flex: 1; padding-left: 10px;">
                <label for="Genre">Genre:</label><br>
                <select id="Genre" name="Genre" style="margin-bottom: 10px;">
                    <option value="Male">Male</option>
                    <option value="Female">Female</option>
                </select><br>
                <label for="Email">Email:</label><br>
                <input type="email" id="Email" name="Email" required style="margin-bottom: 10px;"><br>
                <label for="Tel">Tel:</label><br>
                <input type="tel" id="Tel" name="Tel" required style="margin-bottom: 10px;"><br>
                <label for="Function">Function:</label><br>
                <input type="text" id="Function" name="Function" required style="margin-bottom: 10px;"><br>
            </div>
        </div>


        <div class="btn-container">
        <input type="submit" value="Save" class="btn btn-primary bg-pink">
        <input type="reset" value="Reset" class="btn btn-primary bg-pink">
    </div>

    </form>
   

</body>

</html>
