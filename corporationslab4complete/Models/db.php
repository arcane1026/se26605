<?php //a comment here 
$dsn = "mysql:host=localhost;dbname=phpclassspring2018";
$username = "phpclassspring2018";
$password = "008001336";
try{
	$db = new PDO($dsn, $username, $password);
	}
	catch(PDOException $e){
		exit("There was a problem connecting to the database");
	}
	
	function getColumnNames($db, $tbl){

    $sql = "select column_name from information_schema.columns where lower(table_name)=lower('". $tbl . "')";
    $stmt = $db->prepare($sql);

    try {
        if($stmt->execute()):
            $raw_column_data = $stmt->fetchAll(PDO::FETCH_ASSOC);

            foreach($raw_column_data as $outer_key => $array):
                foreach($array as $inner_key => $value):
                    if (!(int)$inner_key):
                            $column_names[] = $value;
                    endif;
                endforeach;
            endforeach;
        endif;
    } catch (Exception $e){
            die("There was a problem retrieving the column names");
    }
    return $column_names;
}