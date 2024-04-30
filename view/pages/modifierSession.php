<?php
require_once '../../config.php';

// Initialize $row variable
$row = null;

// Check if ID is provided and exists
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = config::getConnexion();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update the record
        $type = $_POST['type'];
        $idS = $id; // Utilisation de idS pour identifier la formation à modifier
        $nomProf = $_POST['nomProf'];
        $code = $_POST['code'];
        $nbrE = $_POST['nbrE'];
    
        try {
            // Prepare the query before execution
            $query = $conn->prepare("UPDATE formation SET type = :type, nomProf = :nomProf, code = :code, nbrE = :nbrE WHERE idS = :idS");
            
            // Lier les paramètres
            $query->bindParam(':idS', $idS);
            $query->bindParam(':type', $type);
            $query->bindParam(':nomProf', $nomProf);
            $query->bindParam(':code', $code);
            $query->bindParam(':nbrE', $nbrE);

            // Execute the query
            $query->execute();
            
            // Redirect back to the original page after successful update
            header("Location: original_page.php");
            exit();
        } catch (PDOException $e) {
            // Handle errors
            echo 'Update failed: ' . $e->getMessage();
        }
    }

    // Fetch the record to pre-populate the form
    try {
        $query = $conn->prepare("SELECT * FROM formation WHERE idS = :id");
        $query->bindParam(':id', $id);
        $query->execute();
        $row = $query->fetch();
    } catch (PDOException $e) {
        // Handle errors
        echo 'Query failed: ' . $e->getMessage();
    }
} else {
    // Handle case where ID is not provided
    echo "ID not provided!";
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0,maximum-scale=1">
    <title>Modifier la présence</title>
    <style>
        /* Global styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #f7f7f7;
            margin: 0;
            padding: 0;
        }

        .container {
            width: 80%;
            margin: 20px auto;
        }

        h2 {
            margin-bottom: 20px;
        }

        form {
            background-color: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        form div {
            margin-bottom: 15px;
        }

        label {
            display: block;
            margin-bottom: 5px;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
        }

        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            padding: 10px 20px;
            border: none;
            border-radius: 4px;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Modifier la formation</h2>
        <form method="post">
            <?php if($row): ?>
                <div>
                    <label for="type">Type:</label>
                    <input type="text" name="type" id="type" value="<?php echo $row['type']; ?>">
                </div>
                <div>
                    <label for="nomProf">Nom Prof:</label>
                    <input type="text" name="nomProf" id="nomProf" value="<?php echo $row['nomProf']; ?>">
                </div>
                <div>
                    <label for="code">Code:</label>
                    <input type="text" name="code" id="code" value="<?php echo $row['code']; ?>">
                </div>
                <div>
                    <label for="nbrE">Nombre d'Etudiants:</label>
                    <input type="text" name="nbrE" id="nbrE" value="<?php echo $row['nbrE']; ?>">
                </div>
                <div>
                    <input type="submit" value="Save">
                </div>
            <?php else: ?>
                <p>Session not found.</p>
            <?php endif; ?>
        </form>
    </div>
</body>
</html>
