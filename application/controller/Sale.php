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
			$usuId  = $_POST['addSaleId'];
			$venTotal  = $_POST['addSaleTotal'];
			
			
			//$venSaldo  = $_POST['addSaleSaldo'];

			$json['success'] = $objSale->addSale($venNumber, $venStore, $venClient, $venPhone, $usuId, $venTotal);
			
			$ventaId = "";
			foreach ( (array) $objSale->getUltima($venStore) as $key ) {
				foreach ($key as $value) {
					$ventaId = $value;
				}
			}
			
			if($json['success'] == true){
				
				$venCristal  = $_POST['addSaleCristal'];
				$venAltura  = $_POST['addSaleAltura'];
				
	        	$objSale->addDespacho($ventaId, $venCristal, $venAltura);
	        }

	        if($json['success'] == true){
				
				$tipoLejos='Lejos';
				$nameLejos=$_POST['addSaleProductLejos'];
				$lejos_l_1=$_POST['lejos_l_1'];
				$lejos_o_1=$_POST['lejos_o_1'];
				$lejos_c_1=$_POST['lejos_c_1'];
				$lejos_e_1=$_POST['lejos_e_1'];
				$lejos_o_2=$_POST['lejos_o_2'];
				$lejos_c_2=$_POST['lejos_c_2'];
				$lejos_e_2=$_POST['lejos_e_2'];
				$tipoCerca='Cerca';
				$nameCerca=$_POST['addSaleProductCerca'];
				$cerca_l_1=$_POST['cerca_l_1'];
				$cerca_o_1=$_POST['cerca_o_1'];
				$cerca_c_1=$_POST['cerca_c_1'];
				$cerca_e_1=$_POST['cerca_e_1'];
				$cerca_o_2=$_POST['cerca_o_2'];
				$cerca_c_2=$_POST['cerca_c_2'];
				$cerca_e_2=$_POST['cerca_e_2'];
				
	        	$objSale->addDetail($ventaId, $lejos_l_1, $lejos_o_1, $lejos_c_1, $lejos_e_1, $lejos_o_2, $lejos_c_2, $lejos_e_2, $tipoLejos, $nameLejos, $venStore);
	        	$objSale->addDetail($ventaId, $cerca_l_1, $cerca_o_1, $cerca_c_1, $cerca_e_1, $cerca_o_2, $cerca_c_2, $cerca_e_2, $tipoCerca, $nameCerca, $venStore);
	        }
			
			if($json['success'] == true){
				
				$tipoPago  = $_POST['addSalePayType'];
				$abono  = $_POST['addSaleAbono'];
				
	        	$objSale->primerAbono($abono, $ventaId, $tipoPago);
	        }
			
			
			
			echo json_encode($json);

			break;

	}

?>