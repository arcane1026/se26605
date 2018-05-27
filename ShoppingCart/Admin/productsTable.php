<?php

$tableBody = "<tablebody>" . PHP_EOL;

foreach ($products as $product){
	$tableBody .= "<tr>";
	$tableBody .= "<td>" . $product['name']. "</td>";
	$tableBody .= "<td><a href='?action=Read&id=" . $product['id'] . "'>Read</a> | " ;
	$tableBody .= "<td><a href='?action=Update&id=" . $product['id'] . "'>Update</a> | ";
	$tableBody .= "<td><a href='?action=Delete&id=" . $product['id'] . "'>Delete</a> </td> ";
	$tableBody .= "</tr>" . PHP_EOL;
}
$tableBody .= "</tablebody>" . PHP_EOL;
?>

<div id="mainContent">
	<div id = "ProductsTable">
		<table id="Products">
		<?php echo $tableBody;?>
			</table>
		</div>
	</div>
	<div id="create">
		<form action="" method="get" id="createbutton">
			<input type="submit" name="action" value = "Create"/>
			</form>
		</div>