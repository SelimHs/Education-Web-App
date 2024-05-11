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
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="pagestyle" href="style.css" rel="stylesheet" />
    <title> User </title>
    
</head>

<body >
    <a href="../View/back/pages/tables.php">Back to list </a>
    <hr>
    <?php if (!empty($error)) : ?>
        <div style="color: red;"><?php echo $error; ?></div>
    <?php endif; ?>
    <?php if (!empty($success)) : ?>
        <div style="color: green;"><?php echo $success; ?></div>
        <script>
            setTimeout(function() {
                window.location.href = '../View/back/pages/tables.php';
            }, 2000); // Rediriger après 2 secondes
        </script>
    <?php endif; ?>
    
    <form action="" method="POST" class="form-container" id="userForm" onsubmit="return validateForm(event);">
    <div style="display: flex;">
        <!-- Partie gauche du formulaire -->
        <div style="flex: 1; padding-right: 10px;">
            <label for="Surname">Surname:</label><br>
            <input type="text" id="Surname" name="Surname" style="margin-bottom: 10px;"><br>
            <span id="errorSurname" class="error"></span>

            <label for="FirstName">FirstName:</label><br>
            <input type="text" id="FirstName" name="FirstName" style="margin-bottom: 10px;"><br>
            <span id="errorFirstName" class="error"></span>

            <label for="Password">Password:</label><br>
            <input type="password" id="Password" name="Password" style="margin-bottom: 10px;"><br>
            <span id="errorPassword" class="error"></span>

            <label for="PasswordC">Password Confirmation:</label><br>
            <input type="password" id="PasswordC" name="PasswordC" style="margin-bottom: 10px;"><br>
            <span id="errorPasswordC" class="error"></span>
        </div>
        <!-- Partie droite du formulaire -->
        <div style="flex: 1; padding-left: 10px;">
            <label for="Genre">Genre:</label><br>
            <select id="Genre" name="Genre" style="margin-bottom: 10px;">
                <option value="Male">Male</option>
                <option value="Female">Female</option>
            </select><br>

            <label for="Email">Email:</label><br>
            <input type="email" id="Email" name="Email" style="margin-bottom: 10px;"><br>
            <span id="errorEmail" class="error"></span>

            <label for="Age">Age:</label><br>
            <input type="number" id="Age" name="Age" style="margin-bottom: 10px;"><br>
            <span id="errorAge" class="error"></span>

            <label for="function">function:</label><br>
            <select id="function" name="function" style="margin-bottom: 10px;">
                <option value="user">user</option>
                <option value="admin">admin</option>
                <option value="prof">prof</option>
            </select><br>

            <!-- Champ hidden pour l'attribut Status -->
            <input type="hidden" id="Status" name="Status" value="0">
            <input type="hidden" id="code" name="code" >
            <input type="hidden" id="blocked_until" name="blocked_until" value="<?php echo date('Y-m-d H:i:s', strtotime('+1 day')); ?>">
        </div>
    </div>

    <div class="btn-container">
        <input type="submit" value="Save" class="btn btn-primary bg-pink">
        <input type="reset" value="Reset" class="btn btn-primary bg-pink">
    </div>
</form>


    <script>
        function validateForm(event) {
    var Surname = document.getElementById("Surname").value.trim();
    var FirstName = document.getElementById("FirstName").value.trim();
    var Password = document.getElementById("Password").value.trim();
    var PasswordC = document.getElementById("PasswordC").value.trim();
   
    var Email = document.getElementById("Email").value.trim();
    var Age = document.getElementById("Age").value.trim();
   
    var isValid = true;

    // Validation du Surname
    if (Surname === "") {
        isValid = false;
        document.getElementById("errorSurname").innerHTML = "Please fill in the Surname field.";
    } else {
        document.getElementById("errorSurname").innerHTML = "";
    }

    // Validation du FirstName
    if (FirstName === "") {
        isValid = false;
        document.getElementById("errorFirstName").innerHTML = "Please fill in the FirstName field.";
    } else {
        document.getElementById("errorFirstName").innerHTML = "";
    }
    //validation du password
    if (Password === "") {
        isValid = false;
        document.getElementById("errorPassword").innerHTML = "Please fill in the Password field.";
    } else if (Password.length < 6 || Password.length > 10) {
        isValid = false;
        document.getElementById("errorPassword").innerHTML = "Password must be between 6 and 10 characters.";
    } else {
        document.getElementById("errorPassword").innerHTML = "";
    }
    // Validation du PasswordC
    if (PasswordC === "") {
        isValid = false;
        document.getElementById("errorPasswordC").innerHTML = "Please fill in the Password Confirmation field.";
    } else if (Password !== PasswordC) {
        isValid = false;
        document.getElementById("errorPasswordC").innerHTML = "Passwords do not match.";
    } else {
        document.getElementById("errorPasswordC").innerHTML = "";
    }
    

    // Validation de l'Email
    if (Email === "") {
        isValid = false;
        document.getElementById("errorEmail").innerHTML = "Please fill in the Email field.";
    } else if (!validateEmail(Email)) {
        isValid = false;
        document.getElementById("errorEmail").innerHTML = "Please enter a valid email address.";
    } else {
        document.getElementById("errorEmail").innerHTML = "";
    }

    // Validation de l'Age
    if (Age === "") {
        isValid = false;
        document.getElementById("errorAge").innerHTML = "Please fill in the Age field.";
    } else if (Age < 18 || Age > 100) {
        isValid = false;
        document.getElementById("errorAge").innerHTML = "Age must be between 18 and 100.";
    } else {
        document.getElementById("errorAge").innerHTML = "";
    }

   

    if (!isValid) {
        event.preventDefault();
    }

    return isValid;
}

function validateEmail(email) {
    var re = /\S+@\S+\.\S+/;
    return re.test(email);
}
    </script>
</body>

</html>
