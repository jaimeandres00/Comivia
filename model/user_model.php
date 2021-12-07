<?php  

	/**
	 * Nombre de archivo: user_model.php
	 *
	 * Esta clase se encarga de los datos de un objeto "usuario" registrado en Comivia
	 */
	class User{

		// Atributos de clase "Usuario"
		private $code;
		private $name;
		private $lastName;
		private $email;
		private $password;
		private $cellphoneNumber;

		/**
		 * Constructor de "Usuario"
		 */
		function __construct($uCode,$uName,$uLastName,$uEmail,$uPassword,$uCellphoneNumber){
			$this->code = $uCode;
			$this->name = $uName;
			$this->lastName = $uLastName;
			$this->email = $uEmail;
			$this->password = $uPassword;
			$this->cellphoneNumber = $uCellphoneNumber;
		}

		// Metodos getters y setters
		public function getCode(){
			return $this->code;
		}

		public function setCode($uCode){
			$this->code = $uCode;
		}

		public function getName(){
			return $this->name;
		}

		public function setName($uName){
			$this->name = $uName;
		}

		public function getLastName(){
			return $this->lastName;
		}

		public function setLastName($uLastName){
			$this->lastName = $uLastName;
		}

		public function getEmail(){
			return $this->email;
		}

		public function setEmail($uEmail){
			$this->email = $uEmail;
		}

		public function getPassword(){
			return $this->password;
		}

		public function setPassword($uPassword){
			$this->password = $uPassword;
		}

		public function getCellphoneNumber(){
			return $this->cellphoneNumber;
		}

		public function setCellphoneNumber($uCellphoneNumber){
			$this->cellphoneNumber = $uCellphoneNumber;
		}														
	}
?>