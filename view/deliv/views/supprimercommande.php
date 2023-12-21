<?php
session_start();
include('config.php');

if(isset($_POST['delete_command']))
{
    $command_id = $_POST['delete_command'];

    try {

        $query = "DELETE FROM command WHERE id=:command_id";
        $statement = $conn->prepare($query);
        $data = [
            ':command_id' => $command_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Deleted Successfully";
            header('Location: aff.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Deleted";
            header('Location: aff.php');
            exit(0);
        }

    } catch(PDOException $e){
        echo $e->getMessage();
    }
}

?>