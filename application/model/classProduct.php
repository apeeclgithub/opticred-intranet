<?php

	require_once 'classDatabase.php';

	class Product{

		private $product;

		public function listProducts(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  pro_id,
												pro_name,
												pro_price,
												pro_stock,
												pro_store
										FROM producto');

			$this->product = $sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;

		}

	}

?>