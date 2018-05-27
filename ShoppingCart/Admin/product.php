<?php
$title = "<h1>Product Result</h1>\n";
$table = "<table><tr><td><b>Product: </b>" . $product['name']
.  "</td><td><b>Price: </b>" . $product['price'] 
 . "<td><a href='?id=" . $product['id'] . $product['id'] ."&action=Delete'>Delete</a></td></tr></table><br /><br /><br />";
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Corporations</title>
    
    </head>
    <body>
    <?php echo $title; ?>
    <?php echo $table; ?>
<form action='adminindex.php' method='get'>
	<input type='submit' name='action' value='View' />
</form>	
	
    </body>
</html>