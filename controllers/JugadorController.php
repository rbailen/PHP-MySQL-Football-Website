<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Jugador.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/JugadorDAO.php');

	class JugadorController{
		public function listarJugadoresEquipo($id){
			$jugadores = array();
			
			$jugadorDAO = new JugadorDAO();
			$jugadores = $jugadorDAO->listarJugadoresEquipo($id);
			
			return $jugadores;
		}
	}
?>