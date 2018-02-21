<html>
<head>
<title>Modify Cart</title>
</head>
<body>
<?php
//post variables
$productId = $_POST["productId"];
$quantity = $_POST["quantity"];
$mode = $_POST["mode"];

session_start();
//check if we are logged in before trying to add to cart
if(!isset($_SESSION["u_id"])){
	$_SESSION["cart"] = "ok";
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/products.php\" />"; 
}
//try to add to cart
else{
	$userId = $_SESSION["u_id"];
	//check if the user set a positive number
	if($quantity < 0){
		$_SESSION["stock"] = "negative";
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/cart.php\" />"; 
	}

	include "config.php";
	$con=mysqli_connect($website,$login,$password,$database);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	
	//get stock information
	$sqlStock= "SELECT stock FROM product WHERE product.id = '$productId'";	
	$result = mysqli_query($con,$sqlStock);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	$object = mysqli_fetch_object($result);
	$objectStock = $object->stock;
	$stockError = false;
	
	//add to cart from product page
	if($mode == "1"){
		$sqlFind= "SELECT * FROM cart WHERE cart.user_id = '$userId' AND cart.product_id = '$productId' ";	
		$result = mysqli_query($con,$sqlFind);
		if (!$result){
			die('Error: ' . mysqli_error($con));
		}
		$object = mysqli_fetch_object($result);
		if(!$object){
			//if object not already in cart
			if($quantity > $objectStock){
				$stockError = true;
			}
			else{
				$sqlInsert="INSERT INTO cart (user_id, product_id, quantity) VALUES ('$userId', '$productId', '$quantity')";
				if (!mysqli_query($con,$sqlInsert)){
					die('Error: ' . mysqli_error($con));
				}
			}

		}
		else{
			//if object already in cart 
			$total = $quantity + $object->quantity;
			if($total > $objectStock){
				$stockError = true;
			}
			else{
				$sqlUpdate = "UPDATE cart SET quantity = '$total' WHERE cart.user_id = '$userId' AND cart.product_id = '$productId'";
				if (!mysqli_query($con,$sqlUpdate)){
					die('Error: ' . mysqli_error($con));
				}
			}
		}
		mysqli_close($con);
		//save errors for next page if any
		if($stockError == true){
			$_SESSION["stock"] = "ok";
		}
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/cart.php\" />"; 
		
	}
	//add to cart from cart page
	if($mode == "2"){
		if($quantity == 0){
			//if we set 0 or that we remove from cart
			$sqlRemove = "DELETE FROM cart WHERE cart.user_id = '$userId' AND cart.product_id = '$productId' ";
			$result = mysqli_query($con,$sqlRemove);
			if (!$result){
				die('Error: ' . mysqli_error($con));
			}
		}
		else{
			//if we update the value in the cart
			$sqlUpdate = "UPDATE cart SET quantity = '$quantity' WHERE cart.user_id = '$userId' AND cart.product_id = '$productId'";
			if($quantity > $objectStock){
				$stockError = true;
			}
			else{
				if (!mysqli_query($con,$sqlUpdate)){
					die('Error: ' . mysqli_error($con));
				}
			}
		}
		mysqli_close($con);
		
		//save errors for next page if any
		if($stockError == true){
			$_SESSION["stock"] = "ok";
		}
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/cart.php\" />"; 
	}
}

?>
</body>
</html>