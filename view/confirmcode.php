<?php
session_start();
include '../connect.php';
if($_SESSION['email_state']!=1){
    header("location:../index.php");
}
if (isset($_POST['code_reset']))
{
    if (empty($_POST['cd'])){

  $msg='No code detected';
    }
    else {
       $code=$_POST['cd'];
        $db=connect::getConnexion();
        $query = $db->prepare("SELECT * FROM reset where code = ?");
        $query->execute([$code]);
        $row = $query->rowCount();
    
        if($row == 1){
            header("location:resetpw.php");
    }
    else {$msg='Incorrect code';}
}
}



?>
<img src="../assets/images/backg.jpg" class="backg">
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<!-- custom css file link -->
	

	<!-- Link Swiper's CSS -->
    <link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css"/>
    <link rel="stylesheet" type="text/css" href="../assets/style/stylish.css">
</head>
<body> 
 
  <img src="../assets/images/backg.jpg" class="backg">
  <header>
		<a href="signin.php" class="logo"><img src="../assets/images/logo.png"></a>
       
		<nav class="navbar">
			<a href="../index.php" class="active">home</a>
			<a href="../index.php#about">about</a>
			<a href="../index.php#menu">menu</a>
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
       

<div class="signin_page">
<div class="title">We're close ! </div>
     

<form action="confirmcode.php" method="POST">
      <div class="input_box">
        
      <input type="text" placeholder="Enter your code" name ="cd">
        <div class="icon"><i class="fas fa-lock"></i></div>
</div>
 


        <button type="submit" name="code_reset"class="btn">Confirm !</button>
      <a href="checkmail.php"  class="btn">Back</a>

       
    </form>


</body>
</html>
