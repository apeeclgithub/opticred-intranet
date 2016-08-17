<?php
	
	session_start();
	require '../model/classInsumo.php';
	$json['success'] = false; 

	$objInsumo= new Insumo();

	switch (@$_GET['action']) {

		case 1:

			$insName  = $_POST['addNameInsumo'];
			$insDetail = $_POST['addDetailInsumo'];
			$insStore = $_POST['addStoreInsumo'];
			$insPrice = $_POST['addPriceInsumo'];
			$insDate = $_POST['addDateInsumo'];

			$json['success'] = $objInsumo->addInsumo($insName, $insDetail, $insStore, $insPrice, $insDate);

			echo json_encode($json);

			break;

		case 2:
		
			$insId  = $_POST['editIdInsumo'];
			$insName  = $_POST['editNameInsumo'];
			$insDesc = $_POST['editDescInsumo'];
			$insStore = $_POST['editStoreInsumo'];
			$insTotal = $_POST['editTotalInsumo'];

			$json['success'] = $objInsumo->updateInsumo($insId, $insName, $insDesc, $insStore, $insTotal);
			echo json_encode($json);

			break;

		case 3:

			$insId  = $_POST['delIdInsumo'];

			$json['success'] = $objInsumo->delInsumo($insId);
		    echo json_encode($json);
			break;
		
		default:

			break;
	
	}

?> 