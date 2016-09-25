<?php
	class Estadio{
		private $id;
		private $nombre;
		private $ciudad;
	
		public function getId(){
			return $this->id;
		}
	
		public function setId($id){
			$this->id = $id;
		}
	
		public function getNombre(){
			return $this->nombre;
		}
	
		public function setNombre($nombre){
			$this->nombre = $nombre;
		}
	
		public function getCiudad(){
			return $this->ciudad;
		}
	
		public function setCiudad($ciudad){
			$this->ciudad = $ciudad;
		}
	}
?>