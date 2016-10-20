<?php

	require_once 'classDatabase.php';

	class ClosingCash{

		private $closingCash;

		public function listClosingCash(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DAY(a.ABO_DATE) AS dia,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Efectivo\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS efectivo,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Cheque\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS cheque,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Tarjeta\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS tarjeta
										FROM abono a
										INNER JOIN metodo_pago b ON b.MET_ID=a.METODO_PAGO_MET_ID
										WHERE CURDATE()=ABO_DATE
										GROUP BY dia');

			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}
	}

?>