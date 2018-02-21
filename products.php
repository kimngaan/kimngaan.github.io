<html>
<head>
	<link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"> 
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"> 
    
    <link rel="stylesheet" type="text/css" href="css/cards_css.css">
    <link href="https://fonts.googleapis.com/css?family=Lato:100,300,300i,400" rel="stylesheet">
    <title> Shop</title>

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

</head>
<body>

<?php

session_start();
//Case where we are not logged in. give the link options
if(!isset($_SESSION["u_id"])){
	echo "<header style=\"background-image: none; height:190px; background-color: #333;\">";
	echo "<nav><div class=\"row\"><img src=\"resources/img/cheese_white.png\" alt=\"logo\" class=\"logo\"><ul class=\"main-nav\">";
	echo "<li> <a href=\"http://localhost/ecommerce/index.php\">Home</a></li>";             
	echo "<li> <a href=\"http://localhost/ecommerce/login.php\">Login</a></li>";
	echo "<li> <a href=\"http://localhost/ecommerce/registration.php\">Register</a></li>"; 
	echo "<li> <a href=\"http://localhost/ecommerce/searchArticles.php\">Search</a></li>";
	echo "</ul></div></nav></header>";
	//show errors if any
	if(isset($_SESSION["cart"])){
		if($_SESSION["cart"] == "ok"){
			$_SESSION["cart"] = "null";
			echo "<h2 align=\"center\" style=\"font-size:2em\"> You need to register or log in before adding to cart </h2>";
		}
	}
}

include "config.php";
$con=mysqli_connect($website,$login,$password,$database);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}

//if we are logged in output different links
if(isset($_SESSION["u_id"])){
	$userId = $_SESSION["u_id"];
	$sqlFind= "SELECT * FROM customer WHERE customer.id = '$userId' ";
	
	$result = mysqli_query($con,$sqlFind);
	if (!$result){
		die('Error: ' . mysqli_error($con));
	}
	$object = mysqli_fetch_object($result);
	if(!$object){
		echo "<h2 align=\"center\" style=\"font-size:2em\">Error : User doesnt seem to exist</h2>";
	}
	else{
		echo "<header style=\"background-image: none; height:190px; background-color: #333;\">";
		echo "<nav><div style=\"margin-left:20px; max-width: 95%;\" class=\"row\"><img src=\"resources/img/cheese_white.png\" alt=\"personal logo\" class=\"logo\"><ul class=\"main-nav\">";
		echo "<li style=\"color:white;\">Hi $object->first_name $object->last_name,</li>";
		echo "<li><a href=\"http://localhost/ecommerce/account.php\">Your account</a></li>";
		echo "<li> <a href=\"index.php\"> Home </a> </li>";
		echo "<li><a href=\"http://localhost/ecommerce/searchArticles.php\">Search</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/cart.php\">Cart</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/logout.php\">Logout</a></li>";
		
		echo "</ul></div></nav></header>";
	
	}

}
echo "<div class=\"card-50 flex-content\" style=\"padding-bottom:0; margin-bottom:0;\"><h2 align =\"center\"> Products</h2></div>";

//go through ALL the products in the database
$sqlFind = "SELECT * FROM product";
$result = mysqli_query($con,$sqlFind);

//for each product we output information
 while ($object = mysqli_fetch_object($result)) {
 	$imLink = $object->image;
	echo "<section class=\"section-features\"> <main role=\"main\"><article class=\"card-50\"><figure><a href=\"#\" title=\"Buy\"><img src=\"$imLink\" alt=\"image of product\"></a></figure>";
	$name = $object->name;
	$description = $object->description;
	$origin = $object->origin;
	$stock = $object->stock;
	$weight = $object->weight;
	$price = $object->price;
	$id = $object->id;
	echo "<div class=\"flex-content\"><h2> $name</h2>";

	echo "<ul>
                        <li><strong title=\"Type\">Origin</strong>$origin</li>
                        <li><strong title=\"availability\">Stock:</strong>$stock</li>
                        <li><strong title=\"Shipping\">Weight:</strong>$weight grams</li>
                        <li><strong title=\"Shipping\">Price:</strong>$price $</li>
                    </ul>
                   <p>$description</p>
                   	<form name=\"user_reg\" action=\"addToCart.php\"  method=\"post\" align =\"right\">
                    	<input type=\"number\" name=\"quantity\" min=\"1\" max=\"999\" value=\"1\">
                    	<input type=\"submit\" name=\"sub_btn\" value=\"Add to Cart\">
                    	<input type=\"hidden\" name=\"productId\" value=\"$id\">
                    	<input type=\"hidden\" name=\"mode\" value=\"1\">
                    </form>
                </div>
            </article>  
            </main></section>";
	

}
	
	
mysqli_close($con);	


?>
<footer style="background-color: #333; padding: 15px; font-size: 80%;">
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
        <p style="color: #888; text-align: center; margin-top: 20px;"> Copyright @copy; 2017 by Cheese Co. Group </p>
    </div>
</footer>
        
    
</body>
</html>