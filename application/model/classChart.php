<?php

	require_once 'classDatabase.php';

	class Chart{

		private $chart;

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
