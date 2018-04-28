<?php
$dsn = "mysql:host=localhost;dbname=phpclassspring2018";
$userName = "008001336";
$pWord = "123qwa123qwa";
try {
	$db = new PDO($dsn, $userName, $pWord);
} catch (PDOException $e) {
	die("Cannot connect to the database");
}
