<?php

include '../Controller/UtilisateurC.php';
include '../Model/Utilisateur.php';
$error = "";

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
    isset($_POST["Tel"]) &&
    isset($_POST["Function"])
) {
    if (
        !empty($_POST['Surname']) &&
        !empty($_POST["FirstName"]) &&
        !empty($_POST["Password"]) &&
        isset($_POST["PasswordC"]) &&
        !empty($_POST["Genre"]) &&
        !empty($_POST["Email"]) &&
        !empty($_POST["Tel"]) &&
        !empty($_POST["Function"])
    ){
        foreach ($_POST as $key => $value) {
            echo "Key: $key, Value: $value<br>";
        }
        $user = new Utilisateur(
            null,
            $_POST['Surname'],
            $_POST['FirstName'],
            $_POST['Password'],
            $_POST['PasswordC'],
            $_POST['Genre'],
            $_POST['Email'],
            $_POST['Tel'],
            $_POST['Function']
        );
        var_dump($user);
        
        $userC->updateUser($user, $_POST['id']);

        header('Location:listUser.php');
    } else
        $error = "Missing information";
}




?>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="pagestyle" href="style.css" rel="stylesheet" />
    <script src="validation.js"></script>
    <title>User Display</title>
</head>

<body>
<button><a href="listUser.php">Back to list</a></button>
    
    <hr>

    <div id="error">
        <?php echo $error; ?>
    </div>

    <?php
    if (isset($_POST['id'])) {
        $user = $userC->showUser($_POST['id']);
        
    ?>

<form action="" method="POST" class="form-container">
    <div style="display: flex;">
        <!-- Partie gauche du formulaire -->
        <div style="flex: 1; padding-right: 10px;">
            <input type="hidden" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
            <label for="editSurname">Surname:</label><br>
            <input type="text" id="editSurname" name="Surname" value="<?php echo $user['Surname'] ?>"  style="margin-bottom: 10px;"/><br>
            <label for="editFirstName">FirstName:</label><br>
            <input type="text" id="editFirstName" name="FirstName" value="<?php echo $user['FirstName'] ?>"  style="margin-bottom: 10px;"/><br>
            <label for="editPassword">Password:</label><br>
            <input type="password" id="editPassword" name="Password" value="<?php echo $user['Password'] ?>"  style="margin-bottom: 10px;"/><br>
            <label for="editPasswordC">Password Confirmation:</label><br>
            <input type="password" id="PasswordC" name="PasswordC" value="<?php echo $user['PasswordC'] ?>"  style="margin-bottom: 10px;"/><br>
        </div>
        <!-- Partie droite du formulaire -->
        <div style="flex: 1; padding-left: 10px;">
            <label for="editGenre">Genre:</label><br>
            <select id="editGenre" name="Genre"  style="margin-bottom: 10px;">
                <option value="Male" <?php echo ($user['Genre'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                <option value="Female" <?php echo ($user['Genre'] == 'Female') ? 'selected' : ''; ?>>Female</option>
            </select><br>
            <label for="editEmail">Email:</label><br>
            <input type="email" id="editEmail" name="Email" value="<?php echo $user['Email'] ?>"  style="margin-bottom: 10px;" /><br>
            <label for="editTel">Tel:</label><br>
            <input type="tel" id="editTel" name="Tel" value="<?php echo $user['Tel'] ?>"  style="margin-bottom: 10px;" /><br>
            <label for="editFunction">Function:</label><br>
            <input type="text" id="editFunction" name="Function" value="<?php echo $user['Function'] ?>"  style="margin-bottom: 10px;"/><br>
        </div>
    </div>
    <div class="btn-container">
        <input type="submit" value="Save" class="btn btn-primary bg-pink">
        <input type="reset" value="Reset" class="btn btn-primary bg-pink">
    </div>
</form>

    <?php
    }
    ?>
    
</body>

</html>