<?php

	require_once 'classDatabase.php';

	class Chart{

		private $chart;

		public function dailyAmountPerStore(){

			$objConn = new Database();
			$sql = $objConn->prepare('SELECT SUM(VEN_TOTAL) AS monto,
										       VEN_STORE AS tienda
										FROM venta
										WHERE VEN_DATE = CURDATE()
										GROUP BY VEN_STORE');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function monthAmountPerStore(){

			$objConn = new Database();
			$sql = $objConn->prepare(' SELECT SUM(VEN_TOTAL) AS monto,
										 VEN_STORE AS tienda
										FROM venta
										WHERE MONTH(VEN_DATE) = MONTH(CURDATE())
										GROUP BY MONTH(VEN_DATE),
										         VEN_STORE');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);
		}

		public function sailsActualDay(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT COUNT(*) AS cantidad,
										       VEN_STORE AS tienda
										FROM venta
										WHERE VEN_DATE = CURDATE()
										GROUP BY VEN_STORE');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}	

		public function sailsActualMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT COUNT(*) AS cantidad,
										 VEN_STORE AS tienda
										FROM venta
										WHERE MONTHNAME(VEN_DATE) = MONTH(CURDATE())
										GROUP BY MONTH(VEN_DATE),
										         VEN_STORE');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}	

		public function sailsQtyByMonth(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT COUNT(*) cantidad,VEN_STORE AS tienda, MONTH(VEN_DATE) as mes FROM venta WHERE YEAR(VEN_DATE) = YEAR(CURDATE()) GROUP BY mes, tienda');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}	

		public function listTopTen(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  p.pro_id,
												p.pro_name,
										(SELECT COUNT(*) 
											FROM detalle 
											WHERE detalle.PRO_ID = p.PRO_ID ) cantidad
											FROM producto p ORDER BY cantidad DESC LIMIT 10');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

		public function sellerComission(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	captador.CAP_ID,
										   		CAP_NAME,
										    	SUM(com_total) AS CAP_TOTAL
										FROM 	captador
										INNER JOIN comision ON captador.CAP_ID = comision.CAP_ID
										WHERE 	CAP_ACTIVE = 1
										GROUP BY captador.CAP_ID ORDER BY CAP_TOTAL DESC');

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
										   WHERE comision.CAP_ID = cap.CAP_ID ) VENTAPORCAPTADOR
										FROM captador cap
										ORDER BY VENTAPORCAPTADOR DESC LIMIT 10');

			$this->chart = $sql->execute();
			$this->chart = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->chart;
		}

	}

?>
