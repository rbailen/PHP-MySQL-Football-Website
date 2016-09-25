<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Estadio.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/EstadioDAO.php');

	class EstadioController{
		public function buscarEstadioPorId($id){
			$estadio = new Estadio();
			
			$estadioDAO = new EstadioDAO();
			$estadio = $estadioDAO->buscarEstadioPorId($id);
			
			return $estadio;
		}
	}
?>
