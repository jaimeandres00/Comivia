<?php

	/**
	 * Nombre de archivo: order_model.php
	 *
	 * Esta clase se encarga de los datos de un objeto "orden" registrado en Comivia
	 */
	class Order{

		// Atributos de clase "Orden"
		private $code;
		private $value;
		private $details;
		private $status;
		private $user_code;
		private $item_code;

		/**
		 * Constructor de "Orden"
		 */
		function __construct($oCode,$oValue,$oDetails,$oStatus,$oUserCode,$oItemCode){
			$this->code = $oCode;
			$this->value = $oValue;
			$this->details = $oDetails;
			$this->status = $oStatus;
			$this->user_code = $oUserCode;
			$this->item_code = $oItemCode;
		}
	
		// Metodos getters y setters
		public function getCode(){
			return $this->code;
		}

		public function setCode($oCode){
			$this->code = $oCode;
		}

		public function getValue(){
			return $this->value;
		}

		public function setValue($oValue){
			$this->value = $oValue;
		}

		public function getDetails(){
			return $this->details;
		}

		public function setDetails($oDetails){
			$this->details = $oDetails;
		}

		public function getStatus(){
			return $this->status;
		}

		public function setStatus($oStatus){
			$this->status = $oStatus;
		}

		public function getUserCode(){
			return $this->user_code;
		}

		public function setUserCode($oUserCode){
			$this->user_code = $oUserCode;
		}

		public function getItemCode(){
			return $this->item_code;
		}

		public function setItemCode($oItemCode){
			$this->item_code = $oItemCode;
		}																
	}
?>