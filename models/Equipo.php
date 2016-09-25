<?php
	class Equipo{
		private $id;
		private $nombre;
		private $puntuacion;
		private $estadio;
		
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
		
		public function getPuntuacion(){
			return $this->puntuacion;
		}
		
		public function setPuntuacion($puntuacion){
			$this->puntuacion = $puntuacion;
		}
		
		public function getIdEstadio(){
			return $this->estadio;
		}
		
		public function setEstadio($estadio){
			$this->estadio = $estadio;
		}
	}
?>