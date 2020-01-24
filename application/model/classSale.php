<?php 

	require_once 'classDatabase.php';
	date_default_timezone_set("Chile/Continental");
	class Sale{

		private $sale;

		public function addSale($venNumber, $venStore, $venClient, $venPhone, $usuId, $venTotal, $montaje, $vidrios){
			$dia = $this->getDia();
			$hora = $this->getHora();

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO VENTA (VEN_CORRELATIVE, TIENDA_TIE_ID, 	VEN_CLI_NAME, VEN_CLI_PHONE, USUARIO_USU_ID, VEN_DATE_CREATE, VEN_HOUR_CREATE, VEN_COM_TOTAL, VEN_MONTAJE, VEN_CRISTALES) 
				VALUES (:venNumber, :venStore, :venClient, :venPhone, :usuId, :venDay, :venHour, :venTotal, :montaje, :vidrios)');

			$sql->bindParam(':venNumber'	, $venNumber);
			$sql->bindParam(':venStore'		, $venStore);
			$sql->bindParam(':venClient'	, $venClient);
			$sql->bindParam(':venPhone'		, $venPhone);
			$sql->bindParam(':usuId'		, $usuId);
			$sql->bindParam(':venDay'		, $dia);
			$sql->bindParam(':venHour'		, $hora);
			$sql->bindParam(':venTotal'		, $venTotal);
			$sql->bindParam(':montaje'		, $montaje);
			$sql->bindParam(':vidrios'		, $vidrios);

			$this->sale = $sql->execute();

			return $this->sale;

		}

		public function getSale($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT VEN_ID, VEN_CORRELATIVE, VEN_DATE_CREATE, VEN_HOUR_CREATE, 
				VEN_CLI_NAME, VEN_CLI_PHONE, VEN_COM_TOTAL
				FROM VENTA
				WHERE VEN_ID = :id');

			$sql->bindParam(':id'	, $id);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function getDetail($id, $tipo){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DET_INTERP, DET_OD_1, DET_CLI_1, DET_EJE_1, 
				DET_OD_2, DET_CLI_2, DET_EJE_2, PRO_NAME
				FROM DETALLE
				INNER JOIN PRODUCTO ON DETALLE.PRODUCTO_PRO_ID = PRODUCTO.PRO_ID
				WHERE VENTA_VEN_ID = :id
				AND DET_TYPE = :tipo');

			$sql->bindParam(':id'	, $id);
			$sql->bindParam(':tipo'	, $tipo);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function getCaptador($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT CAP_NAME
				FROM CAPTADOR
				INNER JOIN COMISION ON CAPTADOR.CAP_ID = COMISION.CAPTADOR_CAP_ID
				WHERE COMISION.VENTA_VEN_ID = :id');

			$sql->bindParam(':id'	, $id);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function getAbono($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT SUM(ABO_TOTAL) AS ABONOS
				FROM ABONO
				WHERE VENTA_VEN_ID = :id');

			$sql->bindParam(':id'	, $id);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function updateDelivery($id){
			$dia = $this->getDia();
			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE DESPACHO SET
				DES_DATE = :dia
				WHERE VENTA_VEN_ID = :id');

			$sql->bindParam(':id'	, $id);
			$sql->bindParam(':dia'	, $dia);

			$this->sale = $sql->execute();

		}

		public function pagarComision($id){
			$res = 'Si';
			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE COMISION SET
				COM_PAID = :res
				WHERE VENTA_VEN_ID = :id');

			$sql->bindParam(':id'	, $id);
			$sql->bindParam(':res'	, $res);

			$this->sale = $sql->execute();

		}

		public function getTipoPago($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT *
				FROM ABONO
				WHERE VENTA_VEN_ID = :id
				AND METODO_PAGO_MET_ID = 2');

			$sql->bindParam(':id'	, $id);

			$this->sale = $sql->execute();
			$this->sale = $sql->rowCount();

			return $this->sale;

		}

		public function modificarComision($id){

			$objConn = new Database();
			$sql = $objConn->prepare('UPDATE COMISION SET
				COM_TOTAL = (((SELECT VEN_COM_TOTAL FROM VENTA WHERE VEN_ID = :id)*0.9)-(SELECT VEN_CRISTALES FROM VENTA WHERE VEN_ID = :id)-(SELECT VEN_MONTAJE FROM VENTA WHERE VEN_ID = :id))*0.5
				WHERE VENTA_VEN_ID = :id');

			$sql->bindParam(':id'	, $id);

			$this->sale = $sql->execute();
		}

		public function getDelivery($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT DES_CRISTAL, DES_ALTURA, DES_DATE
				FROM DESPACHO
				WHERE VENTA_VEN_ID = :id');

			$sql->bindParam(':id'	, $id);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function getUltima($tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(VEN_ID) AS max FROM VENTA WHERE TIENDA_TIE_ID = :tienda');

			$sql->bindParam(':tienda', $tienda);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;
		}

		public function addDespacho($ventaId, $venCristal, $venAltura){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO DESPACHO (DES_CRISTAL, DES_ALTURA, VENTA_VEN_ID) 
				VALUES (:venCristal, :venAltura, :ventaId)');

			$sql->bindParam(':venCristal'	, $venCristal);
			$sql->bindParam(':venAltura'	, $venAltura);
			$sql->bindParam(':ventaId'		, $ventaId);

			$this->sale = $sql->execute();

			return $this->sale;
		}

		public function addDetail($venNumber, $lejos_l_1, $lejos_o_1, $lejos_c_1, $lejos_e_1, $lejos_o_2, $lejos_c_2, $lejos_e_2, $tipo, $name, $tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO DETALLE (VENTA_VEN_ID, DET_INTERP, DET_OD_1, DET_CLI_1, DET_EJE_1, DET_OD_2, DET_CLI_2, DET_EJE_2, DET_TYPE, PRODUCTO_PRO_ID, DET_PRO_PRICE) 
				VALUES (:venNumber, :lejos_l_1, :lejos_o_1, :lejos_c_1, :lejos_e_1, :lejos_o_2, :lejos_c_2, :lejos_e_2, :tipo, 
				COALESCE((SELECT PRO_ID FROM PRODUCTO WHERE PRO_NAME = :name AND TIENDA_TIE_ID = :tienda),0), COALESCE((SELECT PRO_PRICE FROM PRODUCTO WHERE PRO_NAME = :name AND TIENDA_TIE_ID = :tienda),0))');
			
			$sql->bindParam(':venNumber'	, $venNumber);
			$sql->bindParam(':lejos_l_1'	, $lejos_l_1);
			$sql->bindParam(':lejos_o_1'	, $lejos_o_1);
			$sql->bindParam(':lejos_c_1'	, $lejos_c_1);
			$sql->bindParam(':lejos_e_1'	, $lejos_e_1);
			$sql->bindParam(':lejos_o_2'	, $lejos_o_2);
			$sql->bindParam(':lejos_c_2'	, $lejos_c_2);
			$sql->bindParam(':lejos_e_2'	, $lejos_e_2);
			$sql->bindParam(':tipo'	, $tipo);
			$sql->bindParam(':name'	, $name);
			$sql->bindParam(':tienda'	, $tienda);

			$this->sale = $sql->execute();
			$this->descuento($name, $tienda);

			return $this->sale;

		}

		public function descuento($name, $tienda){
			$objConn = new Database();
			$sql = $objConn->prepare('UPDATE PRODUCTO 
				SET PRO_STOCK = PRO_STOCK - 1
				WHERE PRO_NAME = :name
				AND TIENDA_TIE_ID = :tienda');

			$sql->bindParam(':name'	, $name);
			$sql->bindParam(':tienda'	, $tienda);

			if($name!=null){
				$this->sale = $sql->execute();
			}
		}

		public function primerAbono($abono, $venta, $metodo){
			$dia = $this->getDia();

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO ABONO (ABO_DATE, ABO_TOTAL, VENTA_VEN_ID, METODO_PAGO_MET_ID) 
				VALUES (:dia, :abono, :venta, :metodo)');
			
			$sql->bindParam(':dia'		, $dia);
			$sql->bindParam(':abono'	, $abono);
			$sql->bindParam(':venta'	, $venta);
			$sql->bindParam(':metodo'	, $metodo);

			$this->sale = $sql->execute();

			return $this->sale;

		}

		public function addComision($total, $venta, $captador, $nameLejos, $nameCerca, $val, $abono){

			$dia = $this->getDia();
			foreach ((array) $this->getTotal($nameLejos,$nameCerca)as $key ) {
				foreach ($key as $key2 => $value) {
					$valorMarcos = intval($value);
				}
			}

			$valorComision = ($total-$valorMarcos)*$val;
			$paid = ($valorComision<$abono)?'Si':'No';

			$objConn = new Database();
			$sql = $objConn->prepare('	INSERT INTO COMISION (COM_TOTAL, COM_PAID, VENTA_VEN_ID, CAPTADOR_CAP_ID) 
				VALUES (:valorComision, :paid, :venta, (SELECT CAP_ID FROM CAPTADOR WHERE CAP_NAME = :captador))');
			
			$sql->bindParam(':valorComision', 	$valorComision);
			$sql->bindParam(':paid', 			$paid);
			$sql->bindParam(':venta',	 		$venta);
			$sql->bindParam(':captador', 		$captador);

			$this->sale = $sql->execute();

			return $this->sale;

		}

		public function getTotal($marco1, $marco2){
			$objConn = new Database();
			$sql = $objConn->prepare('SELECT COALESCE((SELECT PRO_PRICE FROM PRODUCTO 
				WHERE PRO_NAME = :marco1), 0)+
				COALESCE((SELECT PRO_PRICE FROM PRODUCTO WHERE PRO_NAME = :marco2), 0) AS SUMA
				FROM PRODUCTO LIMIT 1');
			
			$sql->bindParam(':marco1', $marco1);
			$sql->bindParam(':marco2', $marco2);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);
			return $this->sale;
		}

		public function maxNumber($store){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT MAX(VEN_CORRELATIVE)+1 AS max FROM VENTA WHERE TIENDA_TIE_ID = :store');

			$sql->bindParam(':store', $store);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}

		public function getDia(){

			$year = date("Y");
			$month = date("m");
			$day = date("d");

			return $year."/".$month."/".$day;

		}

		public function getHora(){

			$hour = date("H");
			$min = date("i");

			return $hour.":".$min ;

		}

		public function getDate(){

			$year = date("Y");
			$month = date("m");
			$day = date("d");
			$hour = date("H");
			$min = date("i");

			return $day."/".$month."/".$year." ".$hour.":".$min ;

		}
		
		public function listSalePending($tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT VEN_ID, VEN_CORRELATIVE, TIENDA_TIE_ID, VEN_CLI_NAME, SUM(ABO_TOTAL) AS ABO_TOTAL, VEN_DATE_CREATE,
				(VEN_COM_TOTAL-SUM(ABO_TOTAL)) AS PENDIENTE
				FROM VENTA
				INNER JOIN ABONO ON VENTA.VEN_ID = ABONO.VENTA_VEN_ID
				INNER JOIN DESPACHO ON VENTA.VEN_ID = DESPACHO.VENTA_VEN_ID
				WHERE DESPACHO.DES_DATE IS NULL
				AND VEN_DATE_CREATE IS NOT NULL
				AND TIENDA_TIE_ID = :tienda
				GROUP BY VEN_CORRELATIVE');
			
			$sql->bindParam(':tienda', $tienda);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}
		
		public function totalesPendientes($tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT COUNT(VEN_ID) AS CANTIDAD, (SUM(VEN_COM_TOTAL)-SUM(ABO_TOTAL)) AS PENDIENTE
				FROM VENTA
				INNER JOIN ABONO ON VENTA.VEN_ID = ABONO.VENTA_VEN_ID
				INNER JOIN DESPACHO ON VENTA.VEN_ID = DESPACHO.VENTA_VEN_ID
				WHERE DESPACHO.DES_DATE IS NULL
				AND VEN_DATE_CREATE IS NOT NULL
				AND TIENDA_TIE_ID = :tienda');
			
			$sql->bindParam(':tienda', $tienda);

			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}
		
		public function listSaleFinishing($tienda){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT VEN_ID, VEN_CORRELATIVE, VEN_CLI_NAME, VEN_COM_TOTAL, VEN_DATE_CREATE, DES_DATE, TIENDA_TIE_ID
				FROM VENTA
				INNER JOIN DESPACHO ON VENTA.VEN_ID = DESPACHO.VENTA_VEN_ID
				WHERE DESPACHO.DES_DATE IS NOT NULL
				AND TIENDA_TIE_ID = :tienda
				GROUP BY VEN_CORRELATIVE');

			$sql->bindParam(':tienda', $tienda);
			
			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}
		
		public function anularVenta($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE VENTA SET 
				VEN_DATE_CREATE = NULL,
				VEN_COM_TOTAL = 0
				WHERE VEN_ID = :id');
			$sql->bindParam(':id', $id);
			$this->sale = $sql->execute();

			return $this->sale;

		}
		public function anularAbono($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE ABONO SET 
				ABO_TOTAL = 0
				WHERE VENTA_VEN_ID = :id');
			$sql->bindParam(':id', $id);
			$this->sale = $sql->execute();

			return $this->sale;

		}
		public function anularProducto($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	UPDATE PRODUCTO
				INNER JOIN DETALLE ON DETALLE.PRODUCTO_PRO_ID = PRODUCTO.PRO_ID
				SET PRO_STOCK = PRO_STOCK+1
				WHERE VENTA_VEN_ID = :id');
			$sql->bindParam(':id', $id);
			$this->sale = $sql->execute();

			return $this->sale;

		}
		
		public function listaAbonos($id){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT ABO_DATE, ABO_TOTAL, MET_NAME
				FROM ABONO
				INNER JOIN METODO_PAGO ON METODO_PAGO.MET_ID = ABONO.METODO_PAGO_MET_ID
				WHERE ABONO.VENTA_VEN_ID = :id');

			$sql->bindParam(':id', $id);
			
			$this->sale = $sql->execute();
			$this->sale = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->sale;

		}
			
	}
		
?>