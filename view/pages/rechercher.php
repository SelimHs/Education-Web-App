<?php
require_once '../../config.php';
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
        <style>
        /* CSS styles */
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
        }
        td a:hover {
            text-decoration: underline;
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
<div class="container">
    <?php
    // Check if ID is provided
    if(isset($_GET['id']) && !empty($_GET['id'])) {
        $id = $_GET['id'];

        try {
            // Establish connection to the database
            $conn = config::getConnexion();

            // Prepare and execute the SQL query to select record based on provided ID
            $query = $conn->prepare("SELECT * FROM formation WHERE idS = :id");
            $query->bindParam(':id', $id);
            $query->execute();

            // Fetch the record as an associative array
            $result = $query->fetch();

            // Check if record is found
            if($result) {
                // Display the information in a table
                echo '<table>';
                echo '<tr><th>ID Session</th><th>Type</th><th>Nom Prof</th><th>Code</th><th>Nombre d\'étudiants</th></tr>';
                echo '<tr>';
                echo '<td>' . $result['idS'] . '</td>';
                echo '<td>' . $result['type'] . '</td>';
                echo '<td>' . $result['nomProf'] . '</td>';
                echo '<td>' . $result['code'] . '</td>';
                echo '<td>' . $result['nbrE'] . '</td>';
                echo '</tr>';
                echo '</table>';
            } else {
                echo '<p>No record found with ID: ' . $id . '</p>';
            }
        } catch (PDOException $e) {
            // Catch any exceptions and display an error message
            echo '<p>Connection failed: ' . $e->getMessage() . '</p>';
        }
    } else {
        echo '<p>Please provide an ID for search.</p>';
    }
    ?>
</div>
</body>
</html>
<script src="js.js"></script>