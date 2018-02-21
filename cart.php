<html>
<head>
	<link rel="stylesheet" type="text/css" href="vendors/css/normalize.css"> 
    <link rel="stylesheet" type="text/css" href="vendors/css/grid.css">
    <link rel="stylesheet" type="text/css" href="vendors/css/ionicons.min.css"> 
    <link rel="stylesheet" type="text/css" href="css/cards_css.css">
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

	<title>Cart</title>
</head>
<body>

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
		echo "<center style=\"font-size:2rem;\"><br> Error : User doesnt seem to exist </br></center>";
	}
	else{
		echo "<header style=\"background-image: none; height:190px; background-color: #333;\"><nav><div class=\"row\"><img src=\"resources/img/cheese_white.png\" alt=\"personal logo\" class=\"logo\"><ul class=\"main-nav\">";
		echo "<li style=\"color:white;\"> Hi $object->first_name $object->last_name,</li>";
		echo "<li style=\"color:white;\">Logged in as: <a href=\"http://localhost/ecommerce/account.php\"> $object->username</a></li>";
		echo "<li> <a href=\"http://localhost/ecommerce/products.php\">Shop</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/searchArticles.php\">Search</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/logout.php\">Logout</a></li>";
		echo "</ul></div></nav></header>";
	
	}

}
echo "<div class=\"card-50 flex-content\" style=\"padding-bottom:0; margin-bottom:0;\"><h2 align =\"center\"> Your cart</h2></div>";


//output errors and messages
if(isset($_SESSION["stock"])){
	if($_SESSION["stock"] == "ok"){
		$tmp = $_SESSION["stock"];
		echo "<center style=\"font-size:2rem;\"><br> Error, not enough stock </br></center>";
		$_SESSION["stock"] = "ko";
	}
	if($_SESSION["stock"] == "negative"){
		echo "<center style=\"font-size:2rem;><br> Error, cannot add a negative number of items to cart </br></center>";
		$_SESSION["stock"] = "ko";
	}
	if($_SESSION["stock"] == "purchase"){
		echo "<center style=\"font-size:2rem;><br> Seems that there is not enough stock to make a purchase of that quantity, the quantity in the cart has been updated </br></center>";
		$_SESSION["stock"] = "ko";
	}
}

//get all the objects in the customer's cart
$sqlFind = "SELECT * FROM cart WHERE cart.user_id = '$userId'" ;
$result = mysqli_query($con,$sqlFind);

$total = 0;


//For each object in the cart, output information
while ($object = mysqli_fetch_object($result)) {
	$productId = $object->product_id;
	$quantity = $object->quantity;
	 
	$sqlFind2 = "SELECT * FROM product WHERE product.id = '$productId'" ;
	$result2 = mysqli_query($con,$sqlFind2);
	$object2 = mysqli_fetch_object($result2);
	$imLink = $object2->image;
	$name = $object2->name;
	$description = $object2->description;
	$origin = $object2->origin;
	$weight = $object2->weight;
	$stock = $object2->stock;
	$price = $object2->price*$quantity;
	$total = $total + $price;
	$id = $object2->id;
	echo "<section class=\"section-features\"> <main role=\"main\"><article class=\"card-50\" style=\"margin-bottom:0;\"><figure><a href=\"#\" title=\"Buy\"><img src=\"$imLink\" alt=\"image of product\"></a></figure>";
	echo "<div class=\"flex-content\"><h2> $name</h2>";
	echo "	<ul>
                <li><strong title=\"Type\">Origin</strong>$origin</li>
                <li><strong title=\"availability\">Stock:</strong>$stock</li>
                <li><strong title=\"Shipping\">Weight:</strong>$weight grams</li>
                <li><strong title=\"Shipping\">Quantity:</strong>$quantity</li>
                <li><strong title=\"Shipping\">Unit price:</strong>$object2->price $</li>
				<li><strong title=\"Shipping\">Total price:</strong>$price $</li>
	        </ul>
	       	<p>$description</p>
			<form name=\"user_reg\" action=\"addToCart.php\"  method=\"post\">
				<input type=\"number\" name=\"quantity\" min=\"0\" max=\"999\" value=\"$quantity\">
				<input type=\"hidden\" name=\"productId\" value=\"$id\">
				<input type=\"hidden\" name=\"mode\" value=\"2\">
				<input type=\"submit\" name=\"sub_btn\" value=\"Update Quantity\">
			</form>	
			<form name=\"user_reg\" action=\"addToCart.php\"  method=\"post\">
				<input type=\"hidden\" name=\"productId\" value=\"$id\">
				<input type=\"hidden\" name=\"mode\" value=\"2\">
				<input type=\"hidden\" name=\"quantity\" value=\"0\">
				<input type=\"submit\" name=\"sub_btn\" value=\"Remove\">
			</form>					
	       	</div>
	        </article>  
	        </main></section>";
		
	if($quantity > $stock){
		echo "<center style=\"font-size:2rem;\"><br> Warning, not enough stock, please update quantity </br></center>";
	}
	
}	

if($total != 0){
	echo "<div class=\"card-50 flex-content\" style=\"padding-bottom:0; margin-bottom:0;\">
				<h2 align =\"center\"> Total Order Price : $total $ </h2>
				<form id=\"purchase_btn\" name=\"user_reg\" action=\"purchase.php\"  method=\"post\">
					<input type=\"submit\" name=\"sub_btn\" value=\"Purchase\">
				</form>
			</div>";
	
	
}
else{
	echo "<div class=\"card-50 flex-content\" style=\"padding-bottom:0; margin-bottom:0;\">
				<h2 align =\"center\"> Cart is Empty </h2></div>";
	
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