<?php
require_once('models/db.php');// establish connection	
require_once('models/corps.php');//includes the file that has all of our functions on it. 
require_once ('SortView.php');//new form that will allow us to sort and search 


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
		
		if(!empty($_POST['col']) )
		{
			$col = $_POST['col'];
		}
		
		
		$upordown = ($_POST['upordown']) ?? NULL;

		if(!empty($_POST['col2']) )
		{
			$col2 = $_POST['col2'];
		}
		
		if(!empty($_POST['termsearch']) )
		{
			$termsearch = $_POST['termsearch'];
		}
		
		//var_dump($col);
		
		
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
	case 'Sort':
		include_once('views/header.php');
		
		
		$corps = getCorpsSorted($col, $upordown);
		
		include_once("views/corpstable.php");
		include_once("views/footer.php");
		//echo ($corp['id']);
		break;
	case 'Search':
		include_once('views/header.php');
		
		
		$corps = corpSearch($db, $col2, $termsearch);//searching 
		
		include_once("views/corpstable.php");
		include_once("views/footer.php");
		//echo ($corp['id']);
		break;
		//the default case loads automatically when the page is loaded. think of it as default or index for the index. 	
	case 'Reset':
		include_once("views/header.php");//includes the header once 
			
			$corps = getCorps();//utilizing the getcorps function on our corps page so that we can load the values into our table with the corpsTable function. The corps variable comes rom return 
			//of the get corps function 
			// $cols = getColumnNames($db, 'corps');
      //  var_dump($corps);
       // break;
			
			include_once("views/corpsTable.php");
			include_once("views/footer.php");
			break;
		
	default:
			include_once("views/header.php");//includes the header once 
			
			$corps = getCorps();//utilizing the getcorps function on our corps page so that we can load the values into our table with the corpsTable function. The corps variable comes rom return 
			//of the get corps function 
			// $cols = getColumnNames($db, 'corps');
      //  var_dump($corps);
       // break;
			
			include_once("views/corpsTable.php");
			include_once("views/footer.php");
			break;
			
		
}