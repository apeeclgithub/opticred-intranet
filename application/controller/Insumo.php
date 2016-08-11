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
		
			$proId  = $_POST['editIdProduct'];
			$proName  = $_POST['editNameProduct'];
			$proStore = $_POST['editStoreProduct'];
			$proPrice = $_POST['editPriceProduct'];
			$proStock = $_POST['editStockProduct'];

			$json['success'] = $objProduct->updateProduct($proId, $proName, $proStore, $proPrice, $proStock);
			echo json_encode($json);

			break;

		case 3:

			$proId  = $_POST['delIdProduct'];

			$json['success'] = $objProduct->delProduct($proId);
		    echo json_encode($json);
			break;
		
		default:

			break;
	
	}

?> 