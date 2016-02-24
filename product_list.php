<?php

include("global.php");
include("header.php");

$category_id = intval($_GET["category_id"]);

$result = mysqli_query($connection,"select * from categories where id = $category_id");
$row = mysqli_fetch_assoc($result);
echo "<h3>" . $row["category_name"] . "</h3>";
$result = mysqli_query($connection,"select * from products where category_id = $category_id order by product_name");

while ($row = mysqli_fetch_assoc($result)) {

	echo "<a href='product_detail.php?product_id=" . $row["id"] . "'>";
	echo $row["product_name"] . "<br />";
	echo "<img src='images/" . $row["image"] . "'><br /><br />";

}

include("footer.php"); 

?>