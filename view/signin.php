<?php
session_start();
include '../connect.php';
if(isset($_POST['login']))
{
if(isset($_POST['username'])=="" or $_POST['pw']==""){
  echo"Username or Password cannot be empty";
}
else {
  $username=$_POST['username'];
  $password=$_POST['pw'];
  $db = connect::getConnexion();
  $query=$db->prepare("SELECT * FROM user WHERE username= :username AND password= :password");
  $query->bindValue(':username',$_POST['username']);
  $query->bindValue(':password',$_POST['pw']);
  $query->execute();
  $row=$query->fetch(PDO::FETCH_ASSOC);
  if($query->rowCount()>0){
    if ($row['user_type']=='admin'){

    $_SESSION['admin_id']=$row['user_id'];
    $_SESSION['username']=$username; 
    $_SESSION['user_type']='admin';
    header("location:admin.php");
  }
  else if ($row['user_type']=='customer'){

    $_SESSION['customer_id']=$row['user_id'];
    $_SESSION['username']=$username; 
    $_SESSION['user_type']='customer';
    header("location:customer.php");


  }
  else if ($row['user_type']=='employee'){

    $_SESSION['employee_id']=$row['user_id'];
    $_SESSION['username']=$username; 
    $_SESSION['user_type']='employee';
    header("location:employee.php"); 
  }else {  echo"Incorrect login data";}
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
    <title>Sign In</title>
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
			<a href="signin.php"><i class="fas fa-sign-in"></i> </a>
			
		</div>
</header>
       

<div class="signin_page">
<div class="title">Welcome dear user ! </div>
<form action="signin.php" method="POST">
      <div class="input_box">
        <input type="text" placeholder="Username" name ="username">
        <div class="icon"><i class="fas fa-user"></i></div>
      </div>
      
      <div class="input_box">
        <input type="password" placeholder="Password" name ="pw" autocomplete="off">
        <div class="icon"><i class="fas fa-lock"></i></div>
      </div>
     <!--<div class="input_box">
      <input type="file"   class="box"accept="image/jpg, image/jpeg, image/png" >
</div>-->
      <div class="option_div">
        <div class="check_box">
          <input type="checkbox">
          <span>Remember me</span>
        </div>
        <div class="forget_div">
          <a href="checkmail.php">Forgot password?</a>
        </div>
      </div>


        <button type="submit" name="login"class="btn">Sign in!</button>

      <div class="sign_up">
        Not a member? <a href="signup.php">Sign up now</a>
      </div>
    </form>
</div>  

</body>
</html>












