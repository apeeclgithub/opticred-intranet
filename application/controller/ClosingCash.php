<?php
	
	session_start();
	require '../model/classClosingCash.php';
	$json['success'] = false; 

	$objClosingCash= new ClosingCash();

	switch (@$_GET['action']) {

		case 1:

			$payIdCaptador  	= $_POST['payIdCaptador'];
			$payTotalCaptador  	= $_POST['payTotalCaptador'];

			$json['success'] = $objClosingCash->insertPayComission($payTotalCaptador, $payIdCaptador);
			echo json_encode($json);

			break;

		case 2:

			$paidOutIdCaptador  = $_POST['paidOutIdCaptador'];

			$json['success'] = $objClosingCash->deletePaidOutComission($paidOutIdCaptador);
			echo json_encode($json);

			break;

		case 3:

			$criTotal  	= $_POST['criTotal'];
			$criTie  	= $_POST['criTie'];

			$json['success'] = $objClosingCash->insertCrystal($criTotal, $criTie);
			echo json_encode($json);

			break;

		default:

			break;
			
	}

?>