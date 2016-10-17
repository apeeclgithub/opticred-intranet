<?php 

	require_once 'classDatabase.php';

	class Sale{

		private $sale;

		public function addSale($venNumber, $venStore, $venClient, $venPhone, $usuId, $venTotal){
			$dia = $this->getDia();
			$hora = $this->getHora();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO VENTA (VEN_CORRELATIVE, TIENDA_TIE_ID, 	VEN_CLI_NAME, VEN_CLI_PHONE, USUARIO_USU_ID, VEN_DATE_CREATE, VEN_HOUR_CREATE, VEN_COM_TOTAL) 
										VALUES (:venNumber, :venStore, :venClient, :venPhone, :usuId, :venDay, :venHour, :venTotal)');

			$sql->bindParam(':venNumber'	, $venNumber);
			$sql->bindParam(':venStore'		, $venStore);
			$sql->bindParam(':venClient'	, $venClient);
			$sql->bindParam(':venPhone'		, $venPhone);
			$sql->bindParam(':usuId'		, $usuId);
			$sql->bindParam(':venDay'		, $dia);
			$sql->bindParam(':venHour'		, $hora);
			$sql->bindParam(':venTotal'		, $venTotal);

			$this->sale = $sql->execute();

			return $this->sale;

		}
		
		public function getUltima($tienda){
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(VEN_ID) AS max FROM VENTA WHERE TIENDA_TIE_ID = :tienda');

			$sql->bindParam(':tienda', $tienda);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;
		}
		
		public function addDespacho($ventaId, $venCristal, $venAltura){
			$dia = $this->getDia();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO DESPACHO (DES_DATE, DES_CRISTAL, DES_ALTURA, VENTA_VEN_ID) 
										VALUES (:dia, :venCristal, :venAltura, :ventaId)');

			$sql->bindParam(':dia'			, $dia);
			$sql->bindParam(':venCristal'	, $venCristal);
			$sql->bindParam(':venAltura'	, $venAltura);
			$sql->bindParam(':ventaId'		, $ventaId);

			$this->sale = $sql->execute();

			return $this->sale;
		}

		public function addDetail($venNumber, $lejos_l_1, $lejos_o_1, $lejos_c_1, $lejos_e_1, $lejos_o_2, $lejos_c_2, $lejos_e_2, $tipo, $name, $tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO detalle (VENTA_VEN_ID, DET_INTERP, DET_OD_1, DET_CLI_1, DET_EJE_1, DET_OD_2, DET_CLI_2, DET_EJE_2, DET_TYPE, PRODUCTO_PRO_ID, DET_PRO_PRICE) 
										VALUES (:venNumber, :lejos_l_1, :lejos_o_1, :lejos_c_1, :lejos_e_1, :lejos_o_2, :lejos_c_2, :lejos_e_2, :tipo, 
										COALESCE((SELECT PRO_ID FROM PRODUCTO WHERE PRO_NAME = :name AND TIENDA_TIE_ID = :tienda),0), COALESCE((SELECT PRO_PRICE FROM PRODUCTO WHERE PRO_NAME = :name AND TIENDA_TIE_ID = :tienda),0))');
		
			$sql->bindParam(':venNumber'	, $venNumber);
			$sql->bindParam(':lejos_l_1'	, $lejos_l_1);
			$sql->bindParam(':lejos_o_1'	, $lejos_o_1);
			$sql->bindParam(':lejos_c_1'	, $lejos_c_1);
			$sql->bindParam(':lejos_e_1'	, $lejos_e_1);
			$sql->bindParam(':lejos_o_2'	, $lejos_o_2);
			$sql->bindParam(':lejos_c_2'	, $lejos_c_2);
			$sql->bindParam(':lejos_e_2'	, $lejos_e_2);
			$sql->bindParam(':tipo'	, $tipo);
			$sql->bindParam(':name'	, $name);
			$sql->bindParam(':tienda'	, $tienda);

			$this->sale = $sql->execute();

			return $this->sale;

		}

		public function maxNumber($store){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(VEN_CORRELATIVE)+1 AS max FROM VENTA WHERE TIENDA_TIE_ID = :store');

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