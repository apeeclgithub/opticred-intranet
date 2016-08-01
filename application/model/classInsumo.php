<?php

	require_once 'classDatabase.php';

	class Insumo{

		private $insumo;

		public function listInsumos(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  ins_id,
												ins_name,
												ins_desc,
												ins_total,
												ins_store,
												ins_date
										FROM insumo
										WHERE ins_date = "2016-07-31"');

			$this->insumo = $sql->execute();
			$this->insumo = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->insumo;

		}

	}

?>