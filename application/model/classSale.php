<?php 

	require_once 'classDatabase.php';

	class Sale{

		private $sale;

		public function maxNumber($store){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(ven_correlative)+1 AS max FROM venta WHERE ven_store = :store');

			$sql->bindParam(':store', $store);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

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


			return $day."-".$month."-".$year." ".$hour.":".$min;

		}

	}

?>