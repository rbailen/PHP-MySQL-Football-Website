<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Equipo.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/EquipoDAO.php');

	class EquipoController{
		public function listarEquipos(){
			$equipos = array();
			
			$equipoDAO = new EquipoDAO();
			$equipos = $equipoDAO->listarEquipos();
			
			return $equipos;
		}
		
		public function buscarEquipoPorId($id){
			$equipo = new Equipo();
			
			$equipoDAO = new EquipoDAO();
			$equipo = $equipoDAO->buscarEquipoPorId($id);
			
			return $equipo;
		}
	}
?>