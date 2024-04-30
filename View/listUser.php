<?php
include "../Controller/UtilisateurC.php";

$c = new UtilisateurC();
$tab = $c->afficherListeUtilisateurs();

// listUser.php

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = $c->rechercherUtilisateurParEmail($email);

    if ($user) {
        // Afficher l'utilisateur trouvé
        $tab = [$user]; // Remplacer le tableau existant par un tableau contenant uniquement l'utilisateur trouvé
    } else {
        echo "User not found.";
    }
}

if (isset($_POST['sort'])) {
    $tab = $c->trierUtilisateursParAge();
}
if (isset($_POST['function'])) {
    $function = $_POST['function'];
    $tab = $c->filtrerUtilisateursParFonction($function);
}

// Traitement pour bloquer ou débloquer un utilisateur
if (isset($_POST['block']) || isset($_POST['unblock'])) {
    $userId = $_POST['id'];
    if (isset($_POST['block'])) {
        $blockDuration = $_POST['block_duration'];
        $c->blockUser($userId, $blockDuration);
    } else {
        $c->unblockUser($userId);
    }
    $tab = $c->afficherListeUtilisateurs(); // Rafraîchir la liste des utilisateurs après le blocage/déblocage
}

$usersPerPage = 3;
$page = isset($_GET['page']) ? $_GET['page'] : 1;
$offset = ($page - 1) * $usersPerPage;

if (isset($_POST['email'])) {
    $email = $_POST['email'];
    $user = $c->rechercherUtilisateurParEmail($email);

    if ($user) {
        $tab = [$user];
    } else {
        echo "User not found.";
    }
} else if (isset($_POST['sort'])) {
    $tab = $c->trierUtilisateursParAge();
} else if (isset($_POST['function'])) {
    $function = $_POST['function'];
    $tab = $c->filtrerUtilisateursParFonction($function);
} else {
    $tab = $c->afficherListeUtilisateurs($offset, $usersPerPage);
}

$totalUsers = $c->getTotalUsersCount();
$totalPages = ceil($totalUsers / $usersPerPage);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link id="pagestyle" href="style.css" rel="stylesheet" />
    <title>List of Users</title>
    <style>
        .pagination {
            display: inline-block;
        }

        .pagination a {
            color: black;
            float: left;
            padding: 8px 16px;
            text-decoration: none;
            transition: background-color .3s;
            border: 1px solid #ddd;
            margin: 0 4px;
        }

        .pagination a.active {
            background-color: #007bff;
            color: white;
            border: 1px solid #007bff;
        }

        .pagination a:hover:not(.active) {background-color: #ddd;}
    </style>
</head>
<body>
<a href="listUser.php">Back to list </a>
    <hr>
    <h1>List of users</h1>
    <h2>
    <a href="statistics.php" class="btn btn-primary bg-pink">Statistics</a>

            <a href="addUser.php" class="btn btn-primary bg-pink">Add user</a>
            </h2>
            <h2>
            <form method="POST" action="">
            <input type="submit" name="sort" value="Sort by Age" class="btn btn-primary bg-pink;">
        </form>
</h2>
<h2>
<form method="POST" action="">
        <label for="function">Filter by Function:</label>
        <select id="function" name="function">
            <option value="user">User</option>
            <option value="admin">Admin</option>
            <option value="prof">Prof</option>
        </select>
        <input type="submit" value="Filter" class="btn btn-primary bg-pink;">
    </form>
</h2>
    <form method="POST" action="">
        <label for="email">Search by Email:</label>
        <input type="email" id="email" name="email" required>
        <input type="submit" value="Search" class="btn btn-primary bg-pink;">
    </form>
    <table border="1" align="center" width="70%">
        <tr>
            <th>Surname</th>
            <th>FirstName</th>
            <th>Password</th>
            <th>PasswordC</th>
            <th>Genre</th>
            <th>Email</th>
            <th>Age</th>
            <th>Function</th>
            <th>Status</th>
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
                <td><?= $user['Age'] ?></td>
                <td><?= $user['Function'] ?></td>
                <td align="center">
                    <form method="POST" action="">
                        <input type="hidden" name="id" value="<?= $user['id'] ?>">
                        <input type="number" id="block_duration" name="block_duration" >
                        <?php if ($user['Status'] == 0): ?>
                            <input type="submit" name="block" value="Block"  class="btn btn-primary bg-pink;">
                        <?php else: ?>
                            <input type="submit" name="unblock" value="Unblock" class="btn btn-primary bg-pink;">
                        <?php endif; ?>
                    </form>
                </td>
                <td align="center">
                    <form method="POST" action="updateUser.php">
                        <input type="submit" name="update" value="Update" class="btn btn-primary bg-pink;">
                        <input type="hidden" value="<?= $user['id']; ?>" name="id">
                    </form>
                </td>
                <td>
                    <a href="deleteUser.php?id=<?= $user['id']; ?>" class="btn btn-primary bg-pink;">Delete</a>
                </td>
            </tr>
        <?php
        }
        ?>
    </table>
    <!-- Pagination -->
    <div class='pagination'>
    <?php for ($i = 1; $i <= $totalPages; $i++) { ?>
        <a href='listUser.php?page=<?= $i ?>'<?= ($page == $i ? " class='active'" : "") ?>><?= $i ?></a>
    <?php } ?>
</div>

</body>
</html>
