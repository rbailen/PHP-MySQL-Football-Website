<?php
	class Noticia{
		private $id;
		private $fecha;
		private $imagen;
		private $titular;
		private $cuerpo;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getFecha(){
			return $this->fecha;
		}
		
		public function setFecha($fecha){
			$this->fecha = $fecha;
		}
		
		public function getImagen(){
			return $this->imagen;
		}
		
		public function setImagen($imagen){
			$this->imagen = $imagen;
		}

		public function getTitular(){
			return $this->titular;
		}
		
		public function setTitular($titular){
			$this->titular = $titular;
		}

		public function getCuerpo(){
			return $this->cuerpo;
		}
		
		public function setCuerpo($cuerpo){
			$this->cuerpo = $cuerpo;
		}
	}
?>