<?php
 include("global.php");
 include("header.php");
?>

?>
<div class= "categories"

<?php

$id = mysqli_real_escape_string($connection,$_GET['id']);
$result = mysqli_query($connection,"select * from categories");

while($row = mysqli_fetch_array($result)) { 
	echo "<a href='product_list.php?category_id=" . $row['id'] .  ">" . $row['category_name'] . "</a></br>";
	echo "<a href='product_list.php?category_id=" . $row['id'] .  ">" . $row['category_name'] . "</a></br>";
}

?>

</div>

<?php
 include("footer.php"); 
 ?>