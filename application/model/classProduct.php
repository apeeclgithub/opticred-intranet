<?php

	require_once 'classDatabase.php';

	class Product{

		private $product;

		public function selectProduct($proName, $proStore){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT 	PRO_ID,
												PRO_NAME,
												PRO_PRICE,
												PRO_STOCK,
												TIENDA_TIE_ID
										FROM PRODUCTO 
										WHERE PRO_NAME = :proName
										AND TIENDA_TIE_ID = :proStore
										AND PRO_ACTIVE = 1');

			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			
			$sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;
			
		}

		public function activateProduct($proName, $proStore, $proPrice, $proStock){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE PRODUCTO 
										SET	PRO_ACTIVE = 1,
											PRO_PRICE = :proPrice, 
											PRO_STOCK = :proStock
										WHERE PRO_NAME = :proName
										AND TIENDA_TIE_ID = :proStore');

			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->bindParam(':proPrice', $proPrice);
			$sql->bindParam(':proStock', $proStock);

			$this->product = $sql->execute();

			return $this->product;

		}

		public function addProduct($proName, $proStore, $proPrice, $proStock){
			
			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO PRODUCTO (PRO_NAME, TIENDA_TIE_ID, PRO_PRICE, PRO_STOCK, PRO_ACTIVE) 
										VALUES (:proName, :proStore, :proPrice, :proStock, 1)');
		
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
			$sql = $objConn->prepare('	UPDATE PRODUCTO 
										SET PRO_NAME = :proName, 
											TIENDA_TIE_ID = :proStore, 
											PRO_PRICE = :proPrice, 
											PRO_STOCK = :proStock
										WHERE PRO_ID = :proId');

			$sql->bindParam(':proId', $proId);
			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->bindParam(':proPrice', $proPrice);
			$sql->bindParam(':proStock', $proStock);

			$this->product = $sql->execute();
			
			return $this->product;

		}

		public function delProduct($proId){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE PRODUCTO 
										SET	PRO_ACTIVE = 0
										WHERE PRO_ID = :proId');

			$sql->bindParam(':proId', $proId);

			$this->product = $sql->execute();

			return $this->product;
		}

		public function listProducts(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  PRO_ID,
												PRO_NAME,
												PRO_PRICE,
												PRO_STOCK,
												TIE_NAME
										FROM PRODUCTO
										INNER JOIN TIENDA ON PRODUCTO.TIENDA_TIE_ID = TIENDA.TIE_ID
										WHERE PRO_ACTIVE = 1');

			$this->product = $sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;

		}
		
		public function listProductSale($tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT  PRO_NAME
										FROM PRODUCTO
										WHERE TIENDA_TIE_ID = :tienda');

			$sql->bindParam(':tienda', $tienda);
			
			$this->product = $sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;

		}

	}

?>