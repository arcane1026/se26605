<?PHP




//this function creates a table and draws it with either $corps, whatever that may be at the time. it might be search reuslts, or the entire database, or the datase sorted sepcifically. 

function getCorpsasTable($db, $corps, $cols = null){
	setlocale(LC_MONETARY, 'en_US.UTF-8');
	$table = "";
		if(count ($corps) > 0):
		$table .= "<table>" . PHP_EOL;
			if ($cols) :
				$table .= "\t<tr>";
					foreach ($cols as $col){
						$table .= "<th>$col<th>";
					}
					$table .= "</tr>" . PHP_EOL;
				endif;
			foreach($corps as $corp):
			
		
			$table .= "t<tr>";
			$table .= "<td>" . $corp['ID'] . "</td>";	
			$table .= "<td>" . $corp['Corp'] . "</td>";	
			$table .= "<td>" . $corp['Email'] . "</td>";	
			$table .= "<td>" . $corp['Owner'] . "</td>";	
			$table .= "<td>" . $corp['Phone'] . "</td>";	
			$table .= "<td>" . $corp['Incorp_DT'] . "</td>";
			$table .= "<tr>" . PHP_EOL;
			endforeach;
			$table .= "</table>" . PHP_EOL;
				return $table;
		else:
		return "<section>There were no search reuslts</section>";
		endif;
}
			