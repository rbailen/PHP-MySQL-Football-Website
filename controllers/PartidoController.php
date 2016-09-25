<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Partido.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/PartidoDAO.php');

	class PartidoController{
		public function listarPartidos(){
			$partidos = array();
			
			$partidoDAO = new PartidoDAO();
			$partidos = $partidoDAO->listarPartidos();
			
			return $partidos;
		}
		
		public function buscarPartidosEquipo($id){
			$partidos = array();
			
			$partidoDAO = new PartidoDAO();
			$partidos = $partidoDAO->buscarPartidosEquipo($id);
			
			return $partidos;
		}
		
		public function buscarPartidoPorId($id){
			$partido = new Partido;
			
			$partidoDAO = new PartidoDAO();
			$partido = $partidoDAO->buscarPartidoPorId($id);
			
			return $partido;
		}
	}
?>