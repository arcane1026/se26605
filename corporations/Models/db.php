<?php
$dsn = "mysql:host=localhost;dbname=phpclassspring2018";
$username = "phpclassspring2018";
$password = "008001336";
try{
	$db = new PDO($dsn, $username, $password);
	}
	catch(PDOException $e){
		exit("There was a problem connecting to the database");
	}