<style>
th#t01 {
    width: 20%;    
}
th#t03 {
    width: 30%;    
}
</style>

<?php
//we need to get an array with all the product names
include "config.php";
$con=mysqli_connect($website,$login,$password,$database);
if (mysqli_connect_errno()){
	echo "Failed to connect to MySQL: " . mysqli_connect_error();
}
$a = array();
$sqlFind = "SELECT * FROM product";
$result = mysqli_query($con,$sqlFind);
 while ($object = mysqli_fetch_object($result)) {
	 $tmp = $object->name;
	 $tmp = strtolower($tmp);
	 $a[] = $tmp;
 }
 
// get the q parameter from URL
$q = $_REQUEST["q"];

// lookup all hints from array if $q is different from ""
$hints = array();
if ($q !== "") {
    $q = strtolower($q);
    $len=strlen($q);
    foreach($a as $name) {
        if (stristr($q, substr($name, 0, $len))) {
            $hints[] = $name;
        }
    }
}
$len = sizeof($hints);

echo "<table style=\"width:100%\">";
for($i = 0; $i < $len; $i++){
	$sqlFind = "SELECT * FROM product WHERE product.name='$hints[$i]'";
	$result = mysqli_query($con,$sqlFind);
	if($object = mysqli_fetch_object($result)){
			echo "<tr>";
	echo "<table style=\"width:100%\">";
	echo "<tr>";
	$name = $object->name;
	$description = $object->description;
	$origin = $object->origin;
	echo "<center><b><font size=\"5\"> $name </font></b></center>";
	
	echo "</tr>";
	echo "<tr>";
	echo "<th align =\"left\" id = \"t01\">";
	$imLink = $object->image;
	echo "<img src=\"$imLink\" alt=\"image of product\" style=\"width:304px;height:228px;\" align =\"left\">";
	echo "</th>";
	
	echo "<th align =\"left\" id = \"t02\">";
	echo "<br> $description </br>";
	echo "<br> Origin : $origin </br>";
	$stock = $object->stock;
	$weight = $object->weight;
	echo "<br> Weight : $weight grams</br>";
	echo "<br> Stock : $stock </br>";
	$price = $object->price;
	echo "<br> Price : $price $</br>";
	echo "</th>";

	echo "<th id = \"t03\">";
	$id = $object->id;
	echo "<form name=\"user_reg\" action=\"addToCart.php\"  method=\"post\" align =\"right\">";
	echo "<input type=\"number\" name=\"quantity\" min=\"1\" max=\"999\" value=\"1\">";
	echo "<input type=\"hidden\" name=\"productId\" value=\"$id\">";
	echo "<input type=\"hidden\" name=\"mode\" value=\"1\">";
	echo "<input type=\"submit\" name=\"sub_btn\" value=\"Add to Cart\">";
	echo "</form>";
	echo "</th>";
	echo "</table>";
	
	echo "</tr>";
	}
}

echo "</table>";
?>