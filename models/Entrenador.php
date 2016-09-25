<?php
	class Entrenador{
		private $id;
		private $nombre;
		private $nacionalidad;
		private $equipo;
		
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
		
		public function getNacionalidad(){
			return $this->nacionalidad;
		}
		
		public function setNacionalidad($nacionalidad){
			$this->nacionalidad = $nacionalidad;
		}
		
		public function getEquipo(){
			return $this->equipo;
		}
		
		public function setEquipo($equipo){
			$this->equipo = $equipo;
		}
	}
?>