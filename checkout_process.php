<?php

include("global.php");

$first_name = mysqli_real_escape_string($connection,$_POST["first_name"]);
$last_name = mysqli_real_escape_string($connection,$_POST["last_name"]);
$address = mysqli_real_escape_string($connection,$_POST["address"]);
$city = mysqli_real_escape_string($connection,$_POST["city"]);
$state = mysqli_real_escape_string($connection,$_POST["state"]);
$zip = mysqli_real_escape_string($connection,$_POST["zip"]);
$id = intval($_POST["id"]);

if ($first_name == "") {
	$errormessage = $errormessage . "First name is required <br />";
}

if ($last_name == "") {
	$errormessage = $errormessage . "Last name is required <br />";
}

if ($address == "") {
	$errormessage = $errormessage . "Address is required <br />";
}

if ($city == "") {
	$errormessage = $errormessage . "City is required <br />";
}

if ($state == "") {
	$errormessage = $errormessage . "State is required <br />";
}

if ($zip == "") {
	$errormessage = $errormessage . "Zip is required <br />";
}

if ($errormessage != "") { //if errormessage has a value
	include("checkout_form.php");
	die();
}

echo "Hello, your order has been placed. Details are shown below" . "<br />";
	echo "<br />";

echo "First name: ";
	echo $_POST["first_name"] . "<br />";
	echo "<br />";

echo "Last name: ";
	echo $_POST["last_name"] . "<br />";
	echo "<br />";

echo "Address: ";
	echo $_POST["address"] . "<br />";
	echo "<br />";

echo "City: ";
	echo $_POST["city"] . "<br />";
	echo "<br />";

echo "State: ";
	echo $_POST["state"] . "<br />";
	echo "<br />";

echo "Zip: ";
	echo $_POST["zip"] . "<br />";
	echo "<br />";

$result = mysqli_query($connection,"select * from cart join products on (cart.product_id = product.id) where session_id = '" . session_id() . "' order by product_id");

mysqli_query($connection,"update products left join cart on products.id = cart.products_id set products.quantity_remaining = (products.quantity_remaining - where product.id = product_id");

while ($row = mysqli_fetch_assoc($result)) {
	
	echo $row["product_name"] . "<br />";
    echo $row["quanity"] . "<br />";
    echo "<br />";

}

include("header.php");

?>

		All saved!

<?php 

	include("footer.php"); 

?>