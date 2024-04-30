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
    <link rel="stylesheet" href="../front/style.css">
    <link rel="stylesheet" href="../front/login.css">
   
    
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->

</head>

<body>
    <div class="container login-container">
        <div class="box form-box">
            <header>Change Password</header>
            <form action="change_password_process.php?code=<?php echo $_GET['code']; ?>" method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="email" id="email" autocomplete="off" required>
                </div>
                <div class="field input  password-input">
                    <label for="PasswordN">New Password</label>
                    <input type="password" name="new_password" id="PasswordN" autocomplete="off" required>
                </div>
                
                <div class="field">
                    <button type="submit" class="btn" name="change">Change</button>
                </div>
               
            </form>
        </div>
    </div>


</body>
</html>
