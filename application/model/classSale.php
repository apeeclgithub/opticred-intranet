<?php 

	require_once 'classDatabase.php';

	class Sale{

		private $sale;

		public function addSale($venNumber, $venStore, $venClient, $venPhone, $venCristal, $venAltura){

			$dia = $this->getDia();
			$hora = $this->getHora();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO venta (ven_correlative, ven_store, ven_name, ven_phone, ven_date_create, ven_hour, ven_cristal, ven_altura) 
										VALUES (:venNumber, :venStore, :venClient, :venPhone, :venDay, :venHour, :venCristal, :venAltura)');
		
			$sql->bindParam(':venNumber', $venNumber);
			$sql->bindParam(':venDay', $dia);
			$sql->bindParam(':venHour', $hora);
			$sql->bindParam(':venStore', $venStore);
			$sql->bindParam(':venClient', $venClient);
			$sql->bindParam(':venPhone', $venPhone);
			$sql->bindParam(':venCristal', $venCristal);
			$sql->bindParam(':venAltura', $venAltura);

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