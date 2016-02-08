<?php
include"global.php";
include"header.php";
?>

<?php

$url = $_GET['category_id']."#".$_GET['id'];
$category_name = mysqli_real_escape_string($connection,$_GET['category_name']);
    
$result = mysqli_query($connection,"SELECT * FROM products where category_id='$url'");

?>

<div id="products">

<?php

	 echo "<th>product name</th> 
			<th>price</th> 
			<th>quantity remaining</th> 
			<th>description</th>  
			<th>images</th> 
    </tr>";

	while($row = mysqli_fetch_array($result)) {  
        echo "<tr>"; 
        echo "<td>" . $row['product_name'] . "</td>"; 
        echo "<td>" . $row['price'] . "</td>"; 
        echo "<td>" . $row['quantity_remaining'] . "</td>"; 
        echo "<td>" . $row['description'] . "</td>"; 
        echo "<td>" . "<img src='images/" . $row["image"];
        echo "</tr>";  
    }

	echo "</table>"; 
	
     ?>
     
</div>

<?php
include"footer.php";
?>