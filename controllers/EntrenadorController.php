<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Entrenador.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/EntrenadorDAO.php');

	class EntrenadorController{
		public function entrenadorEquipo($id){
			$entrenador = new Entrenador();
			
			$entrenadorDAO = new EntrenadorDAO();
			$entrenador = $entrenadorDAO->entrenadorEquipo($id);
			
			return $entrenador;
		}
	}
?>