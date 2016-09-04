<?php
	
	session_start();
	require '../model/classSale.php';

	$objSale= new Sale();

	switch (@$_GET['action']) {

		case 1:

			$objSale->maxNumber($_SESSION['user']['store']);

			foreach ( (array) $objSale as $key ) {
				foreach ($key as $key2 => $value) {
					$json['number'] = intval($value['max']);
				}
			}

			$json['date'] = $objSale->getDate();
			
			echo json_encode($json);

			break;

	}

?>