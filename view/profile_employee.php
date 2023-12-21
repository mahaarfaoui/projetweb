<?php 
session_start();
include '../controller/userC.php';
include '../model/user.php';

if (!isset($_SESSION['employee_id'])){
    if(isset($_SESSION['customer_id'])){
    header("location:customer.php");}
    else if (isset($_SESSION['admin_id'])){
        header("location:admin.php");
    }
    else {
header("location:../index.php");
$employee_id = $_SESSION['employee_id'];

}
}
if(isset($_POST['update'])){
    $employee_id = $_SESSION['employee_id'];
    $name = $_POST['username'];
    $name = filter_var($name, FILTER_SANITIZE_STRING);
    $email = $_POST['email'];
    $email = filter_var($email, FILTER_SANITIZE_STRING);
    $db = connect::getConnexion();
    $update_profile = $db->prepare("UPDATE `user` SET username = ?, email = ? WHERE user_id = ?");
    $update_profile->execute([$name, $email, $employee_id]);
 
    $old_image = $_POST['old_image'];
    $image = $_FILES['image']['name'];
    $image_tmp_name = $_FILES['image']['tmp_name'];
    $image_size = $_FILES['image']['size'];
    $image_folder = '../assets/images/'.$image;
 
    if(!empty($image)){
 
       if($image_size > 2000000){
          $message[] = 'image size is too large';
       }else{
          $update_image = $db->prepare("UPDATE `user` SET image = ? WHERE user_id = ?");
          $update_image->execute([$image, $employee_id]);
 
          if($update_image){
             move_uploaded_file($image_tmp_name, $image_folder);
            
             $message[] = 'image has been updated!';
          }
       }
 
    }
 
    $old_pass = $_POST['old_pass'];
    $previous_pass=$_POST['previous_pass'];
    $new_pass=$_POST['new_pass'];
    $confirm_pass=$_POST['confirm_pass'];
    /*$previous_pass = md5($_POST['previous_pass']);
    $previous_pass = filter_var($previous_pass, FILTER_SANITIZE_STRING);
    $new_pass = md5($_POST['new_pass']);
    $new_pass = filter_var($new_pass, FILTER_SANITIZE_STRING);
    $confirm_pass = md5($_POST['confirm_pass']);
    $confirm_pass = filter_var($confirm_pass, FILTER_SANITIZE_STRING);*/
 
    if(!empty($previous_pass) || !empty($new_pass) || !empty($confirm_pass)){
       if($previous_pass != $old_pass){
          $message[] = 'old password not matched!';
       }elseif($new_pass != $confirm_pass){
          $message[] = 'confirm password not matched!';
       }else{
          $update_password = $db->prepare("UPDATE `user` SET password = ? WHERE user_id = ?");
          $update_password->execute([$confirm_pass, $employee_id]);
          $message[] = 'password has been updated!';
       }
    }
 
 }
 
 ?>
 








<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">

   <title>Employee Profile Edit</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.1/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="../assets/style/profile.css">
   <link rel="shortcut icon" type="x-icon" href="../assets/images/logo.png"> 
 

</head>
<body>



<h1 class="title"> update <span>employee</span> profile </h1>

<section class="update-profile-container">

   <?php
   $employee_id = $_SESSION['employee_id'];
    $db = connect::getConnexion();  
      $select_profile = $db->prepare("SELECT * FROM `user` WHERE user_id = ?");
      $select_profile->execute([$employee_id]);
      $fetch_profile = $select_profile->fetch(PDO::FETCH_ASSOC);
   ?>

   <form action="" method="post" enctype="multipart/form-data">
      <img src="../assets/images/<?= $fetch_profile['image']; ?>" alt="">
      <div class="flex">
         <div class="inputBox">
            <span>username : </span>
            <input type="text" name="username" required class="box" placeholder="enter your name" value="<?= $fetch_profile['username']; ?>">
            <span>email : </span>
            <input type="email" name="email" required class="box" placeholder="enter your email" value="<?= $fetch_profile['email']; ?>">
            <span>profile pic : </span>
            <input type="hidden" name="old_image" value="<?= $fetch_profile['image']; ?>">
            <input type="file" name="image" class="box" accept="image/jpg, image/jpeg, image/png">
         </div>
         <div class="inputBox">
            <input type="hidden" name="old_pass" value="<?= $fetch_profile['password']; ?>">
            <span>old password :</span>
            <input type="password" class="box" name="previous_pass" placeholder="enter previous password" >
            <span>new password :</span>
            <input type="password" class="box" name="new_pass" placeholder="enter new password" >
            <span>confirm password :</span>
            <input type="password" class="box" name="confirm_pass" placeholder="confirm new password" >
         </div>
      </div>
      <div class="flex-btn">
         <input type="submit" value="update profile" name="update" class="btn">
         <a href="admin.php" class="option-btn">go back</a>
      </div>
   </form>

</section>

</body>
</html>