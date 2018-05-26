<?php
//this page contains functions for CRUD 
function getCorps() {//gets all corps from the table and displays them
	
	global $db;//declaring db as a global variable so that we dont have to initialize it again and again. 
	
	$sql = "Select * FROM Corps";//SQL command to grab all data from corps and return in corps variable
	try{
		$stmt = $db->prepare($sql); //prepare the stament
		
		$stmt->execute();//execute SQL statement
		
		$corps = $stmt->fetchAll (PDO::FETCH_ASSOC);//PDOStatement::fetchAll() returns an array containing all of the remaining rows in the result set. 
		//The array represents each row as either an array of column values or an object with properties corresponding to each column name. 
		//An empty array is returned if there are zero results to fetch, or FALSE on failure.
		return $corps;
	}
	catch(PDOException $e){//if there is an error when retreiving the data
		exit("there was a problem retreiving the corps table");//display this message
	}
}
function getCorpsSorted($col, $upordown) {//gets all corps from the table and displays them
	
	global $db;//declaring db as a global variable so that we dont have to initialize it again and again. 
	
	$sql = "Select * FROM Corps ORDER BY $col $upordown";//SQL command to grab all data from corps and return in corps variable
	echo ($sql);
	try{
		$stmt = $db->prepare($sql); //prepare the stament
		
		$stmt->execute();//execute SQL statement
		
		$corps = $stmt->fetchAll (PDO::FETCH_ASSOC);//PDOStatement::fetchAll() returns an array containing all of the remaining rows in the result set. 
		//The array represents each row as either an array of column values or an object with properties corresponding to each column name. 
		//An empty array is returned if there are zero results to fetch, or FALSE on failure.
		return $corps;
	}
	catch(PDOException $e){//if there is an error when retreiving the data
		exit("there was a problem retreiving the corps table");//display this message
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
			
			
		function corpSearch($db, $col2, $termsearch)//searchings
{
				echo ($col2);
				
				$sql =

				"SELECT * FROM corps WHERE $col2 LIKE '%{$termsearch}%'";
				
				
				echo $sql;
				
				$stmt = $db->prepare($sql);
				
				$stmt->bindParam(':termsearch', $termsearch, PDO::PARAM_STR);
				
				$stmt->execute();
				
				$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
				
				return $results;
			}//searchCorps CLOSE

	
	
	
	
	
	
