<?php

	require_once 'classDatabase.php';

	class Product{

		private $product;

		public function selectProduct($proName, $proStore){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT pro_id 
										FROM producto 
										WHERE pro_name = :proName
										AND pro_store = :proStore');
			$sql->bindParam(':proName', $proName);
			$sql->bindParam(':proStore', $proStore);
			$sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

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

		public function updateProduct($proId, $proCodigo, $proMarca, $proColor, $proStock, $proDescripcion){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE producto 
										SET pro_codigo = :proCodigo, pro_stock = :proStock, marca_mar_id = :proMarca, color_col_id = :proColor, pro_descripcion = :proDescripcion
										WHERE pro_id = :proId');

			$sql->bindParam(':proId', $proId);
			$sql->bindParam(':proCodigo', $proCodigo);
			$sql->bindParam(':proMarca', $proMarca);
			$sql->bindParam(':proColor', $proColor);
			$sql->bindParam(':proStock', $proStock);
            $sql->bindParam(':proDescripcion', $proDescripcion);

			$this->producto = $sql->execute();

			return $this->producto;

		}

		public function delProduct($proId){

			$objConn = new Database();
			$sql = $objConn->prepare('	DELETE FROM producto WHERE pro_id = :proId');

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
										FROM producto');

			$this->product = $sql->execute();
			$this->product = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->product;

		}

	}

?>