<?php
include('server.php');


if (isset($_SESSION['username'])) : 
require_once('shoppingcartdb.php');
require_once('adminfunctions.php');

//$action = filter_input(Input_post, 'action', FILTER_SANITIZE_STRING) ??
			//filter_input(Input_get, 'action', FILTER_SANITIZE_STRING) ?? null;
			
		$action = filter_input(INPUT_GET, 'action', FILTER_SANITIZE_STRING) ??filter_input(INPUT_POST, 'action', FILTER_SANITIZE_STRING) ?? NULL;
	
		$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT) ?? filter_input(INPUT_POST, 'id', FILTER_VALIDATE_INT) ?? null;
				
		$product = filter_input(INPUT_POST, 'product', FILTER_SANITIZE_STRING) ?? "";

		$price = filter_input(INPUT_POST, 'price', FILTER_SANITIZE_STRING) ?? "";

		$image = filter_input(INPUT_POST, 'image', FILTER_SANITIZE_STRING) ?? "";

		
		   
switch ($action)
{
	case 'Read':
	
		$product = getProduct($db, $id);
		include_once("product.php");
		
		break;
	case 'Update':
		
		$value = "Save";
		
		$product = getProduct($db, $id);
		
		include_once("Productform.php");
		
		echo ($product['id']);
		break;
	case 'Save':
		//echo ($corp);
		//sexit();
		echo($id);
		//exit(); 
		//echo($corp);
		updateproduct($db, $product, $price, $image, $id);
		
		$products = getProducts();
		include_once("productsTable.php");
		
		break;
	case 'Delete':
		deleteProduct($db, $id);
		
		$products = getProducts();
		//var_dump($products);
		include_once("productsTable.php");
		break;
	case 'Create':
		
		$value = "Add";
		include_once("Productform.php");
		
		break;
	case 'Add':
	//function to add corp from corps.php
		addProduct($db, $product, $price, $image);
		
		//include table again to display after product is added.
		$products = getProducts();
		include_once("productsTable.php");
		break;
	default:
			
			$products = getProducts();
			
			include_once("productsTable.php");
			
			break;
		
}
?>
<p> <a href="index.php?logout='1'" style="color: red;">Logout</a> </p>
		<p> <a href="Adminindex.php" style="color: red;">Admin Home</a> </p>
		<p> <a href="http://localhost/ShoppingCart/shoppingcart.php" style="color: red;">User Side</a> </p>
 <?php else : ?>
            <p>
                <span class="error">You are not authorize to access this page.</span> Please <a href="index.php">login</a>.
            </p>
        <?php endif; ?>