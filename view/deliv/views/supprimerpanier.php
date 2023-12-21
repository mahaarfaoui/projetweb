<?php
session_start();
include('config.php');

if(isset($_POST['delete_panier']))
{
    $tbl_product = $_POST['delete_panier'];

    try {

        $query = "DELETE FROM tbl_product WHERE id=:tbl_product";
        $statement = $conn->prepare($query);
        $data = [
            ':tbl_product' => $tbl_product
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: affp.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: affp.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>