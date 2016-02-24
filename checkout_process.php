
<?php

include("global.php");
include ("jwu_mail.php");
include("header.php");
?>

<?php

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

?>


<?php

$to = "yaj524@jwu.edu";
$subject = "Order";
$message = "Thank you for placing your order! \n\n";


$message = $message . "First Name: ";
$message = $message . $_POST ["first_name"] . "\n\n";
$message = $message . "Last Name: ";
$message = $message . $_POST ["last_name"] . "\n\n";
$message = $message . "Address: ";
$message = $message . $_POST ["address"] . "\n\n";
$message = $message . "City: ";
$message = $message . $_POST ["city"] . "\n\n";
$message = $message . "State: ";
$message = $message . $_POST ["state"] . "\n\n";
$message = $message . "Zip: ";
$message = $message . $_POST ["zip"] . "\n\n";


echo "You can view your order below!";
	echo "<br />";
	echo "<br />";

echo "First Name: ";
	echo $_POST["first_name"] . "<br />";
	echo "<br />";

echo "Last Name: ";
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

echo "Zip Code: ";
	echo $_POST["zip"] . "<br />";
	echo "<br />";

$result = mysqli_query($connection,"select * from cart join products on (cart.product_id = product.id) 
	where session_id = '" . session_id() . "' order by product_id");


while ($row = mysqli_fetch_assoc($result)) {
		mysqli_query($connection,"update products set quantity_remaining = quantity_remaining - quantity where id = product_id");
		echo $row["product_name"] . "<br />";
		echo $row["quantity"] . "<br />";
		echo "<br />";
		$message = $message . "Product Name";
		$message = $message . $_POST ["product_name"] . "\n\n";
		$message = $message . "Quantity";
		$message = $message . $_POST ["quantity"] . "\n\n";
}

jwu_mail($to,$subject,$message);

?>


<?php 

	include("footer.php"); 

?>