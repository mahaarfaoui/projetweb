<?php
session_start();
include '../connect.php';
if($_SESSION['email_state']!=1){
    header("location:../index.php");
}

if(isset($_POST['reset'])){
    if(empty($_POST['npw'])||empty($_POST['cnpw']))
    {
        $msg='Please fill the inputs';
    }
  
    else {
     $email=$_SESSION['email_reset'];
     $newpassword=$_POST['npw'];
     $cnewpassword=$_POST['cnwp'];
     $db=connect::getConnexion();
     $query = $db->prepare("UPDATE user SET password = ? WHERE email = ?");
     $query->execute([$newpassword, $email]);
     session_unset();
     session_destroy();
     header("location:signin.php");
    }
}




















?>
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
    <link rel="shortcut icon" type="x-icon" href="../assets/images/logo.png">
</head>
<body> 
 
  <img src="../assets/images/backg.jpg" class="backg">
  <header>
		<a href="" class="logo"><img src="../assets/images/logo.png"></a>
       
		<nav class="navbar">
			<a href="index.php" class="active">home</a>
			<a href=" index.php#about">about</a>
			<a href=" index.php#menu">menu</a>
			<a href="index.php#team">team</a>
			<a href="index.php#reservation">reservation</a>
			<a href="index.php#blog">blog</a>
			
		</nav>

		<div class="icons">
			<i class="fas fa-bars" id="menu"></i>
			<i class="fas fa-search"></i>
			<i class="fas fa-heart"></i>
			<i class="fas fa-shopping-cart"></i>
			<a href="signin.php"><i class="fas fa-sign-in"></i> </a>
			
		</div>
</header>
       

<div class="signin_page">
<div class="title">One last step mate ! </div>
<?php if(isset($msg)){echo $msg;}?>
        <?php if(isset($error)){echo $error;}?>

     

<form action="resetpw.php" method="POST">
      <div class="input_box">
        <input type="password" placeholder="New Password" name ="npw">
        <div class="icon"><i class="fas fa-lock"></i></div>
</div>
 <div class="input_box">
      <input type="password" placeholder="Confirm New Password" name="cnpw">
      <div class="icon"> <i class=" fas fa-lock"></i></div>
      </div>  



        <button type="submit" name="reset"class="btn">Reset Password !</button>
      <a href="checkmail.php"  class="btn">Back</a>

       
    </form>


</body>
</html>
