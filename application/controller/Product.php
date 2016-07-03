<?php
	
	session_start();
	require '../model/classProduct.php';
	$json['success'] = false; 

	$objProduct= new Product();

	switch (@$_GET['action']) {

		case 1:

			$proName  = $_POST['proNameProduct'];
			$proStore = $_POST['proStoreProduct'];
			$proPrice = $_POST['proPriceProduct'];
			$proStock = $_POST['proStockProduct'];
 
			$json['success'] = $objProduct->addProduct($proName, $proStore, $proPrice, $proStock);
			echo json_encode($json);

			break;

		case 2:

			$proId  = $_POST['proIdProduct'];

			$json['success'] = $objProduct->delProduct($proId);
		    echo json_encode($json);
			break;
		
		default:

			break;
	
	}

?> 