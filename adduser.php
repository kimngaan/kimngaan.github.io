<html>
<head>
<title>Registatrion</title>
</head>
<body>
<?php
//post variables
$userName = $_POST["username"];
$lastName= $_POST["lastname"];
$password = $_POST["password"];
$encryptedPassword = hash("sha512", $password);
$firstName = $_POST["firstname"];
$email = $_POST["email"];
session_start();

//check for empty mandatory fields
if($password == '' || $userName == '' || $firstName == '' ){
	$_SESSION["registration"] = "Make sure to type a username, password, and a first name";	
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/registration.php\" />";
}
else{
	//Add user to database
	include "config.php";
	$con=mysqli_connect($website,$login,$password,$database);
	if (mysqli_connect_errno())
	{
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$userName = mysqli_real_escape_string($con, $userName);
	$sqlInsert="INSERT INTO customer (username, password, first_name) VALUES ('$userName', '$encryptedPassword', '$firstName')";
	if (!mysqli_query($con,$sqlInsert)){
		$_SESSION["registration"] = "Error, username already in use";	
		echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/registration.php\" />";
		die();
	}
	//add non mandatory fields
	if($lastName != ''){
		$lastName = mysqli_real_escape_string($con, $lastName);
		$sqlInsert = "UPDATE customer SET last_name = '$lastName' WHERE customer.userName = '$userName'";
		if (!mysqli_query($con,$sqlInsert))
		{
		die('Error: ' . mysqli_error($con));
		}
	}

	if($email != ''){
		$email = mysqli_real_escape_string($con, $email);
		$sqlInsert = "UPDATE customer SET email = '$email' WHERE customer.userName = '$userName'";
		if (!mysqli_query($con,$sqlInsert))
		{
		die('Error: ' . mysqli_error($con));
		}
	}

	//login directly after registering
	$sqlFind= "SELECT id FROM customer WHERE customer.username = '$userName' AND customer.password = '$encryptedPassword' ";
	$result = mysqli_query($con,$sqlFind);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	$object = mysqli_fetch_object($result);
	$_SESSION["u_id"] = $object->id;
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/products.php\" />";

	mysqli_close($con);
}
?>
</body>
</html>