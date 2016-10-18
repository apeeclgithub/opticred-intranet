<?php

	require_once 'classDatabase.php';

	class ClosingCash{

		private $closingCash;

		public function listClosingCash(){

			$today = $this->getDate();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  INS_ID,
												INS_NAME,
												INS_DESC,
												INS_TOTAL,
												TIE_NAME,
												INS_DATE
										FROM INSUMO
										INNER JOIN TIENDA ON INSUMO.TIENDA_TIE_ID = TIENDA.TIE_ID
										WHERE INS_DATE = :today ');

			$sql->bindParam(':today', $today);

			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}
	}

?>