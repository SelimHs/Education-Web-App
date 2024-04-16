<?php
include "../Controller/UtilisateurC.php";

$c = new UtilisateurC();
$tab = $c->afficherListeUtilisateurs();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <link id="pagestyle" href="style.css" rel="stylesheet" />


  
</head>
<center>
    <h1>List of users</h1>
    <h2>
        <a href="addUser.php">Add user</a>
    </h2>
</center>
<table border="1" align="center" width="70%">
    <tr>
            <th>Surname</th>
            <th>FirstName</th>
            <th>Password</th>
            <th>PasswordC</th>
            <th>Genre</th>
            <th>Email</th>
            <th>Tel</th>
            <th>Function</th>
        <th>Update</th>
        <th>Delete</th>
    </tr>


    <?php
    foreach ($tab as $user) {
    ?>




        <tr>
        <td><?= $user['Surname'] ?></td>
                <td><?= $user['FirstName'] ?></td>
                <td><?= $user['Password'] ?></td>
                <td><?= $user['PasswordC'] ?></td>
                <td><?= $user['Genre'] ?></td>
                <td><?= $user['Email'] ?></td>
                <td><?= $user['Tel'] ?></td>
                <td><?= $user['Function'] ?></td>
            <td align="center">
                <form method="POST" action="updateUser.php">
                    <input type="submit" name="update" value="Update" class="btn btn-primary bg-pink;">
                    <input type="hidden" value=<?PHP echo $user['id']; ?> name="id">
                </form>
            </td>
            <td>
                <a href="deleteUser.php?id=<?php echo $user['id']; ?>" class="btn btn-primary bg-pink;">Delete</a>
            </td>
        </tr>
    <?php
    }
    ?>
</table>