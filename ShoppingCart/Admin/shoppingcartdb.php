<?php
$dsn = "mysql:host=localhost;dbname=phpclassspring2018";
$username = "karma1026";
$password = "123qwaAA_";
try{
	$db = new PDO($dsn, $username, $password);
	echo "Hi";
	}
	catch(PDOException $e){
		exit("There was a problem connecting to the database");
	}