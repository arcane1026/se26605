<?php

function getCorps() {
	
	global $db;
	
	$sql = "Select * FROM Corps";
	try{
		$stmt = $db->prepare($sql);
		
		$stmt->execute();
		
		$corps = $stmt->fetchAll (PDO::FETCH_ASSOC);
		return $corps;
	}
	catch(PDOException $e){
		exit("there was a problem retreiving the corps table");
	}
}
function getCorp($db, $id)
{
	//do not need global this time as PDO was passed in
$sql = "SELECT * FROM Corps WHERE id=:id";
		try{
			$stmt = $db->prepare($sql);
		
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$corp = $stmt->fetch(PDO::FETCH_ASSOC);
		return $corp; 
		}catch(PDOException $e){
			exit("There was a problem retreiving the Corporation");
		}
}

function deleteperson($db, $id)	{
	$sql = "DELETE FROM Corps WHERE id=:id";
	try{$stmt = $db->prepare($sql);
		
		$stmt->bindParam(':id', $id, PDO::PARAM_INT);
		
		$stmt->execute();
		
		$corp = $stmt->fetchAll(PDO::FETCH_ASSOC);
		return $corp; 
		}catch(PDOException $e){
			exit("There was a problem deleting the Corporation");
		}
}

function addCorp($db, $corp, $email, $zipcode, $owner, $phone) {
	try {
		$sql = "INSERT INTO 
		
		corps VALUES 
		(null, :corp, NOW(), :email, :zipcode, :owner, :phone)";
		$stmt = $db->prepare($sql);
		$stmt->bindParam(':corp',$corp, PDO::PARAM_STR);
		$stmt->bindParam(':email',$email,PDO::PARAM_STR);
		$stmt->bindParam(':zipcode',$zipcode, PDO::PARAM_INT); 
		$stmt->bindParam(':owner',$owner,PDO::PARAM_STR);
		$stmt->bindParam(':phone',$phone, PDO::PARAM_INT); 
			$stmt->execute();
	
	} catch(PDOException $e) {
		die("Unable to add corp");
	}
}

function updateCorp($db, $corp, $email, $zipcode, $owner, $phone, $id) {
	
		$sql = "UPDATE corps SET
		corp = :corp,
		email = :email,
		zipcode = :zipcode,
		owner = :owner,
		phone = :phone
		WHERE id = :id";
		echo($sql);
		//exit();
			try{
				$stmt = $db->prepare($sql);
				$stmt->bindParam(':corp', $corp, PDO::PARAM_STR);
				
				$stmt->bindParam(':email', $email, PDO::PARAM_STR);
				$stmt->bindParam(':zipcode', $zipcode, PDO::PARAM_STR);
				$stmt->bindParam(':owner', $owner, PDO::PARAM_STR);
				$stmt->bindParam(':phone', $phone, PDO::PARAM_STR);
				$stmt->bindParam(':id', $id, PDO::PARAM_INT);
				
				$stmt->execute();
			}
			
			catch(PDOException $e){
				exit("There was a problem updating the person.");
			}
				
				//var_dump($corps);
				//svar_dump($corp[0]);
			}
		

	
	
	
	
	
	
