<?php

	require_once 'classDatabase.php';
	date_default_timezone_set("Chile/Continental");
	class Insumo{

		private $insumo;

		public function listInsumos(){

			$today = $this->getDate();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  INS_ID,
												INS_NAME,
												INS_DESC,
												INS_TOTAL,
												TIE_NAME,
												INS_DATE
										FROM INSUMO
										INNER JOIN TIENDA ON INSUMO.TIENDA_TIE_ID = TIENDA.TIE_ID');

			$sql->bindParam(':today', $today);

			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;

		}

		public function getDate(){

			$year = date("Y");
			$month = date("m");
			$day = date("d");

			return $year."/".$month."/".$day;

		}

		public function addInsumo($insName, $insDetail, $insStore, $insPrice, $insDate){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO INSUMO (INS_NAME, INS_DESC, TIENDA_TIE_ID, INS_TOTAL, INS_DATE) 
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
			$sql = $objConn->prepare('	UPDATE INSUMO 
										SET INS_NAME = :insName, 
											INS_DESC = :insDesc, 
											TIENDA_TIE_ID = :insStore, 
											INS_TOTAL = :insTotal
										WHERE INS_ID = :insId');

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
			$sql = $objConn->prepare('	DELETE FROM INSUMO
										WHERE INS_ID = :insId');

			$sql->bindParam(':insId', $insId);

			$this->insumo = $sql->execute();

			return $this->insumo;
		}

		public function listInsumosClosingCash(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  INS_ID,
												INS_NAME,
												INS_DESC,
												INS_TOTAL,
												TIE_NAME,
												INS_DATE
										FROM INSUMO
										INNER JOIN TIENDA ON INSUMO.TIENDA_TIE_ID = TIENDA.TIE_ID
										WHERE INS_DATE = CURDATE() ');


			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;

		}

		public function totalInsumoClosingCash($insStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	SUM(INS_TOTAL) AS TOTAL
										FROM INSUMO
										INNER JOIN TIENDA ON INSUMO.TIENDA_TIE_ID = TIENDA.TIE_ID
										WHERE INS_DATE = CURDATE() AND TIE_ID = :insStore');

			$sql->bindParam(':insStore', $insStore);
			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;
	
		}

		public function buscarCierrelistInsumosClosingCash($searchDate, $searchStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  INS_ID,
												INS_NAME,
												INS_DESC,
												INS_TOTAL,
												INS_DATE
										FROM INSUMO
										WHERE INS_DATE = :searchDate
										AND TIENDA_TIE_ID = :searchStore');


			$sql->bindParam(':searchDate', $searchDate);
			$sql->bindParam(':searchStore', $searchStore);
			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;

		}

		public function buscarCierreTotalInsumosClosingCash($searchDate, $searchStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	SUM(INS_TOTAL) AS TOTAL
										FROM INSUMO
										WHERE INS_DATE = :searchDate AND TIENDA_TIE_ID = :searchStore');

			$sql->bindParam(':searchDate', $searchDate);
			$sql->bindParam(':searchStore', $searchStore);
			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;
		}

	}

?>