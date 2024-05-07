<?php 
require_once '../../config.php';
$conn = config::getConnexion();
try {
    // Prepare and execute the SQL query to select all records from the 'formation' table
    $query = $conn->prepare("SELECT * FROM formation");
    $query->execute();
    // Fetch all records as an associative array
    $result = $query->fetchAll();
} catch (PDOException $e) {
    // Catch any exceptions and display an error message
    echo 'Connection failed: ' . $e->getMessage();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Courses | Lincoln High School</title>
    <!-- Loading third party fonts -->
    <link href="http://fonts.googleapis.com/css?family=Arvo:400,700|" rel="stylesheet" type="text/css">
    <link href="fonts/font-awesome.min.css" rel="stylesheet" type="text/css">
    <!-- Loading main css file -->
    <link rel="stylesheet" href="style.css">
    <!--[if lt IE 9]>
    <script src="js/ie-support/html5.js"></script>
    <script src="js/ie-support/respond.js"></script>
    <![endif]-->
    <style>
        /* Your CSS styles here */
        body {
            font-family: 'Arvo', serif;
            background-color: #f7f7f7;
            color: #333;
            margin: 0;
            padding: 0;
        }
        .container {
            width: 80%;
            margin: 0 auto;
            text-align: center; /* Center the content horizontally */
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin: 0 auto;
        }
        th, td {
            padding: 10px; /* Adjust cell padding */
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
        th {
            background-color: #f2f2f2;
        }
        td {
            background-color: #fff;
        }
        td a {
            text-decoration: none;
            color: #007bff;
            padding: 8px 12px;
            border-radius: 4px;
            background-color: #007bff;
            color: #fff;
            transition: background-color 0.3s;
        }
        td a:hover {
            background-color: #0056b3;
        }
        .button-form {
            margin-top: 10px; /* Add margin to separate buttons */
        }
        .button-form {
            display: flex; /* Use flexbox */
            justify-content: space-between; /* Distribute space between buttons */
            align-items: center; /* Center vertically */
        }
        .button-form form {
            margin-right: 10px; /* Add some space between buttons */
        }
        .button-form form:last-child {
            margin-right: 0; /* Remove margin from the last button */
        }
        .button-form input[type="submit"] {
            font-size: 14px; /* Adjust the font size */
            padding: 5px 10px; /* Adjust the padding */
        }
    </style>
</head>
<body>
<div id="site-content">
    <header class="site-header">
        <!-- Your header content here -->
    </header>
    <div class="container">
        <div class="page-title">
            <h2>Your opinion matters!</h2>
        </div>
        <!-- Table displaying formation data -->
        <table>
            <tr>
                <th>ID Session</th>
                <th>Type</th>
                <th>Nom Prof</th>
                <th>Code</th>
                <th>Nombre d'étudiants</th>
                <th>Join</th>
                <th>Presence</th>  <!-- Ajout de la colonne pour le bouton Join -->
            </tr>
            <?php foreach ($result as $row): ?>
            <tr>
                <td><?php echo $row['idS']; ?></td>
                <td><?php echo $row['type']; ?></td>
                <td><?php echo $row['nomProf']; ?></td>
                <td><?php echo $row['code']; ?></td>
                <td><?php echo $row['nbrE']; ?></td>
                <td><a href="join.php?id=<?php echo $row['idS']; ?>">Join</a></td> <!-- Ajout du bouton Join avec un lien vers la page join.php en passant l'ID de la session -->
                <td><a href="presence.php?id=<?php echo $row['idS']; ?>">Presence</a></td> <!-- Add a link for the Presence button -->
                
            </tr>
            <?php endforeach; ?>
        </table>
        <!-- Buttons -->
        <div class="button-form">
            <form action="http://localhost/gestionSess/view/pages/tri.php" method="post">
                <input type="submit" name="tri" value="tri">
            </form>
            <form action="http://localhost/gestionSess/view/pages/rechercher.php" method="get">
                <form action="" method="GET">
        <input type="text" id="nomProf" name="nomProf">
        <input type="submit" value="Search">
    </form>
            </form>
            <form action="http://localhost/gestionSess/view/pages/stat.php" method="get" onsubmit="return validateForm(this);">
                <input type="submit" value="stat">
            </form>
            <form action="http://localhost/gestionSess/view/pages/cal.php" method="get" onsubmit="return validateForm(this);">
                <input type="submit" value="cal">
            </form>
            <form action="http://localhost/gestionSess/view/pages/filtrage.php" method="get">
                <select name="filterType" id="filterType">
        <option value="">All</option>
        <option value="francais">Francais</option>
        <option value="web">Web</option>
        <option value="math">Math</option>
    </select>
                <input type="submit" value="filtrage">
            </form>
        </div>
    </div>
</div>
</body>
</html>
