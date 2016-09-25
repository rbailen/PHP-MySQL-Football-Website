<?php
	class Apuesta{
		private $id;
		private $partido;
		private $resultado;
		private $usuario;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getPartido(){
			return $this->partido;
		}
		
		public function setPartido($partido){
			$this->partido = $partido;
		}
		
		public function getResultado(){
			return $this->resultado;
		}
		
		public function setResultado($resultado){
			$this->resultado = $resultado;
		}
		
		public function getUsuario(){
			return $this->usuario;
		}
		
		public function setUsuario($usuario){
			$this->usuario = $usuario;
		}
	}
?>