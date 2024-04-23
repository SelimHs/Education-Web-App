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
    isset($_POST["Tel"]) &&
    isset($_POST["Function"])
) {
    if (
        !empty($_POST['Surname']) &&
        !empty($_POST["FirstName"]) &&
        !empty($_POST["Password"]) &&
        !empty($_POST["PasswordC"]) &&
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
            $_POST['PasswordC'],
            $_POST['Genre'],
            $_POST['Email'],
            $_POST['Tel'],
            $_POST['Function']
        );
       
        header("Location: ../front/se_connecter.html");
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
    
    <title> Register </title>
</head>

<body >
   
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
    <div class="container login-container">
        <div class="box form-box">
        

       


            <header>Sign Up</header>
    <form  action="" method="POST" class="form-container" id="userForm" onsubmit="return validateForm(event)">
                <div style="display: flex;">
                        <!-- Partie gauche du formulaire -->
                        <div style="flex: 1; padding-right: 10px;">
                            <label for="Surname">Surname:</label><br>
                            <input type="text" id="Surname" name="Surname"  style="margin-bottom: 10px;"><br>
                            <span id="errorSurname" class="error"></span><br><br>

                            <label for="FirstName">FirstName:</label><br>
                            <input type="text" id="FirstName" name="FirstName"  style="margin-bottom: 10px;"><br>
                            <span id="errorFirstName" class="error"></span><br><br>
                            <label for="Password">Password:</label><br>
                            <input type="password" id="Password" name="Password"  style="margin-bottom: 10px;"><br>
                            <span id="errorPassword" class="error"></span><br><br>

                            <label for="PasswordC">Password Confirmation:</label><br>
                            <input type="text" id="PasswordC" name="PasswordC"  style="margin-bottom: 10px;"><br>
                            <span id="errorPasswordC" class="error"></span><br><br>
                        </div>
                        <!-- Partie droite du formulaire -->
                        <div style="flex: 1; padding-left: 10px;">
                            <label for="Genre">Genre:</label><br>
                            <select id="Genre" name="Genre" style="margin-bottom: 10px;">
                                <option value="Male">Male</option>
                                <option value="Female">Female</option>
                            </select><br>
                            <label for="Email">Email:</label><br>
                            <input type="email" id="Email" name="Email"  style="margin-bottom: 10px;"><br>
                            <span id="errorEmail" class="error"></span><br><br>
                            <label for="Tel">Tel:</label><br>
                            <input type="tel" id="Tel" name="Tel"  style="margin-bottom: 10px;"><br>
                            <span id="errorTel" class="error"></span><br><br>
                            <label for="Function">Function:</label><br>
                            <input type="text" id="Function" name="Function"  style="margin-bottom: 10px;"><br>
                        </div>
                    </div>
            
                    <div class="btn-container">
        <input type="submit" value="Sign up" >
        <input type="reset" value="Reset" >
    </div>

                <div class="links">
                    Already a member? <a href="../front/se_connecter.html">Sign In</a>
                </div>
            </form>
        </div>
    </div>
      
  
    
    <script>
        function validateForm(event) {
    var Surname = document.getElementById("Surname").value.trim();
    var FirstName = document.getElementById("FirstName").value.trim();
    var Password = document.getElementById("Password").value.trim();
    var PasswordC = document.getElementById("PasswordC").value.trim();
   
    var Email = document.getElementById("Email").value.trim();
    var Tel = document.getElementById("Tel").value.trim();
   
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
    } else if (!/\d/.test(Password)) {
        isValid = false;
        document.getElementById("errorPassword").innerHTML = "Password must contain at least one digit.";
    } else {
        document.getElementById("errorPassword").innerHTML = "";
    }

    // Validation de la confirmation du Password
    if (PasswordC === "") {
        isValid = false;
        document.getElementById("errorPasswordC").innerHTML = "Please fill in the Password Confirmation field.";
    } else if (Password !== PasswordC) {
        isValid = false;
        document.getElementById("errorPasswordC").innerHTML = "Passwords do not match.";
    } else {
        document.getElementById("errorPasswordC").innerHTML = "";
    }

    // Validation du Email
    if (Email === "") {
        isValid = false;
        document.getElementById("errorEmail").innerHTML = "Please fill in the Email field.";
    } else if (!/\S+@\S+\.\S+/.test(Email)) {
        isValid = false;
        document.getElementById("errorEmail").innerHTML = "Please enter a valid email address.";
    } else {
        document.getElementById("errorEmail").innerHTML = "";
    }

    // Validation du Tel
    if (Tel === "") {
        isValid = false;
        document.getElementById("errorTel").innerHTML = "Please fill in the Tel field.";
    } else if (!/^\d{8}$/.test(Tel)) {
        isValid = false;
        document.getElementById("errorTel").innerHTML = "Please enter a valid phone number (8 digits).";
    } else {
        document.getElementById("errorTel").innerHTML = "";
    }

   

    if (!isValid) {
        event.preventDefault(); // Empêcher la soumission du formulaire si la validation échoue
    }

    return isValid;
} 
        document.getElementById("userForm").addEventListener("submit", validateForm);
    </script>

</body>

</html>







