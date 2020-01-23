<?php

	require_once 'classDatabase.php';
	date_default_timezone_set("Chile/Continental");
	class ClosingCash{

		private $closingCash;

		public function listClosingCash(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DAY(a.ABO_DATE) AS dia,d.TIE_ID as tienda,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Efectivo\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS EFECTIVO,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Cheque\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS CHEQUE,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Tarjeta\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS TARJETA
										FROM ABONO a
										INNER JOIN METODO_PAGO b ON b.MET_ID=a.METODO_PAGO_MET_ID
                                        INNER JOIN VENTA c ON c.VEN_ID=a.VENTA_VEN_ID
                                        INNER JOIN TIENDA d ON d.TIE_ID=c.TIENDA_TIE_ID
										WHERE CURDATE()=ABO_DATE
										GROUP BY tienda, dia');



			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}


		public function insertPayComission($payTotalCaptador, $payIdCaptador){

			$payDate = $this->getDia();
			
			$objConn = new Database();
			$sql = $objConn->prepare('INSERT INTO PAGO (PAG_TOTAL, PAG_DATE, CAPTADOR_CAP_ID) 
										VALUES (:payTotalCaptador, :payDate, :payIdCaptador)');
		
			$sql->bindParam(':payTotalCaptador', $payTotalCaptador);
			$sql->bindParam(':payDate', $payDate);
			$sql->bindParam(':payIdCaptador', $payIdCaptador);

			$this->closingCash = $sql->execute();

			return $this->closingCash;

		}

		public function getDia(){

			$year = date("Y");
			$month = date("m");
			$day = date("d");

			return $year."-".$month."-".$day;

		}

		public function listCaptadorPaidOut(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT CAPTADOR.CAP_ID,
										       CAP_NAME,
										       SUM(PAG_TOTAL) AS PAG_CAP
										FROM CAPTADOR
										INNER JOIN PAGO ON CAPTADOR.CAP_ID = PAGO.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1
										  AND PAG_DATE = CURDATE()
										GROUP BY CAP_NAME');

			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}

		public function deletePaidOutComission($paidOutIdCaptador){

			$objConn = new Database();
			$sql = $objConn->prepare('	DELETE FROM 
											PAGO
										WHERE 
											PAG_DATE = CURDATE() 
										AND 
											CAPTADOR_CAP_ID = :paidOutIdCaptador');

			$sql->bindParam(':paidOutIdCaptador', $paidOutIdCaptador);

			$this->closingCash = $sql->execute();

			return $this->closingCash;
		}

		public function totalPaidOutCommision(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT
										       SUM(PAG_TOTAL) AS PAG_CAP
										FROM  PAGO
										WHERE PAG_DATE = CURDATE()');

			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}

		public function insertCrystal($criTotal, $criTie){

			$criDate = $this->getDia();
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO CRISTAL (CRI_TOTAL, CRI_DATE, TIENDA_TIE_ID) 
										VALUES (:criTotal, :criDate, :criTie)');
		
			$sql->bindParam(':criTotal', $criTotal);
			$sql->bindParam(':criDate', $criDate);
			$sql->bindParam(':criTie', $criTie);

			$this->closingCash = $sql->execute();
			
			return $this->closingCash;

		}

		public function buscarCierrelistCaptadorPaid($searchDate){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT CAPTADOR.CAP_ID,
										       CAP_NAME,
										       SUM(PAG_TOTAL) AS PAG_CAP
										FROM CAPTADOR
										INNER JOIN PAGO ON CAPTADOR.CAP_ID = PAGO.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1
										AND PAG_DATE = :searchDate
										GROUP BY CAP_NAME');
										
			$sql->bindParam(':searchDate', $searchDate);
			
			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}

		public function buscarCierreShowTotal($searchDate, $searchStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DAY(a.ABO_DATE) AS dia,d.TIE_ID as tienda,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Efectivo\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS EFECTIVO,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Cheque\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS CHEQUE,
										       SUM(CASE
										               WHEN b.MET_NAME=\'Tarjeta\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS TARJETA
										FROM ABONO a
										INNER JOIN METODO_PAGO b ON b.MET_ID=a.METODO_PAGO_MET_ID
                                        INNER JOIN VENTA c ON c.VEN_ID=a.VENTA_VEN_ID
                                        INNER JOIN TIENDA d ON d.TIE_ID=c.TIENDA_TIE_ID
										WHERE ABO_DATE=:searchDate AND TIE_ID=:searchStore');


			$sql->bindParam('searchDate', $searchDate);
			$sql->bindParam('searchStore', $searchStore);
			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}

		public function buscarCierreCristal($searchDate, $searchStore){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	CRI_TOTAL
										FROM CRISTAL
										WHERE CRI_DATE = :searchDate
										AND TIENDA_TIE_ID = :searchStore');
										
			$sql->bindParam('searchDate', $searchDate);
			$sql->bindParam('searchStore', $searchStore);
			
			$this->closingCash = $sql->execute();
			$this->closingCash = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->closingCash;

		}

	}

?>