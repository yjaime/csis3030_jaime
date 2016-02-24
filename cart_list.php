<?php

 include("global.php");
 include("header.php");

$result = mysqli_query($connection,"select * from cart join products on (cart.id = cart.product_id)
	where session_id = '" . session_id() . "'") or die(mysqli_error($connection));

?>

<form method="POST" action="cart_process.php">

<?php
		while ($row = mysqli_fetch_assoc($result)){
			echo '<input type="text" name="product_$product_id" size="$quanity"><br />';
		}

?>

	<input type="submit" name="update_cart" value="Update Cart">
	<input type="submit" name="checkout" value="Checkout">
</form>

<?php

 include("footer.php"); 

 ?>