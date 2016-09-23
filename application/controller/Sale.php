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
			$tipoLejos='Lejos';
       		$lejos_l_1=$_POST['lejos_l_1'];
	        $lejos_o_1=$_POST['lejos_o_1'];
	        $lejos_c_1=$_POST['lejos_c_1'];
	        $lejos_e_1=$_POST['lejos_e_1'];
	        $lejos_o_2=$_POST['lejos_o_2'];
	        $lejos_c_2=$_POST['lejos_c_2'];
	        $lejos_e_2=$_POST['lejos_e_2'];
	        $tipoCerca='Cerca';
	        $cerca_l_1=$_POST['cerca_l_1'];
	        $cerca_o_1=$_POST['cerca_o_1'];
	        $cerca_c_1=$_POST['cerca_c_1'];
	        $cerca_e_1=$_POST['cerca_e_1'];
	        $cerca_o_2=$_POST['cerca_o_2'];
	        $cerca_c_2=$_POST['cerca_c_2'];
	        $cerca_e_2=$_POST['cerca_e_2'];

	        if($json['success'] == true){
	        	$objSale->addDetail($venNumber, $lejos_l_1, $lejos_o_1, $lejos_c_1, $lejos_e_1, $lejos_o_2, $lejos_c_2, $lejos_e_2, $tipoLejos);
	        	$objSale->addDetail($venNumber, $cerca_l_1, $cerca_o_1, $cerca_c_1, $cerca_e_1, $cerca_o_2, $cerca_c_2, $cerca_e_2, $tipoCerca);
	        }

 
			/*if($json['success'] != true){
				$json['success'] = $objUser->activateUser($usuName, $usuMail, $usuRut, $usuPass, $usuStore);
			}*/
			
			echo json_encode($json);

			break;

	}

?>