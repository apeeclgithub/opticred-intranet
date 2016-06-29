<?php

	session_start();
	require '../model/classProduct.php';
	$json['success'] = false; 

	$objProduct= new Product();

	switch (@$_GET['action']) {

		/*	
		 *	Case 1: Login
		 */
		case 1:

			/*$objProduct->selectUser($_POST['userRut'], $_POST['userPass']);

			foreach ( (array) $objUser as $key ) {
				foreach ($key as $key2 => $value) {
					if(is_numeric($value['usu_id'])){
						$_SESSION['usuario'] = $value['usu_id'];
						$json['success'] = true;
					}		
				}
			}
			echo json_encode($json);*/
			echo 'todo bien';
			break;
		
		default:
			echo 'nada';
			break;
	}


?>