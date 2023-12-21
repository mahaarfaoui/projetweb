<?php
session_start();
include('config.php');
///Insert

if(isset($_POST['save_commande_btn']))
{
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $dateoford = $_POST['dateoford'];
    $email = $_POST['email'];
    $pay = $_POST['pay'];
    $city = $_POST['city'];
    $state = $_POST['state'];
    $pin = $_POST['pin'];

    $query = "INSERT INTO `command`(name, number, address, dateoford, email, pay, city, state, pin) VALUES (:name, :number, :address, :dateoford, :email, :pay, :city, :state, :pin)";
    $query_run = $conn->prepare($query);

    $data = [
        ':name' => $name,
        ':number' => $number,
        ':address' => $address,
        ':dateoford' => $dateoford,
        ':email' => $email,
        ':pay' => $pay,
        ':city' => $city,
        ':state' => $state,
        ':pin' => $pin,
    ];
    $query_execute = $query_run->execute($data);


    /*Integration avec Zakaria*/
   
}

//Modify

if(isset($_POST['update_command_btn']))
{
    $command_id = $_POST['command_id'];
    $name = $_POST['name'];
    $number = $_POST['number'];
    $address = $_POST['address'];
    $dateoford = $_POST['dateoford'];

    try {

        $query = "UPDATE command SET name=:name, number=:number, address=:address, dateoford=:dateoford WHERE id=:command_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':name' => $name,
            ':number' => $number,
            ':address' => $address,
            ':dateoford' => $dateoford,
            ':command_id' => $command_id
        ];
        $query_execute = $statement->execute($data);

        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: aff.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: aff.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


///Delete
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