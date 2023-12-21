<?php 

include '../connect.php';

class userC
{

    public function listUsers()
    {
        $sql = "SELECT * FROM user";
        $db = connect::getConnexion();
        try {
            $liste = $db->query($sql);
            return $liste;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }

    function deleteUser($ide)
    {
        $sql = "DELETE FROM user WHERE user_id = :id";
        $db = connect::getConnexion();
        $req = $db->prepare($sql);
        $req->bindValue(':id', $ide);

        try {
            $req->execute();
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }


    function addUser($user)
    {
        $sql = "INSERT INTO user  
        VALUES (NULL, :un,:em, :pw, :ut, :img)";
        $db = connect::getConnexion();
        try {
            $query = $db->prepare($sql);
            $query->execute([
                'un' => $user->getUserName(),
                'em' => $user->getEmail(),
                'pw' => $user->getPw(),
                'ut' => $user->getUsertype(),
                'img' => $user->getImage()
            ]);
        } catch (Exception $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }



    function updateUser($user, $id)
    {
        try {
            $db = connect::getConnexion();
            $query = $db->prepare(
                'UPDATE user SET 
                    username = :username, 
                    email = :email, 
                    password = :password, 
                    user_type= :user_type,
                    image = :image
                WHERE user_id= :idUser'
            );
            $query->execute([
                'user_id' => $id,
                'username' => $user->getUserName(),
                'email' => $user->getEmail(),
                'password' => $user->getPw(),
                'user_type' => $user->getUsertype(),
                'image' => $user->getImage()
            ]);
            echo $query->rowCount() . " records UPDATED successfully <br>";
        } catch (PDOException $e) {
            $e->getMessage();
        }
    }
    
    public function countCust()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE user_type= 'customer'";
        $db = connect::getConnexion();
        try {
            $numero = $db->query($sql)->fetchColumn();
            return $numero;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function countAdmin()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE user_type= 'admin'";
        $db = connect::getConnexion();
        try {
            $numero = $db->query($sql)->fetchColumn();
            return $numero;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
    public function countEmp()
    {
        $sql = "SELECT COUNT(*) FROM user WHERE user_type= 'employee'";
        $db = connect::getConnexion();
        try {
            $numero = $db->query($sql)->fetchColumn();
            return $numero;
        } catch (Exception $e) {
            die('Error:' . $e->getMessage());
        }
    }
}





