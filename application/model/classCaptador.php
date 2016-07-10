<?php 

	require_once 'classDatabase.php';

	class Captador{

		private $captador;

		public function listCaptadores(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT captador.cap_id, cap_name, cap_phone, SUM(com_total) AS cap_total
										FROM captador 
										INNER JOIN comision ON captador.cap_id = comision.cap_id
										WHERE cap_active = 1');

			$this->captador = $sql->execute();
			$this->captador = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->captador;

		}

	}
?>

