<?php 

	require_once 'classDatabase.php';

	class User{

		private $user = array();

		public function selectUser($userRut, $userPass){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT usu_id 
										FROM usuario 
										WHERE usu_rut = :userRut
										AND usu_pass = :userPass');

			$sql->bindParam(':userRut', $userRut);
			$sql->bindParam(':userPass', $userPass);

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

		public function listUsers(){

			$objConn = new Database();
			$sql = $objConn->prepare('	SELECT * 
										FROM usuario');

			$this->user = $sql->execute();
			$this->user = $sql->fetchAll(PDO::FETCH_ASSOC);

			return $this->user;

		}

	}

?>