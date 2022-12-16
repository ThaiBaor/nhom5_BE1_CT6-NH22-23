<?php

//data.php

$connect = new PDO("mysql:host=localhost;dbname=nhom5", "root", "");
	
		$query = "
		SELECT protypes.type_name, COUNT(products.type_id) AS Total 
		FROM protypes,products
		WHERE protypes.type_id=products.type_id
		GROUP BY protypes.type_name
		";
		$result = $connect->query($query);
		$data1 = array();

		foreach($result as $row)
		{
			$data[] = array(
				'protype'		=>	$row["type_name"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}
		echo json_encode($data);
	
?>