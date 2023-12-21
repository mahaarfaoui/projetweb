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


$user=null;

$error = "";


$userC = new userC();

if (
    isset($_POST["username"]) &&
    isset($_POST["pw"]) &&
    isset($_POST["cpw"]) &&
    isset($_POST["em"])&&
    isset($_POST["image"])&&
    isset($_POST["usertype"])
    )
     {
      echo"<script src='../assets/js/controle.js'> </script>";
    if (
        !empty($_POST["username"]) &&
        !empty($_POST["pw"]) &&
        !empty($_POST["em"])&&
        !empty($_POST["cpw"])&&
        !empty($_POST["usertype"])&&
        !empty($_POST["image"])
    ) {
        $user = new user(
            null,
            $_POST['username'],
            $_POST['em'],
            $_POST['pw'],
           $_POST['usertype'],
           $_POST["image"]
        );
        $userC->addUser($user);
        
        echo" <script> alert('account successfully added');</script>";
        header('Location:listUsers.php');}

      
    
    }


?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">
    <link rel="shortcut icon" type="x-icon" href="../assets/images/logo.png">
    <script src=
"https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js">
</script>
	<!-- custom css file link -->
	

	<!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/style/stylish.css">
</head>
<body> 
 
  <img src="../assets/images/backg.jpg" class="backg">
  <header>
		<a href="" class="logo"><img src="../assets/images/logo.png"></a>
       
		<nav class="navbar">
			<a href="../index.php" class="active">home</a>
			<a href=" ../index.php#about">about</a>
			<a href=" ../index.php#menu">menu</a>
			<a href="../index.php#team">team</a>
			<a href="../index.php#reservation">reservation</a>
			<a href="../index.php#blog">blog</a>
			
		</nav>

		<div class="icons">
			<i class="fas fa-bars" id="menu"></i>
			<i class="fas fa-search"></i>
			<i class="fas fa-heart"></i>
			<i class="fas fa-shopping-cart"></i>
			<a href="signin.php"><i class="fas fa-user"></i> </a>
			
		</div>
</header>
       

<div class="signup_page">
<div class="title">Welcome dear user ! </div>
<form id="myf" action="" method="POST">
      <div class="input_box">
        <input type="text" placeholder="Username" name="username" id="usern" >
        <div class="icon"><i class="fas fa-user"></i></div>
        <p  style="color : red; text-align:center; " id="error1"></p>
      </div>
      
      <div class="input_box">
        <input type="password" placeholder="Password" name="pw" id="pass">
        <div class="icon"><i class="fas fa-lock"></i></div>
        <p id="error2" style=" text-align:center;"> </p>
      </div>
      <div class="input_box">
        <input type="password" placeholder="Confirm password"name="cpw" id="cpass" >
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
      <div class="input_box">
        <input type="email" placeholder="example@gmail.com " name="em" id="emai">
        <div class="icon"><i class="fa fa-envelope" ></i></div>
      </div>
      <div class="input_box">
      <div class="icon"><i class="fas fa-user"></i></div>
    <select name="usertype" id="ch">
        <option id="ad" name="adm" value="admin" >Admin </option>
        <option id="cus" name="cust" value="customer">Customer </option>
        <option id="emp" name="empl" value ="employee">Employee</option>
     
      </select>
</div>
     <div class="input_boxx">
        <p style="color: grey"> Import your profile image</p></br>
      <input type="file" name="image" id="f"  class="box"accept="image/jpg, image/jpeg, image/png" >
</div>
      <div class="option_div">
        <div class="check_box">
          <input type="checkbox">
          <span>Remember me</span>
        </div>
        
      </div>

        <button type="submit" class="btn" onClick="passValidation()">Sign up!</button>
      
      <div class="sign_up">
        Already a member ? <a href="signin.php">Sign in now</a>
      </div>
      <script src="../assets/js/controle.js"> </script>
    </form>
</div>  



<script>
        $(document).ready(function() {
            $(".select").on('change',function() {
                var value = $("#myselection option:selected");
                alert(value.text());
            });
        });
    </script>
</body>
</html>






    
  






