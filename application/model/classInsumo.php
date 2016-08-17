<?php

	require_once 'classDatabase.php';

	class Insumo{

		private $insumo;

		public function listInsumos(){

			$today = $this->getDate();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  ins_id,
												ins_name,
												ins_desc,
												ins_total,
												ins_store,
												ins_date
										FROM insumo
										WHERE ins_date = :today ');

			$sql->bindParam(':today', $today);

			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;

		}

		public function getDate(){

			$year = date("Y-");
			$month = date("m-");

			if(date("G")>4){
				$day = date("d");
			}else{
				$day = date("d")-1;
			}

			return $year.$month.$day;

		}

		public function addInsumo($insName, $insDetail, $insStore, $insPrice, $insDate){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO insumo (ins_name, ins_desc, ins_store, ins_total, ins_date) 
										VALUES (:insName, :insDetail, :insStore, :insPrice, :insDate)');
		
			$sql->bindParam(':insName', 	$insName);
			$sql->bindParam(':insDetail', 	$insDetail);
			$sql->bindParam(':insStore', 	$insStore);
			$sql->bindParam(':insPrice', 	$insPrice);
			$sql->bindParam(':insDate', 	$insDate);

			$this->insumo = $sql->execute();

			return $this->insumo;

		}

		public function updateInsumo($insId, $insName, $insDesc, $insStore, $insTotal){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE insumo 
										SET ins_name = :insName, 
											ins_desc = :insDesc, 
											ins_store = :insStore, 
											ins_total = :insTotal
										WHERE ins_id = :insId');

			$sql->bindParam(':insId', $insId);
			$sql->bindParam(':insName', $insName);
			$sql->bindParam(':insDesc', $insDesc);
			$sql->bindParam(':insStore', $insStore);
			$sql->bindParam(':insTotal', $insTotal);

			$this->insumo = $sql->execute();
			
			return $this->insumo;

		}

		public function delInsumo($insId){

			$objConn = new Database();
			$sql = $objConn->prepare('	DELETE FROM insumo
										WHERE ins_id = :insId');

			$sql->bindParam(':insId', $insId);

			$this->insumo = $sql->execute();

			return $this->insumo;
		}

	}

?>