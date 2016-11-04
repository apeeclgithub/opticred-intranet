<?php

	require_once 'classDatabase.php';

	class Chart{

		private $chart;

		public function dailyAmountPerStore(){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT a.TIE_ID, a.TIE_NAME, SUM(b.ABO_TOTAL) AS monto
										FROM TIENDA a 
                                        INNER JOIN ABONO b
                                        INNER JOIN VENTA c
										ON a.TIE_ID=c.TIENDA_TIE_ID AND c.VEN_ID=b.VENTA_VEN_ID
										WHERE ABO_DATE = CURDATE()
										GROUP BY a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function monthAmountPerStore(){

			$objConn = new Database();
			$sql = $objConn->prepare(' SELECT a.TIE_ID, a.TIE_NAME, SUM(b.ABO_TOTAL) AS monto
										FROM TIENDA a 
                                        INNER JOIN ABONO b
                                        INNER JOIN VENTA c
										ON a.TIE_ID=c.TIENDA_TIE_ID AND c.VEN_ID=b.VENTA_VEN_ID
										WHERE MONTH(ABO_DATE) = MONTH(CURDATE())
										GROUP BY MONTH(ABO_DATE), a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function sailsActualDay(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT a.TIE_ID, a.TIE_NAME, COUNT(*) AS cantidad
										FROM TIENDA a INNER JOIN VENTA b
										ON a.TIE_ID=b.TIENDA_TIE_ID
										WHERE VEN_DATE_CREATE = CURDATE()
										GROUP BY a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}	

		public function sailsActualMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT a.TIE_ID, a.TIE_NAME, COUNT(*) AS cantidad
										FROM TIENDA a INNER JOIN VENTA b
										ON a.TIE_ID=b.TIENDA_TIE_ID
										WHERE MONTH(VEN_DATE_CREATE) = MONTH(CURDATE())
										GROUP BY a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}	

		public function sailsQtyByMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('  SELECT MONTH(a.ABO_DATE) AS mes,
										       SUM(CASE
										               WHEN b.TIE_NAME=\'Tercero\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS tercero,
										       SUM(CASE
										               WHEN b.TIE_NAME=\'Quinto\' THEN a.ABO_TOTAL
										               ELSE 0
										           END) AS quinto
										FROM ABONO a
										INNER JOIN TIENDA b 
                                        INNER JOIN VENTA c
                                        ON b.TIE_ID=c.TIENDA_TIE_ID AND c.VEN_ID=a.VENTA_VEN_ID
										WHERE YEAR(CURDATE())=YEAR(ABO_DATE)
										GROUP BY mes');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function sailsCountByMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MONTH(a.ABO_DATE) AS mes,
									       SUM(if(b.TIE_NAME = \'Tercero\', 1, 0)) AS tercero,
									       SUM(if(b.TIE_NAME = \'Quinto\', 1, 0)) AS quinto
										FROM ABONO a
										INNER JOIN TIENDA b 
                                        INNER JOIN VENTA c
                                        ON b.TIE_ID=c.TIENDA_TIE_ID AND c.VEN_ID=a.VENTA_VEN_ID
										WHERE YEAR(CURDATE())=YEAR(ABO_DATE)
										GROUP BY mes');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function listTopTen(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT p.PRO_ID,
										       p.PRO_NAME,

										(SELECT COUNT(*)
										   FROM DETALLE
										   WHERE DETALLE.PRODUCTO_PRO_ID = p.PRO_ID ) cantidad
										FROM PRODUCTO p
										ORDER BY cantidad DESC LIMIT 10');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function sellerTotalSails(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT cap.CAP_ID,
										       cap.CAP_NAME,
										  (SELECT COUNT(*)
										   FROM COMISION
										   WHERE COMISION.CAPTADOR_CAP_ID = cap.CAP_ID ) VENTAPORCAPTADOR
										FROM CAPTADOR cap
										ORDER BY VENTAPORCAPTADOR DESC LIMIT 10');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}		

		public function sellerComission(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT CAPTADOR.CAP_ID,
										       CAP_NAME,
										       SUM(COM_TOTAL) AS CAP_TOTAL
										FROM CAPTADOR
										INNER JOIN COMISION ON CAPTADOR.CAP_ID = COMISION.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1
										GROUP BY CAPTADOR.CAP_ID
										ORDER BY CAP_TOTAL DESC');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function pendingCommission(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DISTINCT CAPTADOR.CAP_ID, CAP_NAME, 
										(SELECT SUM(COM_TOTAL) FROM COMISION WHERE CAPTADOR_CAP_ID = CAPTADOR.CAP_ID AND COM_PAID = \'SI\') AS COMTOTAL, 
										(SELECT SUM(PAG_TOTAL) FROM PAGO WHERE CAPTADOR_CAP_ID = CAPTADOR.CAP_ID ORDER BY CAPTADOR_CAP_ID DESC LIMIT 1) AS PAGTOTAL
										FROM CAPTADOR
										LEFT JOIN COMISION ON CAPTADOR.CAP_ID = COMISION.CAPTADOR_CAP_ID  
										LEFT JOIN PAGO ON CAPTADOR.CAP_ID = PAGO.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1 
										GROUP BY CAP_ID');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}
	}

?>
