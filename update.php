<html>
<head>
<title>Update Profile</title>
</head>
<body>
<?php
$error = false;
session_start();

//check if we are logged in
if(!isset($_SESSION["u_id"])){
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/products.php\" />"; 
}
else{
	
	//update profile
	$mode = $_POST["mode"];
	$userId = $_SESSION["u_id"];


	include "config.php";
	$con=mysqli_connect($website,$login,$password,$database);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	

	switch($mode){
		case 1://update firstname
			$firstname = $_POST["firstname"];
			$firstname = mysqli_real_escape_string($con, $firstname);
			if($firstname == ""){
					$error = true;
			}
			else{
				$sqlUpdate = "UPDATE customer SET first_name = '$firstname' WHERE customer.id = '$userId'";
				if (!mysqli_query($con,$sqlUpdate)){
					die('Error: ' . mysqli_error($con));
				}
			}
			break;
			
		case 2://update last name
		
			$lastname = $_POST["lastname"];
			$lastname = mysqli_real_escape_string($con, $lastname);
			$sqlUpdate = "UPDATE customer SET last_name = '$lastname' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			break;
			
		case 3://update email
			$email = $_POST["email"];
			$email = mysqli_real_escape_string($con, $email);
			$sqlUpdate = "UPDATE customer SET email = '$email' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			break;
		
		case 4://update address
			$addressNumber = $_POST["addressNumber"];
			$addressStreet = $_POST["addressStreet"];
			$addressStreet = mysqli_real_escape_string($con, $addressStreet);
			$addressZipCode = $_POST["addressZipCode"];
			$addressCity = $_POST["addressCity"];
			$addressCity = mysqli_real_escape_string($con, $addressCity);
			$addressState = $_POST["addressState"];
			$addressState = mysqli_real_escape_string($con, $addressState);
			$addressCountry = $_POST["addressCountry"];
			$addressCountry = mysqli_real_escape_string($con, $addressCountry);
			$sqlUpdate = "UPDATE customer SET address_number= '$addressNumber' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			$sqlUpdate = "UPDATE customer SET address_street= '$addressStreet' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			$sqlUpdate = "UPDATE customer SET address_zip_code= '$addressZipCode' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			$sqlUpdate = "UPDATE customer SET address_city= '$addressCity' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			$sqlUpdate = "UPDATE customer SET address_state= '$addressState' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			$sqlUpdate = "UPDATE customer SET address_country= '$addressCountry' WHERE customer.id = '$userId'";
			if (!mysqli_query($con,$sqlUpdate)){
				die('Error: ' . mysqli_error($con));
			}
			break;
			
		default:
			
		
	}
	mysqli_close($con);
	if($error == true){
		$_SESSION["update"] = "ko";
	}
	else{
		$_SESSION["update"] = "ok";
	}
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/account.php\" />"; 

}


?>
</body>
</html>