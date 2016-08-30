<?php
	
	session_start();
	require '../model/classSale.php';

	$objSale= new Sale();

	switch (@$_GET['action']) {

		case 1:

			$objSale->maxNumber('Tercero');

			foreach ( (array) $objSale as $key ) {
				foreach ($key as $key2 => $value) {
					$json['number'] = intval($value['max']);
				}
			}
			
			echo json_encode($json);

			break;

	}

?>