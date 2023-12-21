<?php 
session_start();
include('../../connect.php');
if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>alert("Item Removed")</script>';
				echo '<script>window.location="panier.php"</script>';
			}
		}
	}
}

?>
<!DOCTYPE html>
<html>
	<head>
		<title>Food Cart</title>
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>
		<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>
		<style>
div{
font-weight:bold;
}

p{
font-size:x-large;
font-weight:normal;
}
body {
    font-family: "Helvetica Neue",Helvetica,Arial,sans-serif;
    font-size: 17px;
    line-height: 1.1;
    color: black;
    background-color: black;
}
element.style {
    background-color: 808080;
    padding: 16px;
}
.text-danger {
    color: black;
}
.table-bordered>tbody>tr>td, .table-bordered>tbody>tr>th, .table-bordered>tfoot>tr>td, .table-bordered>tfoot>tr>th, .table-bordered>thead>tr>td, .table-bordered>thead>tr>th {
    border: 1px solid #0b0202;
}
a{
    color: #da0048;
    text-decoration: none;
}
</style>
<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Welcome to Oishī Meals...</title>
	<link rel="stylesheet" type="text/css" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

	<!-- custom css file link -->
	<link rel="stylesheet" type="text/css" href="../../assets/style/stylish.css">

	<!-- Link Swiper's CSS -->
	<link rel="stylesheet" href="https://unpkg.com/swiper/swiper-bundle.min.css">
	<link rel="shortcut icon" type="x-icon" href="assets/images/logo.png">
	</head>
	<body>
		
	<header>
		<a href="#" class="logo"><img src="../../assets/images/logo.png"></a>

		<nav class="navbar">
			<a href="../../index.php" class="active">home</a>
			<a href="#about">about</a>
			<a href="view/home.php">menu</a>
			<a href="#team">team</a>
			<a href="#reservation">reservation</a>
			<a href="#blog">blog</a>

		</nav>


		<div class="icons">
			<i class="fas fa-bars" id="menu"></i>
			<i class="fas fa-search"></i>
			<i class="fas fa-heart"></i>
			<i class="fas fa-shopping-cart"></i>
			<a href="view/signin.php"><i class="fas fa-sign-in"></i> </a>

		</div>
	</header>
		
     
		<div class="container">
			<br />
			<br />
			<br />
			<h3 align="center"> <b title="Food Cart">Choose Your Dishes</b></h3><br />
			<br /><br />


			<h3>Order Details</h3>
			<div class="table-responsive">
				<table class="table table-bordered">
					<tr>
						<th width="40%">Item Name</th>
						<th width="10%">Quantity</th>
						<th width="20%">Price</th>
						<th width="15%">Total</th>
						<th width="5%">Action</th>
					</tr>
					<?php
					if(!empty($_SESSION["shopping_cart"]))
					{
						$total = 0;
						foreach($_SESSION["shopping_cart"] as $keys => $values)
						{
					?>
					<tr>
						<td><?php echo $values["item_name"]; ?></td>
				
						<td><?php echo $values["item_quantity"]; ?></td>
						<td>$ <?php echo $values["item_price"]; ?></td>
						<td>$ <?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
						<td><a href="panier.php?action=delete&id=<?php echo $values["item_id"]; ?>"><span class="text-danger">Remove</span></a></td>
					</tr>
					<?php
							$total = $total + ($values["item_quantity"] * $values["item_price"]);
						}
					?>
					<tr>
						<td colspan="3" align="right">Total</td>
						<td align="right">$ <?php echo number_format($total, 2); ?></td>
						<td></td>
					</tr>
					<div class="checkout-btn">
                       <b> <a href="views/adding.php" class="btn <?= ($grand_total > 1)?'':' '; ?>">Proceed To Checkout</a> </b>
                    </div>
					<?php
					}
					?>
						
				</table>
				
			</div>
		</div>
	</div>
	</div>
<style>element.style {
    background-color: 808080;
    padding: 16px;
}
</style>
	
			<?php
			                                $connect = mysqli_connect("localhost","root","","projetweb");

				$query = "SELECT * FROM products ORDER BY id ASC";
				$result = mysqli_query($connect, $query);
				if(mysqli_num_rows($result) > 0)
				{
					while($row = mysqli_fetch_array($result))
					{
				?>
			<div class="col-md-4">
				<form method="post" action="panier.php?action=add&id=<?php echo $row["id"]; ?>">
					<div style="background-color:#d8b584; border-radius:5px; padding:16px;" align="center">
                   
                    

						<h4 class="text-info"><?php echo $row["name"]; ?></h4>

						<h4 class="text-danger">$ <?php echo $row["price"]; ?></h4>

						<input type="text" name="quantity" value="1" class="form-control" />

                        <input type="hidden" name="image" value="<?php echo $row["image_01"];  ?>">


						<input type="hidden" name="hidden_name" value="<?php echo $row["name"]; ?>" />

						<input type="hidden" name="hidden_price" value="<?php echo $row["price"]; ?>" />



                        <input type="submit" name="add_to_cart" style="margin-top:5px;" class="btn btn-success" value="Add to Cart">
					</div>
				</form>
			</div>
			<?php
					}
				}
			?>
			<div style="clear:both"></div>
			<br />
			
					<body>

<div class="background-image"> </div>

</body>


<style>
*{

margin: 0;
padding: 0;


}



<?php

//If you have use Older PHP Version, Please Uncomment this function for removing error 

/*function array_column($array, $column_name)
{
	$output = array();
	foreach($array as $keys => $values)
	{
		$output[] = $values[$column_name];
	}
	return $output;
}*/
?>