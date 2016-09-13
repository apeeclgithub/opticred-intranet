<?php 

	require_once 'classDatabase.php';

	class Sale{

		private $sale;

		public function addSale($venNumber, $venStore, $venClient, $venPhone, $venCristal, $venAltura, $venTotal, $venSaldo){

			$dia = $this->getDia();
			$hora = $this->getHora();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO venta (ven_correlative, ven_store, ven_name, ven_phone, ven_date_create, ven_hour, ven_cristal, ven_altura, ven_total, ven_saldo) 
										VALUES (:venNumber, :venStore, :venClient, :venPhone, :venDay, :venHour, :venCristal, :venAltura, :venTotal, :venSaldo)');
		
			$sql->bindParam(':venNumber'	, $venNumber);
			$sql->bindParam(':venDay'		, $dia);
			$sql->bindParam(':venHour'		, $hora);
			$sql->bindParam(':venStore'		, $venStore);
			$sql->bindParam(':venClient'	, $venClient);
			$sql->bindParam(':venPhone'		, $venPhone);
			$sql->bindParam(':venCristal'	, $venCristal);
			$sql->bindParam(':venAltura'	, $venAltura);
			$sql->bindParam(':venTotal'		, $venTotal);
			$sql->bindParam(':venSaldo'		, $venSaldo);

			$this->sale = $sql->execute();

			return $this->sale;

		}

		public function addDetail($venNumber, $lejos_l_1, $lejos_o_1, $lejos_c_1, $lejos_e_1, $lejos_o_2, $lejos_c_2, $lejos_e_2, $tipo){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO detalle (ven_id, ven_l, ven_o_1, ven_c_1, ven_e_1, ven_o_2, ven_c_2, ven_e_2, det_tipo) 
										VALUES (:venNumber, :lejos_l_1, :lejos_o_1, :lejos_c_1, :lejos_e_1, :lejos_o_2, :lejos_c_2, :lejos_e_2, :tipo)');
		
			$sql->bindParam(':venNumber'	, $venNumber);
			$sql->bindParam(':lejos_l_1'	, $lejos_l_1);
			$sql->bindParam(':lejos_o_1'	, $lejos_o_1);
			$sql->bindParam(':lejos_c_1'	, $lejos_c_1);
			$sql->bindParam(':lejos_e_1'	, $lejos_e_1);
			$sql->bindParam(':lejos_o_2'	, $lejos_o_2);
			$sql->bindParam(':lejos_c_2'	, $lejos_c_2);
			$sql->bindParam(':lejos_e_2'	, $lejos_e_2);
			$sql->bindParam(':tipo'	, $tipo);

			$this->sale = $sql->execute();

			return $this->sale;

		}

		public function maxNumber($store){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(ven_correlative)+1 AS max FROM venta WHERE ven_store = :store');

			$sql->bindParam(':store', $store);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function getDia(){

			$year = date("Y");
			$month = date("m");

			if(date("H")>5){
				$day = date("d");
			}else{
				$day = date("d")-1;
			}

			return $year."-".$month."-".$day;

		}

		public function getHora(){

			if(date("H")>5){
				$hour = date("H")-5;
			}else{
				$hour = date("H")+19;
			}

			$min = date("i");

			return $hour.":".$min ;

		}

		public function getDate(){

			$year = date("Y");
			$month = date("m");

			if(date("H")>5){
				$day = date("d");
				$hour = date("H")-5;
			}else{
				$day = date("d")-1;
				$hour = date("H")+19;
			}

			$min = date("i");

			return $day."-".$month."-".$year." ".$hour.":".$min ;

		}

	}

?>