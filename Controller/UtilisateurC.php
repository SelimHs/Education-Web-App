<?php


require_once '../config.php';

class UtilisateurC {


    public function afficherListeUtilisateurs()  {
        $sql = "SELECT * FROM utilisateurs";
        $db = config::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }



    function addUser($user)
{
    $hashedPassword = password_hash($user->getPassword(), PASSWORD_DEFAULT);
    $sql = "INSERT INTO utilisateurs  
            VALUES (NULL, :Surname, :FirstName, :Password, :PasswordC, :Genre, :Email, :Tel, :Function)";
    $db = config::getConnexion();
    try {
        $query = $db->prepare($sql);
        $query->execute([
            'Surname' => $user->getSurname(),
            'FirstName' => $user->getFirstName(),
            'Password' => $hashedPassword,
            'PasswordC' => $user->getPasswordC(), // Ajout de la valeur pour :PasswordC
            'Genre' => $user->getGenre(),
            'Email' => $user->getEmail(),
            'Tel' => $user->getTel(),
            'Function' => $user->getFunction(),
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
                    Tel = :Tel, 
                    Function = :Function
                WHERE id= :id'
            );
            
            $query->execute([
                'id' => $id,
                'Surname' => $user->getSurname(),
                'FirstName' => $user->getFirstName(),
                'Password' => $user->getPassword(),
                'PasswordC' => $user->getPasswordC(),
                'Genre' => $user->getGenre(),
                'Email' => $user->getEmail(),
                'Tel' => $user->getTel(),
                'Function' => $user->getFunction(),
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
                    echo "Mot de passe incorrect";
                }
            } else {
                // L'email n'existe pas
                echo "Cet email n'existe pas";
            }
        } catch (Exception $e) {
            die('Error: ' . $e->getMessage());
        }
    }
    
    
    


}     

?>

