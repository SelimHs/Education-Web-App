<?php
require_once '../../config.php';

// Check if ID is provided and exists
if(isset($_GET['id'])) {
    $id = $_GET['id'];
    $conn = config::getConnexion();
    
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        // Update the record
        $statut = $_POST['statut'];
        $heureA = $_POST['heureA'];
        $idS = $_POST['idS'];
        
        try {
            $query = $conn->prepare("UPDATE presence SET statut = :statut, heureA = :heureA, idS = :idS WHERE idP = :id");
            $query->bindParam(':statut', $statut);
            $query->bindParam(':heureA', $heureA);
            $query->bindParam(':idS', $idS);
            $query->bindParam(':id', $id);
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
        $query = $conn->prepare("SELECT * FROM presence WHERE idP = :id");
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
        <h2>Modifier la présence</h2>
        <form method="post">
            <div>
                <label for="statut">Statut:</label>
                <input type="text" name="statut" id="statut" value="<?php echo $row['statut']; ?>">
            </div>
            <div>
                <label for="heureA">Heure:</label>
                <input type="text" name="heureA" id="heureA" value="<?php echo $row['heureA']; ?>">
            </div>
            <div>
                <label for="idS">ID Session:</label>
                <input type="text" name="idS" id="idS" value="<?php echo $row['idS']; ?>">
            </div>
            <div>
                <input type="submit" value="Save">
            </div>
        </form>
    </div>
</body>
</html>
