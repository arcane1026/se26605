<?php

function getProducts() {
	
	global $db;
	
	$sql = "Select * FROM products";
	try{
		$stmt = $db->prepare($sql);
		
		$stmt->execute();
		
		$products = $stmt->fetchAll (PDO::FETCH_ASSOC);
		return $products;
	}
	catch(PDOException $e){
		exit("there was a problem retreiving the products table");
	}
}
function getProduct($db, $id)
{
	//do not need global this time as PDO was passed in
$sql = "SELECT * FROM products WHERE id=:id";
		try{
			$stmt = $db->prepare($sql);
		
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$product = $stmt->fetch(PDO::FETCH_ASSOC);
		return $product; 
		}catch(PDOException $e){
			exit("There was a problem retreiving the Product");
		}
}

function deleteproduct($db, $id)	{
	$sql = "DELETE FROM products WHERE id=:id";
	try{$stmt = $db->prepare($sql);
		
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$product = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $product; 
		}catch(PDOException $e){
			exit("There was a problem deleting the product");
		}
}

function addProduct($db, $product, $price, $image) {
	try {
		$sql = "INSERT INTO 
		
		products VALUES 
		(null, :product, :price, :image)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':product',$product, PDO::PARAM_STR);
		$stmt->bindParam(':price',$price,PDO::PARAM_STR);
		$stmt->bindParam(':image',$image, PDO::PARAM_INT); 
			$stmt->execute();
	
	} catch(PDOException $e) {
		die("Unable to add product");
	}
}

function updateProduct($db, $product, $price, $image, $id) {
	
		$sql = "UPDATE products SET
		product = :name,
		price = :price,
		image = :image,
		WHERE id = :id";
		echo($sql);
		//exit();
			try{
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':name', $product, PDO::PARAM_STR);
				
				$stmt->bindParam(':price', $price, PDO::PARAM_STR);
				$stmt->bindParam(':image', $image, PDO::PARAM_STR);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				
				$stmt->execute();
			}
			
			catch(PDOException $e){
				exit("There was a problem updating the product.");
			}
				
				//var_dump($products);
				//svar_dump($products[0]);
			}
		

	
	
	
	
	
	