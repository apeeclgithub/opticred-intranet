<?php

	require_once 'classDatabase.php';

	class ClosingCash{

		private $closingCash;

		public function listClosingCash(){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DAY(a.ABO_DATE) AS dia,d.TIE_ID as tienda,
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
										FROM ABONO a
										INNER JOIN metodo_pago b ON b.MET_ID=a.METODO_PAGO_MET_ID
                                        INNER JOIN venta c ON c.VEN_ID=a.VENTA_VEN_ID
                                        INNER JOIN tienda d ON d.TIE_ID=c.TIENDA_TIE_ID
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

			if(date("H")>5){
				$day = date("d");
			}else{
				$day = date("d")-1;
			}

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

	}

?>