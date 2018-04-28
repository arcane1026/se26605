     
<?php //this is the page that loads first because it is called index
require_once("db.php");
require_once("corps.php");


$action = $_REQUEST['action'];
$corp = $_POST['corp'];
//$incorp_dt = $_POST['incorp_dt'];
$email = $_POST['email'];
$zipcode = $_POST['zipcode'];
$owner = $_POST['owner'];
$phone = $_POST['phone'];


switch ($action){
	case "Add":
		include_once("corpForm.php");
		break;
	case "Save":
		saveCorp($db, $corp, $email, $zipcode, $owner, $phone);
		// get all the rows
		$corporations = getRows();
		// display the rows
		include_once("corpsTable.php");
		break;
	case "View":
		$corporations = getRows();
		// display the rows
		include_once("corpsTable.php");
	default:
		// get all the rows
		$corporations = getRows();
		// display the rows
		include_once("corpsTable.php");
}

switch($action){
	case "Read":
			include_once("corpForm.php");
			break;
}