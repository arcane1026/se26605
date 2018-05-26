<?php
require_once('models/db.php');
require_once('models/corps.php');

//$action = filter_input(Input_post, 'action', FILTER_SANITIZE_STRING) ??
			//filter_input(Input_get, 'action', FILTER_SANITIZE_STRING) ?? null;
			
		$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
	
		$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;
				
		$corp = filter_input(INPUT_POST, 'corp', FILTER_SANITIZE_STRING) ?? "";

		$email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_STRING) ?? "";

		$zipcode = filter_input(INPUT_POST, 'zipcode', FILTER_SANITIZE_STRING) ?? "";

		$owner = filter_input(INPUT_POST, 'owner', FILTER_SANITIZE_STRING) ?? "";
		
		$phone = filter_input(INPUT_POST, 'phone', FILTER_SANITIZE_STRING) ?? "";
	
		$incorp_dt = filter_input(INPUT_POST, 'incorp_dt', FILTER_SANITIZE_STRING) ?? "";
		
switch ($action)
{
	case 'Read':
	include_once('views/header.php');
		$corp = getCorp($db, $id);
		include_once("views/corp.php");
		include_once("views/footer.php");
		break;
	case 'Update':
		include_once('views/header.php');
		$value = "Save";
		
		$corp = getCorp($db, $id);
		
		include_once("views/Corpform.php");
		include_once("views/footer.php");
		echo ($corp['id']);
		break;
	case 'Save':
		//echo ($corp);
		//sexit();
		echo($id);
		//exit(); 
		//echo($corp);
		updatecorp($db, $corp, $email, $zipcode, $owner, $phone, $id);
		include_once("views/header.php");
		$corps = getCorps();
		include_once("views/corpsTable.php");
		include_once("views/footer.php");
		break;
	case 'Delete':
		deletePerson($db, $id);
		include_once('views/header.php');
		$corps = getCorps();
		//var_dump($corps);
		include_once("views/corpsTable.php");
		include_once("views/footer.php");
		break;
	case 'Create':
		include_once('views/header.php');
		$value = "Add";
		include_once("views/Corpform2.php");
		include_once("views/footer.php");
		break;
	case 'Add':
	//function to add corp from corps.php
		addCorp($db, $corp, $email, $zipcode, $owner, $phone);
		include_once('views/header.php');
		//include table again to display after corp is added.
		$corps = getCorps();
		include_once("views/corpsTable.php");
		include_once("views/footer.php");
		break;
	default:
			include_once("views/header.php");
			$corps = getCorps();
			
			include_once("views/corpsTable.php");
			include_once("views/footer.php");
			break;
		
}