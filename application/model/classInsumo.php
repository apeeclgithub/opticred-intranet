<?php

	require_once 'classDatabase.php';

	class Insumo{

		private $insumo;

		public function listInsumos(){

			$today = date("Y-m-d");
			
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

	}

?>