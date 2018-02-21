<html>
<head>
<title>Login</title>
</head>
<body>
<?php
//post variables
$userName = $_POST["username"];
$password = $_POST["password"];
$encryptedPassword = hash("sha512", $password);


//login
include "config.php";
$con=mysqli_connect($website,$login,$password,$database);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$userName = mysqli_real_escape_string($con, $userName);

$sqlFind= "SELECT id FROM customer WHERE customer.username = '$userName' AND customer.password = '$encryptedPassword' ";
$result = mysqli_query($con,$sqlFind);
if (!$result){
	die('Error: ' . mysqli_error($con));
}

$object = mysqli_fetch_object($result);
if(!$object){
	session_start();
	//login error, bad username or password
	$_SESSION["error_login"] = "error";
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/login.php\" />";
}
else{
	//successfull login
	session_start();
	$_SESSION["u_id"] = $object->id;
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/products.php\" />";
}

mysqli_close($con);
?>
</body>
</html>