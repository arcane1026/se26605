<?php
function getRows() {
	// Select all the rows as associative array and return
	global $db;
	$stmt = $db->prepare("SELECT * FROM corps");
	$stmt->execute();
	$results = $stmt->fetchAll(PDO::FETCH_ASSOC);
	return $results;
}


function saveCorp($db, $corp, $email, $zipcode, $owner, $phone) {
	$sql = "INSERT INTO corps VALUES (null, :corp, NOW(), :email, :zipcode, :owner, :phone)";
	$stmt = $db->prepare($sql);
	$stmt->bindParam(':corp',$corp);
	//$stmt->bindParam(':incorp_dt', $incorp_dt);
	$stmt->bindParam(':email',$email);
	$stmt->bindParam(':zipcode',$zipcode, PDO::PARAM_INT);
	$stmt->bindParam(':owner',$owner);
	$stmt->bindParam(':phone',$phone, PDO::PARAM_INT);
	
	$stmt->execute();
	
	
}
