<?php

include("header.php");
include("global.php");

$product_id = intval($_GET["product_id"]);
$result = mysqli_query($connection,"select * from products where id = $product_id order by product_name");

while ($row = mysqli_fetch_assoc($result)) {

    echo $row["product_name"] . "<br />";
    echo "<img src='images/" . $row["image"] . "'><br /><br />";
    echo $row["description"] . "<br />";

}


?>
    <form method="POST" action="cart_process.php">
    
         <input type="text" name="product_$product_id" size="$quantity"><br/>
         <input type="submit" name="update_cart" value="Add To Cart">
         </form>

<?php

include ("footer.php");

?>