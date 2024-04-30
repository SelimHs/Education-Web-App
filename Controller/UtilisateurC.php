

<?php


require_once '../config.php';

class UtilisateurC {


    public function afficherListeUtilisateurs($offset = 0, $limit = 3) {
        $sql = "SELECT * FROM utilisateurs LIMIT :offset, :limit";
        $db = config::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->bindParam(':offset', $offset, PDO::PARAM_INT);
            $query->bindParam(':limit', $limit, PDO::PARAM_INT);
            $query->execute();
            return $query->fetchAll();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    



    function addUser($user)
    {
        $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
        $sql = "INSERT INTO utilisateurs  
                    (Surname, FirstName, Password, PasswordC, Genre, Email, Age, Function, Status, code, blocked_until) 
                VALUES 
                    (:Surname, :FirstName, :Password, :PasswordC, :Genre, :Email, :Age, :Function, :Status, :code, :blocked_until)";
        $db = config::getConnexion();
        try {
            $blockedUntil = $user->getBlockedUntil();
            $blockedUntilFormatted = $blockedUntil ? $blockedUntil->format('Y-m-d H:i:s') : null; // Formatage de la date si elle n'est pas null
            $query = $db->prepare($sql);
            $query->execute([
                'Surname' => $user->getSurname(),
                'FirstName' => $user->getFirstName(),
                'Password' => $hashedPassword,
                'PasswordC' => $user->getPasswordC(),
                'Genre' => $user->getGenre(),
                'Email' => $user->getEmail(),
                'Age' => $user->getAge(),
                'Function' => $user->getFunction(),
                'Status' => $user->getStatus(),
                'code' => $user->getCode(),
                'blocked_until' => $blockedUntilFormatted, // Utilisation de la variable formatée
            ]);
            return true; // Ajout réussi
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
            return false; // Erreur lors de l'ajout
        }
    }
    





    function deleteUser($ide)
    {
        $sql = "DELETE FROM utilisateurs WHERE id = :id";
        $db = config::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function showUser($id)
{
$sql = "SELECT * FROM utilisateurs WHERE id = :id";
$db = config::getConnexion();
try {
    $query = $db->prepare($sql);
    $query->bindParam(':id', $id);
    $query->execute();
    $user = $query->fetch();
    
    return $user;
} catch (Exception $e) {
    die('Error: ' . $e->getMessage());
}
}


function updateUser($user, $id)
{   
    try {
        $db = config::getConnexion();
        $query = $db->prepare(
            'UPDATE utilisateurs SET 
                Surname = :Surname, 
                FirstName = :FirstName, 
                Password = :Password, 
                PasswordC = :PasswordC, 
                Genre = :Genre, 
                Email = :Email, 
                Age = :Age, 
                Function = :Function,
                Status = :Status,
                code = :code,
                blocked_until = :blocked_until
            WHERE id= :id'
        );
        
        $blockedUntil = $user->getBlockedUntil();
        $blockedUntilFormatted = $blockedUntil ? $blockedUntil->format('Y-m-d H:i:s') : null;

        $query->execute([
            'id' => $id,
            'Surname' => $user->getSurname(),
            'FirstName' => $user->getFirstName(),
            'Password' => $user->getPassword(),
            'PasswordC' => $user->getPasswordC(),
            'Genre' => $user->getGenre(),
            'Email' => $user->getEmail(),
            'Age' => $user->getAge(),
            'Function' => $user->getFunction(),
            'Status' => $user->getStatus(),
            'code' => $user->getCode(),
            'blocked_until' => $blockedUntilFormatted,
        ]);
        
        echo $query->rowCount() . " records UPDATED successfully <br>";
    } catch (PDOException $e) {
        echo "Error updating record: " . $e->getMessage();
    }
}




function loginUser($email, $password) {
    $sql = "SELECT * FROM utilisateurs WHERE Email = :email";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetch();
        
        if ($user) {
            // Vérifiez si le compte est bloqué
            if ($user['Status'] == 1) {
                // Compte bloqué, affichez un message et redirigez vers une page d'erreur
                $blockedUntil = new DateTime($user['blocked_until']);
                $now = new DateTime();
                if ($now < $blockedUntil) {
                    $remainingTime = $now->diff($blockedUntil)->format('%h hours %i minutes %s seconds');
                    echo "Your account is blocked for $remainingTime. Please retry later.";
                    exit(); // Arrêtez l'exécution du script
                } else {
                    // Débloquer l'utilisateur car le temps de blocage est écoulé
                    $this->unblockUser($user['id']);
                }
            }
            // Vérifiez si le mot de passe est correct
            if (password_verify($password, $user['Password'])) {
                session_start();
                $_SESSION['user'] = $user;
                // Mot de passe correct
                if ($user['Function'] == 'admin') {
                    // Redirigez vers l'interface admin
                    header("Location: ../back/pages/tables.html");
                    exit();
                } else {
                    // Redirigez vers l'interface utilisateur
                    header("Location: ../front/index.html");
                    exit();
                }
            } else {
                // Mot de passe incorrect
                echo "Incorrect password";
            }
        } else {
            // L'email n'existe pas
            echo "This email does not exist";
        }
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}

    
    
    


// UtilisateurC.php

function rechercherUtilisateurParEmail($email)
{
    $sql = "SELECT * FROM utilisateurs WHERE Email = :email";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':email', $email);
        $query->execute();
        $user = $query->fetch(PDO::FETCH_ASSOC); // Utilisez FETCH_ASSOC pour obtenir un tableau associatif

        if (!$user) {
            echo "User not found in the database.";
        }
        
        return $user;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}





function trierUtilisateursParAge()
{
    $sql = "SELECT * FROM utilisateurs ORDER BY Age ASC";
    $db = config::getConnexion();
    try {
        $liste = $db->query($sql);
        return $liste;
    } catch (Exception $e) {
        die('Error during sorting: ' . $e->getMessage());
    }
}


function filtrerUtilisateursParFonction($function)
{
    $sql = "SELECT * FROM utilisateurs WHERE Function = :function";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->bindParam(':function', $function);
        $query->execute();
        $liste = $query->fetchAll();
        return $liste;
    } catch (Exception $e) {
        die('Error: ' . $e->getMessage());
    }
}


function blockUser($id, $blockDuration)
{
    $sql = "UPDATE utilisateurs SET Status = 1, blocked_until = DATE_ADD(NOW(), INTERVAL :blockDuration HOUR) WHERE id = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);
    $req->bindValue(':blockDuration', $blockDuration);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

function unblockUser($id)
{
    $sql = "UPDATE utilisateurs SET Status = 0, blocked_until = NULL WHERE id = :id";
    $db = config::getConnexion();
    $req = $db->prepare($sql);
    $req->bindValue(':id', $id);

    try {
        $req->execute();
    } catch (Exception $e) {
        die('Error:' . $e->getMessage());
    }
}

    function getStatistics() {
        $stats = array();
    
        // Récupérer le nombre total d'utilisateurs
        $sqlTotal = "SELECT COUNT(*) as total FROM utilisateurs";
        $db = config::getConnexion();
        $queryTotal = $db->query($sqlTotal);
        $resultTotal = $queryTotal->fetch();
        $stats['total'] = $resultTotal['total'];
    
        // Récupérer le nombre d'utilisateurs par genre
        $sqlGenres = "SELECT Genre, COUNT(*) as count FROM utilisateurs GROUP BY Genre";
        $queryGenres = $db->query($sqlGenres);
        $resultGenres = $queryGenres->fetchAll(PDO::FETCH_ASSOC);
        $genres = array();
        foreach ($resultGenres as $row) {
            $genres[$row['Genre']] = $row['count'];
        }
        $stats['genres'] = $genres;
    
        return $stats;
    }

    // UtilisateurC.php

    public function getTotalUsersCount() {
        $sql = "SELECT COUNT(*) as total FROM utilisateurs";
        $db = config::getConnexion();
        $result = $db->query($sql)->fetch();
        return $result['total'];
    }



// UtilisateurC.php



    
    

     

    
       

    
    


}     

?>

