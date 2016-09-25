<?php
	class Clasificacion{
		private $id;
		private $posicion;
		private $equipo;
		private $puntos;
		private $pjugados;
		private $pganados;
		private $pempatados;
		private $pperdidos;
		private $gfavor;
		private $gcontra;
		private $diferencia;
		
		public function getId(){
			return $this->id;
		}
		
		public function setId($id){
			$this->id = $id;
		}
		
		public function getPosicion(){
			return $this->posicion;
		}
		
		public function setPosicion($posicion){
			$this->posicion = $posicion;
		}
		
		public function getEquipo(){
			return $this->equipo;
		}
		
		public function setEquipo($equipo){
			$this->equipo = $equipo;
		}
		
		public function getPuntos(){
			return $this->puntos;
		}
		
		public function setPuntos($puntos){
			$this->puntos = $puntos;
		}
		
		public function getPjugados(){
			return $this->pjugados;
		}
		
		public function setPjugados($pjugados){
			$this->pjugados = $pjugados;
		}
		
		public function getPganados(){
			return $this->pganados;
		}
		
		public function setPganados($pganados){
			$this->pganados = $pganados;
		}
		
		public function getPempatados(){
			return $this->pempatados;
		}
		
		public function setPempatados($pempatados){
			$this->pempatados = $pempatados;
		}
		
		public function getPperdidos(){
			return $this->pperdidos;
		}
		
		public function setPperdidos($pperdidos){
			$this->pperdidos = $pperdidos;
		}
		
		public function getGfavor(){
			return $this->gfavor;
		}
		
		public function setGfavor($gfavor){
			$this->gfavor = $gfavor;
		}
		
		public function getGcontra(){
			return $this->gcontra;
		}
		
		public function setGcontra($gcontra){
			$this->gcontra = $gcontra;
		}
		
		public function getDiferencia(){
			return $this->diferencia;
		}
		
		public function setDiferencia($diferencia){
			$this->diferencia = $diferencia;
		}
	}
?>