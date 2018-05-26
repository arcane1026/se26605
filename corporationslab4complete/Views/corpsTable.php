<?php

$tableBody = "<tablebody>" . PHP_EOL;
//this is the function that actually draws our table in the index. it utilizes the array returned from the "getcorps" function
foreach ($corps as $corp){//using a for each loop we do not need to hard code the number of companies in our table and we dont need to update
//the amount of companies when we add or delete them. 
	$tableBody .= "<tr>";
	$tableBody .= "<td>" . $corp['corp']. "</td>";
	$tableBody .= "<td><a href='?action=Read&id=" . $corp['id'] . "'>Read</a> | " ;
	$tableBody .= "<td><a href='?action=Update&id=" . $corp['id'] . "'>Update</a> | ";
	$tableBody .= "<td><a href='?action=Delete&id=" . $corp['id'] . "'>Delete</a> </td> ";
	$tableBody .= "</tr>" . PHP_EOL;
}
$tableBody .= "</tablebody>" . PHP_EOL;
//we built the table with php here using the data we got from the corps function from the sql database, and we put the string that contains the code for 
//the table in the $tableBody and then displayed it in the following HTML.   
?>

<div id="mainContent">

	<div id = "corpsTable" >
	
		<table id="Corps" class="table table-striped">
		
		<?php echo $tableBody;?>
		
		
		
			</table>
		</div>
	</div>
	<div id="create">
		<form action="" method="get" id="createbutton">
			<center>
			<button type="submit" name="action" value="Create" class="btn btn-success">Create</button>
			</center>
			</form>
		</div>