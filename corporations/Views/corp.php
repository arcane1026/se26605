<?php
$title = "<h1>Corporation Result</h1>\n";
$table = "<table><tr><td><b>Corporation: </b>" . $corp['corp']
. "</td><td><b>Date: </b>" . date("m/d/Y", strtotime($corp['incorp_dt'])) . "</td><td><b>Email: </b>" . $corp['email'] 
. "</td><td><b>Zip Code: </b>" . $corp['zipcode'] . "</td><td><b>Owner: </b>" . $corp['owner'] . "</td><td><b>Phone: </b>" . $corp['phone'] . "</td></tr><tr><td><a href='?id=". 
$corp['id'] ."&action=Update'>Update</a></td><td><a href='?id=". $corp['id'] ."&action=Delete'>Delete</a></td></tr></table><br /><br /><br />";
?>




<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Corporations</title>
    
    </head>
    <body>
    <?php echo $title; ?>
    <?php echo $table; ?>
<form action='index.php' method='get'>
	<input type='submit' name='action' value='View' />
</form>	
	
    </body>
</html>