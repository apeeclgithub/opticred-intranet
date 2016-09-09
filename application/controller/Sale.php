<?php
	
	session_start();
	require '../model/classSale.php';

	$objSale= new Sale();
	$json['success'] = false; 

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

		case 2:
			
			$venNumber  = $_POST['addSaleNumber'];
			$venStore  = $_POST['addSaleStore'];
			$venClient  = $_POST['addSaleClient'];
			$venPhone  = $_POST['addSalePhono'];
			$venCristal  = $_POST['addSaleCristal'];
			$venAltura  = $_POST['addSaleAltura'];
			$venTotal  = $_POST['addSaleTotal'];
			$venSaldo  = $_POST['addSaleSaldo'];

			$json['success'] = $objSale->addSale($venNumber, $venStore, $venClient, $venPhone, $venCristal, $venAltura, $venTotal, $venSaldo);
 
			/*if($json['success'] != true){
				$json['success'] = $objUser->activateUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore);
			}*/
			
			echo json_encode($json);

			break;

	}

?>