<?php
	
	session_start();
	require '../model/classUser.php';
	$json['success'] = false; 

	$objUser= new User();

	switch (@$_GET['action']) {

		/*	
		 *	Case 1: Login
		 */
		case 1:

			$objUser->selectUser($_POST['userRut'], $_POST['userPass']);

			foreach ( (array) $objUser as $key ) {
				foreach ($key as $key2 => $value) {
					if(is_numeric($value['usu_id'])){
						$_SESSION['usuario'] = $value['usu_id'];
						$json['success'] = true;
					}		
				}
			}
			echo json_encode($json);
			break;
		
		default:
			echo 'nada';
			break;
	}

?>