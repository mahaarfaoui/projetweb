<?php
 session_start();
 include '../controller/userC.php';
 include '../model/user.php';
 if (!isset($_SESSION['username'])){
     header("location:../index.php");
 }
 else if ($_SESSION['user_type']!=='admin'){
     if ($_SESSION['user_type']==='customer'){
     header("location:customer.php");
 }
 else {header("location:employee.php");}
 }
 else {
    if(isset($_GET['user_id'])){
 $userC=null;
$user=$_GET['user_id'];
$userC = new userC();
$userC->deleteUser($user);
header('Location:listUsers.php');
 }
 else { echo" <script> alert('retry')</script>";}
}
 
 ?>