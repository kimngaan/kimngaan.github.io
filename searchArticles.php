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
	function showHint(str) {
	    if (str.length == 0) { 
	        document.getElementById("txtHint").innerHTML = "";
	        return;
	    } else {
	        var xmlhttp = new XMLHttpRequest();
	        xmlhttp.onreadystatechange = function() {
	            if (this.readyState == 4 && this.status == 200) {
	                document.getElementById("txtHint").innerHTML = this.responseText;
	            }
	        };
	        xmlhttp.open("GET", "getHint.php?q=" + str, true);
	        xmlhttp.send();
	    }
	}
	</script>
	<title>Search Products</title>
</head>
<body>

<?php

session_start();
//Case where we are not logged in. give the link options
if(!isset($_SESSION["u_id"])){
	echo "<header style=\"background-image: none; height:190px; background-color: #333;\">";
	echo "<nav><div class=\"row\"><img src=\"resources/img/cheese_white.png\" alt=\"logo\" class=\"logo\"><ul class=\"main-nav\">";
	echo "<li><a href=\"http://localhost/ecommerce/login.php\">Login</a></li>";
	echo "<li><a href=\"http://localhost/ecommerce/registration.php\">Register</a></li>"; 
	echo "<li><a href=\"http://localhost/ecommerce/products.php\">Home</a></li>";
	echo "</ul></div></nav></header>";
	//show errors if any
	if(isset($_SESSION["cart"])){
		if($_SESSION["cart"] == "ok"){
			$_SESSION["cart"] = "null";
			
			echo "<center style=\"font-size:2rem;\"><br> You need to register or log in before adding to cart </br></center>";
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
		echo "<center style=\"font-size:2rem;\"><br> Error : User doesnt seem to exist. </br></center>";
		echo "";
	}
	else{
		echo "<header style=\"background-image: none; height:190px; background-color: #333;\"><nav><div class=\"row\"><img src=\"resources/img/cheese_white.png\" alt=\"personal logo\" class=\"logo\"><ul class=\"main-nav\">";
		echo "<li style=\"color:white;\"> Hello $object->first_name $object->last_name,</li>";
		echo "<li><a href=\"http://localhost/ecommerce/account.php\">$object->username</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/products.php\">Home</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/cart.php\">Cart</a></li>";
		echo "<li><a href=\"http://localhost/ecommerce/logout.php\">Logout</a></li>";
		echo "</ul></div></nav></header>";
	
	}

}
?>

<main role="main" style="width: 100%; max-width: 100%;">
  	
    <div class="flex-content" align="center">
    	<div class="card-50 flex-content" style=\"padding-bottom:0; margin-bottom:0;\">
    		<h2 align =\"center\"> Search Products</h2>
        <form>
           <p>Search For Articles:</p>
           <input type="text" onkeyup="showHint(this.value)">
		</form>
		<p><span id="txtHint"></span></p></center>
 	</div>
 
</main>
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