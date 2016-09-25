<?php
	class Partido{
		private $id;
		private $local;
		private $visitante;
		private $resultado;
		private $fecha;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getLocal(){
			return $this->local;
		}
		
		public function setLocal($local){
			$this->local = $local;
		}
		
		public function getVisitante(){
			return $this->visitante;
		}
		
		public function setVisitante($visitante){
			$this->visitante = $visitante;
		}
		
		public function getResultado(){
			return $this->resultado;
		}
		
		public function setResultado($resultado){
			$this->resultado = $resultado;
		}
		
		public function getFecha(){
			return $this->fecha;
		}
		
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
	}
?>