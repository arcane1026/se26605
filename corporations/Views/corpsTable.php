<?php

$tableBody = "<tablebody>" . PHP_EOL;

foreach ($corps as $corp){
	$tableBody .= "<tr>";
	$tableBody .= "<td>" . $corp['corp']. "</td>";
	$tableBody .= "<td><a href='?action=Read&id=" . $corp['id'] . "'>Read</a> | " ;
	$tableBody .= "<td><a href='?action=Update&id=" . $corp['id'] . "'>Update</a> | ";
	$tableBody .= "<td><a href='?action=Delete&id=" . $corp['id'] . "'>Delete</a> </td> ";
	$tableBody .= "</tr>" . PHP_EOL;
}
$tableBody .= "</tablebody>" . PHP_EOL;
?>

<div id="mainContent">
	<div id = "corpsTable">
		<table id="Corps">
		<?php echo $tableBody;?>
			</table>
		</div>
	</div>
	<div id="create">
		<form action="" method="get" id="createbutton">
			<input type="submit" name="action" value = "Create"/>
			</form>
		</div>