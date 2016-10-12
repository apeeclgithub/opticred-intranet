<?php

	require_once 'classDatabase.php';

	class Chart{

		private $chart;

		public function dailyAmountPerStore(){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT a.TIE_ID, a.TIE_NAME, SUM(b.VEN_COM_TOTAL) AS monto
										FROM tienda a INNER JOIN venta b
										ON a.TIE_ID=b.TIENDA_TIE_ID
										WHERE VEN_DATE_CREATE = CURDATE()
										GROUP BY a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function monthAmountPerStore(){

			$objConn = new Database();
			$sql = $objConn->prepare(' SELECT a.TIE_ID, a.TIE_NAME, SUM(b.VEN_COM_TOTAL) AS monto
										FROM tienda a INNER JOIN venta b
										ON a.TIE_ID=b.TIENDA_TIE_ID
										WHERE MONTH(VEN_DATE_CREATE) = MONTH(CURDATE())
										GROUP BY MONTH(VEN_DATE_CREATE), a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function sailsActualDay(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT a.TIE_ID, a.TIE_NAME, COUNT(*) AS cantidad
										FROM tienda a INNER JOIN venta b
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
										FROM tienda a INNER JOIN venta b
										ON a.TIE_ID=b.TIENDA_TIE_ID
										WHERE MONTH(VEN_DATE_CREATE) = MONTH(CURDATE())
										GROUP BY a.TIE_NAME');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}	

		public function sailsQtyByMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('  SELECT MONTH(a.VEN_DATE_CREATE) AS mes,
										       SUM(CASE
										               WHEN b.TIE_NAME=\'Tercero\' THEN a.VEN_COM_TOTAL
										               ELSE 0
										           END) AS tercero,
										       SUM(CASE
										               WHEN b.TIE_NAME=\'Quinto\' THEN a.VEN_COM_TOTAL
										               ELSE 0
										           END) AS quinto
										FROM venta a
										INNER JOIN tienda b ON b.TIE_ID=a.TIENDA_TIE_ID
										WHERE YEAR(CURDATE())=YEAR(VEN_DATE_CREATE)
										GROUP BY mes');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function sailsCountByMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MONTH(a.VEN_DATE_CREATE) AS mes,
									       SUM(if(b.TIE_NAME = \'Tercero\', 1, 0)) AS tercero,
									       SUM(if(b.TIE_NAME = \'Quinto\', 1, 0)) AS quinto
										FROM venta a
										INNER JOIN tienda b ON b.TIE_ID=a.TIENDA_TIE_ID
										WHERE YEAR(CURDATE())=YEAR(VEN_DATE_CREATE)
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
										   FROM detalle
										   WHERE detalle.PRODUCTO_PRO_ID = p.PRO_ID ) cantidad
										FROM producto p
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
										   FROM comision
										   WHERE comision.CAPTADOR_CAP_ID = cap.CAP_ID ) VENTAPORCAPTADOR
										FROM captador cap
										ORDER BY VENTAPORCAPTADOR DESC LIMIT 10');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}		

		public function sellerComission(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT captador.CAP_ID,
										       CAP_NAME,
										       SUM(COM_TOTAL) AS CAP_TOTAL
										FROM captador
										INNER JOIN comision ON captador.CAP_ID = comision.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1
										GROUP BY captador.CAP_ID
										ORDER BY CAP_TOTAL DESC');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function pendingCommission(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT captador.CAP_ID,
										       CAP_NAME,
										       SUM(COM_TOTAL)-SUM(COM_PAID) AS CAP_TOTAL
										FROM captador
										INNER JOIN comision ON captador.CAP_ID = comision.CAPTADOR_CAP_ID
										WHERE CAP_ACTIVE = 1
										GROUP BY captador.CAP_ID
										ORDER BY CAP_TOTAL DESC');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}
	}

?>
