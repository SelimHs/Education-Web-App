<?php
include '../Controller/UtilisateurC.php';
include '../Model/Utilisateur.php';
$error = "";

$user = null;
$userC = new UtilisateurC();

if (
    isset($_POST["id"]) &&
    isset($_POST["Surname"]) &&
    isset($_POST["FirstName"]) &&
    isset($_POST["Password"]) &&
    isset($_POST["PasswordC"]) &&
    isset($_POST["Genre"]) &&
    isset($_POST["Email"]) &&
    isset($_POST["Age"]) &&
    isset($_POST["function"]) &&
    isset($_POST["Status"]) &&
    isset($_POST["code"])
) {
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
            $_POST['id'],
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

        $userC->updateUser($user, $_POST['id']);

        header('Location: ../View/back/pages/tables.php');
        exit();
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
    <title>User Display</title>
</head>

<body>
    <button><a href=" ../View/back/pages/tables.php">Back to list</a></button>

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
                <div style="flex: 1; padding-right: 10px;">
                    <input type="hidden" id="id" name="id" value="<?php echo $_POST['id'] ?>" readonly />
                    <input type="hidden" id="status" name="Status" value="0" />
                    <input type="hidden" id="code" name="code" value="your_hidden_value_here" />
                    <input type="hidden" id="editBlockedUntil" name="blocked_until" value="<?php echo $user['blocked_until'] ?? 'default_value_here'; ?>" />

                    <label for="editSurname">Surname:</label><br>
                    <input type="text" id="editSurname" name="Surname" value="<?php echo $user['Surname'] ?>" style="margin-bottom: 10px;" /><br>
                    <label for="editFirstName">FirstName:</label><br>
                    <input type="text" id="editFirstName" name="FirstName" value="<?php echo $user['FirstName'] ?>" style="margin-bottom: 10px;" /><br>
                    <label for="editPassword">Password:</label><br>
                    <input type="password" id="editPassword" name="Password" value="<?php echo $user['Password'] ?>" style="margin-bottom: 10px;" /><br>
                    <label for="editPasswordC">Password Confirmation:</label><br>
                    <input type="password" id="PasswordC" name="PasswordC" value="<?php echo $user['PasswordC'] ?>" style="margin-bottom: 10px;" /><br>
                </div>
                <div style="flex: 1; padding-left: 10px;">
                    <label for="editGenre">Genre:</label><br>
                    <select id="editGenre" name="Genre" style="margin-bottom: 10px;">
                        <option value="Male" <?php echo ($user['Genre'] == 'Male') ? 'selected' : ''; ?>>Male</option>
                        <option value="Female" <?php echo ($user['Genre'] == 'Female') ? 'selected' : ''; ?>>Female</option>
                    </select><br>
                    <label for="editEmail">Email:</label><br>
                    <input type="email" id="editEmail" name="Email" value="<?php echo $user['Email'] ?>" style="margin-bottom: 10px;" /><br>
                    <label for="editAge">Age:</label><br>
                    <input type="number" id="editAge" name="Age" value="<?php echo $user['Age'] ?>" style="margin-bottom: 10px;" /><br>
                    <label for="editfunction">Function:</label><br>
                    <input type="text" id="editfunction" name="function" value="<?php echo $user['function'] ?>" style="margin-bottom: 10px;" /><br>
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
