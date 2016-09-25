<?php
	class Usuario{
		private $id;
		private $nombre;
		private $email;
		private $password;
		private $es_administrador;
		
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
		
		public function getEmail(){
			return $this->email;
		}
		
		public function setEmail($email){
			$this->email = $email;
		}
		
		public function getPassword(){
			return $this->password;
		}
		
		public function setPassword($password){
			$this->password = $password;
		}
		
		public function getEs_Administrador(){
			return $this->es_administrador;
		}
		
		public function setEs_Administrador($es_administrador){
			$this->es_administrador = $es_administrador;
		}
	}
?>