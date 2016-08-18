<?php

	require_once 'classDatabase.php';

	class TopTenGraph{

		private $graph;

		public function listTopTen(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  p.pro_id,
												p.pro_name,
										(SELECT COUNT(*) 
											FROM detalle 
											WHERE detalle.PRO_ID = p.PRO_ID ) cantidad
											FROM producto p ORDER BY cantidad DESC LIMIT 10');

			$this->graph = $sql->execute();
			$this->graph = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->graph;
		}

	}

?>
