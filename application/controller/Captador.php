<?php
	
	session_start();
	require '../model/classCaptador.php';
	$json['success'] = false; 

	$objCaptador= new Captador();

	switch (@$_GET['action']) {

		case 1:

			$capName  = $_POST['addNameCaptador'];
			$capPhone  = $_POST['addPhoneCaptador'];

			$json['success'] = $objCaptador->addCaptador($capName, $capPhone);
 
			if($json['success'] != true){
				$json['success'] = $objCaptador->activateCaptador($capName, $capPhone);
			}

			echo json_encode($json);

			break;

		case 2:
		
			$capId    = $_POST['editIdCaptador'];
			$capName  = $_POST['editNameCaptador'];
			$capPhone  = $_POST['editPhoneCaptador'];

			$json['success'] = $objCaptador->updateCaptador($capId, $capName, $capPhone);
			echo json_encode($json);

			break;

		case 3:

			$capId    = $_POST['delIdCaptador'];

			$json['success'] = $objCaptador->delCaptador($capId);
		    echo json_encode($json);
			break;
		
		default:

			break;
			
	}

?>