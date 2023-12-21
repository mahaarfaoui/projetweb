<?php
session_start();
include '../connect.php';
include 'functions.php';
require 'phpmailer/includes/PHPMailer.php';
require 'phpmailer/includes/Exception.php';
require 'phpmailer/includes/SMTP.php';
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;

error_reporting(E_ALL);
if(isset($_POST['send_link'])){

    $email = $_POST['email'];
 $_SESSION['email_state']=1;
 $_SESSION['email_reset']=$email;
 $mail= new PHPMailer();
$mail->isSMTP();
$mail->Host = "smtp.gmail.com";
$mail->SMTPAuth = "true";
$mail->SMTPSecure = "tls";
$mail->Port = "587";
$mail->Username = "firrrassssaid@gmail.com";
$mail->Password = "lnxovantqeoburym";
$mail->Subject = "Reset password from Oishi meals";
$mail->setFrom("firrrassssaid@gmail.com");
    // Check if in the database
 $db = connect::getConnexion();
    $query = $db->prepare("SELECT * FROM reset where user_email = ?");
    $query->execute([$email]);
    $row = $query->rowCount();

    if($row == 1){
        // existing user, proceed with reset password

        // generate a random code
        $code = generateRandomString();
      
        // Formulate the link
        $link = 'href="http://localhost/view/confirmcode.php?email='.$email.'&code='.$code.'"';
        $link2= '<span style="width:100%;"><a style="padding:10px 100px;border-radius:30px;background:#a8edbc;" href="http://localhost:3000/view/confirmcode.php?email='.$email.'&code='.$code.'" > Link </a></span>';


        //echo $code, $link; 

        $query_exist =  $db->prepare("SELECT * FROM reset where user_email = ?");
        $query_exist->execute([$email]);
        $from_reset = $query_exist->fetch();

        if(empty($from_reset)){
            // Save code and INSERT email in a database
            $query_insert = $db->prepare("INSERT INTO reset(id_reset, user_email, code) VALUES (NULL, ?, ?)");
            $query_insert->execute([$email, $code]);
        } else {
            // Already exist reseting attempt, switch to UPDATE the reset table instead
            $query_insert = $db->prepare("UPDATE reset SET code = ? WHERE user_email = ?");
            $query_insert->execute([$code, $email]);
        }


      
        // Send email with the link
        $mail->addAddress($email);
        $mail->Body = '
        Dear '.$email.',
        
        Please click on this link to reset your password:
        '.$link2.'

        Best wishes,
        
        Oishi meals technical stuff
    ';
        if ($mail->Send()) {
            echo"Email Sent..!";
        }
        else {
            echo "Error..!";
        }
        $mail->smtpClose();
       
         
          

       
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
 
  <img src="backg.jpg" class="backg">
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
<div class="title">We gotcha back ! </div>
<?php if(isset($msg)){echo $msg;}?>
        <?php if(isset($error)){echo $error;}?>

     

<form action="checkmail.php" method="POST">
      <div class="input_box">
        <input type="text" placeholder="Enter email address" name ="email">
        <div class="icon"><i class="fa fa-envelope"></i></div>
      </div>
      
    
     <!--<div class="input_box">
      <input type="file"   class="box"accept="image/jpg, image/jpeg, image/png" >
</div>-->
      


        <button type="submit" name="send_link"class="btn">Send reset link</button>
       <a href="signin.php"  class="btn">Back </a>

     
    </form>
</div>  

</body>
</html>












