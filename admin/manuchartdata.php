<?php

//data.php

$connect = new PDO("mysql:host=localhost;dbname=nhom5", "root", "");
	
		$query = "
		SELECT manufactures.manu_name, COUNT(products.manu_id) AS Total 
		FROM manufactures,products
		WHERE manufactures.manu_id=products.manu_id
		GROUP BY manufactures.manu_name
		";
		$result = $connect->query($query);
		$data1 = array();

		foreach($result as $row)
		{
			$data[] = array(
				'manu'		=>	$row["manu_name"],
				'total'			=>	$row["Total"],
				'color'			=>	'#' . rand(100000, 999999) . ''
			);
		}
		echo json_encode($data);
	
?>