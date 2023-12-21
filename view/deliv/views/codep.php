<?php
session_start();
include('config.php');
///Insert

if(isset($_POST['save_panier_btn']))
{
    $name = $_POST['name'];
    $price = $_POST['price'];

    $query = "INSERT INTO tbl_product (name, price) VALUES (:name, :price)";
    $query_run = $conn->prepare($query);

    $data = [
        ':name' => $name,
        ':price' => $price,
    ];
    $query_execute = $query_run->execute($data);

    if($query_execute)
    {
        $_SESSION['message'] = "Inserted Successfully";
        header('Location: ajouterpanier.php');
        exit(0);
    }
    else
    {
        $_SESSION['message'] = "Not Inserted";
        header('Location: ajouterpanier.php');
        exit(0);
    }
}

//Modify

if(isset($_POST['update_panier_btn']))
{
    $tbl_product_id = $_POST['tbl_product_id'];
    $name = $_POST['name'];
    $image = $_POST['image'];
    $price = $_POST['price'];
    try {

        $query = "UPDATE tbl_product SET name=:name, price=:price WHERE id=:tbl_product_id LIMIT 1";
        $statement = $conn->prepare($query);

        $data = [
            ':name' => $name,
            ':price' => $price,
            ':tbl_product_id' => $tbl_product_id
        ];
        $query_execute = $statement->execute($data);
 
        if($query_execute)
        {
            $_SESSION['message'] = "Updated Successfully";
            header('Location: affp.php');
            exit(0);
        }
        else
        {
            $_SESSION['message'] = "Not Updated";
            header('Location: affp.php');
            exit(0);
        }

    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}


///Delete
if(isset($_POST['delete_panier']))
{
    $tbl_product_id = $_POST['delete_panier'];

    try {

        $query = "DELETE FROM tbl_product WHERE id=:tbl_product_id";
        $statement = $conn->prepare($query);
        $data = [
            ':tbl_product_id' => $tbl_product_id
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