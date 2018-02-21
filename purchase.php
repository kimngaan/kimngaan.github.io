<?php

session_start();
//check if we are logged in
if(!isset($_SESSION["u_id"])){	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/products.php\" />";
}

include "config.php";
$con=mysqli_connect($website,$login,$password,$database);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

if(isset($_SESSION["u_id"])){
	
	//get customer info
	$userId = $_SESSION["u_id"];
	$sqlFind= "SELECT * FROM customer WHERE customer.id = '$userId' ";
	
	$result = mysqli_query($con,$sqlFind);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	$object = mysqli_fetch_object($result);
	if(!$object){
		echo "Error : User doesnt seem to exist";
	}

}

//get all the objects in the customer's cart
$sqlFind = "SELECT * FROM cart WHERE cart.user_id = '$userId'" ;
$result = mysqli_query($con,$sqlFind);
if (!$result){
	die('Error: ' . mysqli_error($con));
}
$stockOk = True;
//check stock
while ($object = mysqli_fetch_object($result)) {
	$productId = $object->product_id;
	$quantity = $object->quantity;
	$sqlFind2 = "SELECT * FROM product WHERE product.id = '$productId'";
	$result2 = mysqli_query($con,$sqlFind2);
	$object2 = mysqli_fetch_object($result2);
	$stock = $object2->stock;
	if($quantity > $stock){
		$stockOk = False;
		$upd = "UPDATE cart SET quantity = '$stock' WHERE cart.user_id = '$userId' AND cart.product_id = '$productId'";
		if (!mysqli_query($con,$upd)){
			die('Error: ' . mysqli_error($con));
		}
	}
}
if($stockOk == False){
	
	$_SESSION["stock"] = "purchase";
	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/cart.php\" />"; 
}

//get all the objects in the customer's cart to update DBs
$sqlFind = "SELECT * FROM cart WHERE cart.user_id = '$userId'" ;
$result = mysqli_query($con,$sqlFind);
if (!$result){
	die('Error: ' . mysqli_error($con));
}

while ($object = mysqli_fetch_object($result)) {
	$productId = $object->product_id;
	$quantity = $object->quantity;

	$sqlRemove = "DELETE FROM cart WHERE cart.user_id = '$userId' AND cart.product_id = '$productId';";
	$result2 = mysqli_query($con,$sqlRemove);
	if (!$result2){
		die('Error: ' . mysqli_error($con));
	}
	
	$sqlFind2 = "SELECT * FROM product WHERE product.id = '$productId'";
	$result2 = mysqli_query($con,$sqlFind2);
	$object2 = mysqli_fetch_object($result2);
	$stock = $object2->stock;
	$stock = $stock - $quantity;
	$price = $object2->price * $quantity;
	$upd = "UPDATE product SET stock = '$stock' WHERE product.id = '$productId'";
	if (!mysqli_query($con,$upd)){
			die('Error: ' . mysqli_error($con));
	}
	
	$sqlInsert="INSERT INTO order_history (product_id, customer_id, quantity, total_price) VALUES ('$productId', '$userId','$quantity','$price')";
	if (!mysqli_query($con,$sqlInsert)){
		die('Error: ' . mysqli_error($con));
	}
}

$_SESSION["update"] = "purchase";
echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/account.php\" />"; 
?>