<?php
	
	session_start();
	require '../model/classProduct.php';
	$json['success'] = false; 

	$objProduct= new Product();

	switch (@$_GET['action']) {

		case 1:

			$proName  = $_POST['addNameProduct'];
			$proStore = $_POST['addStoreProduct'];
			$proPrice = $_POST['addPriceProduct'];
			$proStock = $_POST['addStockProduct'];

			$json['success'] = $objProduct->addProduct($proName, $proStore, $proPrice, $proStock);
 
			if($json['success'] != true){
				$json['success'] = $objProduct->activateProduct($proName, $proStore, $proPrice, $proStock);
			}

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
			
		case 4:
			$test = array("pablo", "mario");
			echo json_encode($test);
			break;
		
		default:

			break;
	
	}
/*<?php

		require '../model/classChart.php';
		$objSailsActualDay = new Chart();
		$objSailsActualDay->sailsActualDay();

		$json[0] = array('Tienda','Ventas');
		$i = 1;

		foreach ( (array) $objSailsActualDay as $key ) {
			foreach ($key as $key2 => $value) {

				$json[$i] = array($value['TIE_NAME'], (int)$value['cantidad']);
				$i++;
			}
		}
		echo json_encode($json);
		?>*/
?> 