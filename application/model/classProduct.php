<?php

	require_once 'classDatabase.php';

	class Product{

		private $product;

		public function selectProduct($proName, $proStore){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	pro_id,
												pro_name,
												pro_price,
												pro_stock,
												pro_store
										FROM producto 
										WHERE pro_name = :proName
										AND pro_store = :proStore
										AND pro_active = 1');
			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;
			
		}

		public function activateProduct($proName, $proStore, $proPrice, $proStock){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE producto 
										SET	pro_active = 1,
											pro_price = :proPrice, 
											pro_stock = :proStock
										WHERE pro_name = :proName
										AND pro_store = :proStore');

			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->bindParam(':proPrice', $proPrice);
			$sql->bindParam(':proStock', $proStock);

			$this->product = $sql->execute();

			return $this->product;

		}

		public function addProduct($proName, $proStore, $proPrice, $proStock){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO producto (pro_name, pro_store, pro_price, pro_stock) 
										VALUES (:proName, :proStore, :proPrice, :proStock)');
		
			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->bindParam(':proPrice', $proPrice);
			$sql->bindParam(':proStock', $proStock);

			if(!(array)$this->selectProduct($proName, $proStore)){
				$this->product = $sql->execute();
			}

			return $this->product;

		}

		public function updateProduct($proId, $proName, $proStore, $proPrice, $proStock){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE producto 
										SET pro_name = :proName, 
											pro_store = :proStore, 
											pro_price = :proPrice, 
											pro_stock = :proStock
										WHERE pro_id = :proId');

			$sql->bindParam(':proId', $proId);
			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->bindParam(':proPrice', $proPrice);
			$sql->bindParam(':proStock', $proStock);

			if(!(array)$this->selectProduct($proName, $proStore)){
				$this->product = $sql->execute();
			}

			return $this->product;

		}

		public function delProduct($proId){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE producto 
										SET	pro_active = 0
										WHERE pro_id = :proId');

			$sql->bindParam(':proId', $proId);

			$this->product = $sql->execute();

			return $this->product;
		}

		public function listProducts(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  pro_id,
												pro_name,
												pro_price,
												pro_stock,
												pro_store
										FROM producto
										WHERE pro_active = 1');

			$this->product = $sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;

		}

	}

?>