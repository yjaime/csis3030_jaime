<?php

    include("header.php");
    include("global.php");

    if ($errormessage != "") {

        echo "<div style='border: 1px solid red;'><h1>Error</h1>" . $errormessage . "</div><br />";
    
    }        

?>
        
<form method="POST" action="checkout_process.php">
        First Name: <input type="text" name="first_name"><br/>
        Last Name: <input type="text" name="last_name"><br/>
        Address: <input type="text" name="address"><br/>
        City: <input type="text" name="city"><br/>
        State: <input type="text" name="state"><br/>
        Zip: <input type="text" name="zip"><br/>
        </br> <input type="submit" value="Complete Order">
</form>
        
<?php

    include("footer.php"); 

?>