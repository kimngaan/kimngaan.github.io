<html>
<head>
	<link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"> 
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"> 
    <link rel="stylesheet" type="text/css" href="resources/css/style.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
		    $("input").focus(function(){
		        $(this).css('background-color', '#ccffff');
		    });
		});
		$(document).ready(function(){
		    $("input").blur(function(){
		        $(this).css('background-color', 'transparent');
		    });
		});
	</script>
	
	<title>Account</title>
</head>
<body>
<?php
session_start();

//check if we are logged in
if(!isset($_SESSION["u_id"])){
	echo "<meta http-equiv=\"refresh\" content=\"0; url=http://localhost/ecommerce/products.php\" />"; 
}
else{
	$userId = $_SESSION["u_id"];

	//get user information
	include "config.php";
	$con=mysqli_connect($website,$login,$password,$database);
	if (mysqli_connect_errno()){
		echo "Failed to connect to MySQL: " . mysqli_connect_error();
	}
	$sqlFind= "SELECT * FROM customer WHERE customer.id = '$userId' ";	
	$result = mysqli_query($con,$sqlFind);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	$object = mysqli_fetch_object($result);
	$username = $object->username;
	$firstname = $object->first_name;
	$lastname = $object->last_name;
	$email = $object->email;
	$addressNumber = $object->address_number;
	$addressStreet = $object->address_street;
	$addressZipCode = $object->address_zip_code;
	$addressCity = $object->address_city;
	$addressState = $object->address_state;
	$addressCountry = $object->address_country;
	
	echo "<header style=\"height:180%;\"><nav><div class=\"row\"><img src=\"resources/img/cheese_white.png\" alt=\"personal logo\" class=\"logo\"><ul class=\"main-nav\">";
	echo "<li style=\"color:white;\"> Hello $object->first_name $object->last_name,</li>";
	echo "<li><a href=\"http://localhost/ecommerce/products.php\">Home</a></li>";
	echo "<li><a href=\"http://localhost/ecommerce/logout.php\">Logout</a></li>";
	echo "</ul></div></nav>";
		
	
	//output messages or errors
	echo "<div class=\"card-50 flex-content\" style=\"padding-bottom:0; margin-bottom:0; color:white;;\"><h2 align =\"center\"> Your Account Info</h2></div>";
	if(isset($_SESSION["update"])){
		if($_SESSION["update"] == "ok"){
			echo "<div class=\"row\" align=\"center\" style=\"padding-bottom:15px; margin-bottom:0; font-size: 1.1rem; color: white;\"><p>Account Succesfully updated </p></div>";
			$_SESSION["update"] = "null";
		}
		else if($_SESSION["update"] == "ko"){
			echo "<div class=\"row\" align=\"center\" style=\"padding-bottom:15px; margin-bottom:0; font-size: 1.1rem; color: white;\"><p>Error in account update, make sure the first name is not empty </p></div>";
			$_SESSION["update"] = "null";		
		}
		if($_SESSION["update"] == "purchase"){
			echo "<div class=\"row\" align=\"center\" style=\"padding-bottom:15px; margin-bottom:0; font-size: 1.1rem; color: white;\"><p>Purchase Successfull, thank you for shopping with use </p></div>";
			$_SESSION["purchase"] = "null";
		}
	}
	
	echo "<div class=\"row\" style=\"padding-bottom:0; margin-bottom:0; font-size: 1.1rem; color: white;\"><h3 align =\"center\"> Your orders</h3></div>";

	//get all the objects in the customer's orders
	$sqlFind = "SELECT * FROM order_history WHERE order_history.customer_id = '$userId' ORDER BY order_history.date DESC" ;
	$result = mysqli_query($con,$sqlFind);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	echo "<div class=\"row\" style=\"padding-bottom:0; margin-bottom:0; font-size: 1.1rem; color: white;\">";
	echo "<center><table style=\"width:60%; padding-top:15px; padding-bottom: 15px; color:#d9d9d9;\">";
	echo "<tr><th><b><p>Date</p><b></th><th><b><p>Product</p><b></th><th><b><p>Quantity</p><b></th><th><b><p>Price</p><b></th></tr>";
	//For each object in the cart, output information
	while ($object = mysqli_fetch_object($result)) {
		$productId = $object->product_id;
		$quantity = $object->quantity;
		$date = $object->date;
		 
		$sqlFind2 = "SELECT * FROM product WHERE product.id = '$productId'" ;
		$result2 = mysqli_query($con,$sqlFind2);
		$object2 = mysqli_fetch_object($result2);
		$productName = $object2->name;

		$price = $object->total_price;
		echo "<tr>";
		echo "<th> $date </th>";
		echo "<th> $productName </th>";
		echo "<th> $quantity </th>";
		echo "<th> $price $ </th>";
		
		echo "</tr>";
	}
	echo "</table></center></div>";
}

mysqli_close($con);

?>
<div class="card-50 flex-content" style="padding-bottom:0; margin-bottom:0; font-size: 1.1rem;">
			<h3 align ="center" style="color:white;"> Update Account Info - Username : <?php echo $username; ?> </h3>

</div>";

<div class="row" >
	<form name="user_reg" action="update.php" method="post">
		<div class="col span-1-of-3 login">
         	<input type="hidden" name="mode" value="1">
         	<label for="" style="color:white;" > Firstname </label>                   
        </div>
                    
        <div class="col span-1-of-3 " >
            <input style="width:80%;"type="text" name="firstname" value="<?php echo $firstname; ?>">
        </div>
        <div class="col span-1-of-3">
            <input style="width:30%" type="submit" name="sub_btn" value="update">
        </div>
	</form>
</div>
<div class="row" >
	<form name="user_reg" action="update.php" method="post">
		<div class="col span-1-of-3 login">
				<input type="hidden" name="mode" value="2">
				<label for="" style="color:white;" > Lastname </label>
		</div>
		<div class="col span-1-of-3 " >
				<input style="width:80%;" type="text" name="lastname" value="<?php echo $lastname; ?>">
		</div>
		<div class="col span-1-of-3 " >
				<input style="width: 30%" type="submit" name="sub_btn" value="update">
		</div>
	</form>
</div>
<div class="row" >
	<form name="user_reg" action="update.php" method="post">
		<div class="col span-1-of-3 login">
			<input type="hidden" name="mode" value="3">
			<label for="" style="color:white;" > Email </label>
		</div>
		<div class="col span-1-of-3 " >
				<input style="width:80%;" type="text" name="email" value="<?php echo $email ?>">
		</div>
		<div class="col span-1-of-3 " >
			<input style="width: 30%" type="submit" name="sub_btn" value="update">
		</div>
	</form>
</div>
<div class="row" >	    
	 <form name="user_reg" action="update.php" method="post">
	 	<input type="hidden" name="mode" value="4">
	 	<h3 align ="center" style="color:white;"> Update Your Address </h3>
	 	
		 	<div class="row">
		 		<div class="col span-1-of-3 login">
		 			<label for="" style="color:white;" > Number : </label>
				</div>
				<div class="col span-2-of-3">
					<input class="update_box" type="number" name="addressNumber" min="1" value="<?php echo $addressNumber ?>">
				</div>
			</div>
			<div class="row">
		 		<div class="col span-1-of-3 login">
		 			<label for="" style="color:white;" > Street : </label>
				</div>
				<div class="col span-2-of-3">
					<input style="width:40%;" type="text" name="addressStreet" value="<?php echo $addressStreet ?>">
				</div>
			</div>
			<div class="row">
		 		<div class="col span-1-of-3 login">
		 			<label for="" style="color:white;" > Zip Code : </label>
				</div>
				<div class="col span-2-of-3">
					<input class="update_box" type="number" name="addressZipCode" min="1" value="<?php echo $addressZipCode ?>">
				</div>
			</div>
			<div class="row">
		 		<div class="col span-1-of-3 login">
		 			<label for="" style="color:white;" > City : </label>
				</div>
				<div class="col span-2-of-3">
					<input style="width:40%;" type="text" name="addressCity" value="<?php echo $addressCity ?>">
				</div>
			</div>
			<div class="row">
		 		<div class="col span-1-of-3 login">
		 			<label for="" style="color:white;" > State : </label>
				</div>
				<div class="col span-2-of-3">
					<input style="width:40%;" type="text" name="addressState" value="<?php echo $addressState ?>">
				</div>
			</div>
			<div class="row">
		 		<div class="col span-1-of-3 login">
		 			<label for="" style="color:white;" > Country : </label>
				</div>
				<div class="col span-2-of-3">
					<input style="width:40%;" type="text" name="addressCountry" value="<?php echo $addressCountry ?>">
				</div>
			</div>
			<div class="row">
		 		<div class="col span-1-of-3">
		 			
				</div>
				<div class="col span-1-of-3">
		 				<input type="submit" name="sub_btn" value="update"></label>	
				</div>
				<div class="col span-1-of-3">
		 			
				</div>
			</div>
	</form>
</div>
</header>

<footer>
    <div class="row">
        <div class="col span-1-of-2">
            <ul class="footer-nav">
                <li><a href="http://localhost/ecommerce/index.php#about"> About us </a></li>
                <li><a href="#"> Blog </a></li>
                <li><a href="#"> Press </a></li>
                <li><a href="#"> iOS App </a></li>
                <li><a href="#"> Android App </a></li>
            </ul>
        </div>

        <div class="col span-1-of-2">
            <ul class="social-links">
                <li><a href="#"> <i class="ion-social-facebook"></i> </a></li>
                <li><a href="#"> <i class="ion-social-twitter"></i> </a></li>
                <li><a href="#"> <i class="ion-social-googleplus"></i> </a></li>
                <li><a href="#"> <i class="ion-social-instagram"></i> </a></li>
                
            </ul>
        </div>
    </div>

    <div class="row">
        <p> Copyright @copy; 2017 by Cheese Co. Group </p>
    </div>
</footer>
        
</body>
</html>