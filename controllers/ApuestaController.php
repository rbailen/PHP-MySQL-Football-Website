<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Apuesta.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/ApuestaDAO.php');
	
	if(isset($_POST['crear'])){
		$apuestaController = new ApuestaController();
		$apuestaController->crearApuesta();
	}
	
	class ApuestaController{
		public function crearApuesta(){
			$usuario = $_POST['id'];
			$partido = $_POST['partido'];
			$resultado = $_POST['resultado'];
			
			$apuestaDAO = new ApuestaDAO();
			$apuesta = new Apuesta();
			
			/* Comprobamos si el usuario ha apostado antes en ese partido */
			$apuesta = $apuestaDAO->comprobarApuestaUsuario($partido, $usuario);
			
			if($apuesta == null){
				$resultado = $apuestaDAO->insertarApuesta($partido, $resultado, $usuario);
			}else{
				session_start();
				$_SESSION['apuesta'] = 'Ya ha apostado en ese partido';
			}
			
			header('Location: ../user/index.php');
		}
		
		/* Devuelve las apuestas que ha realizado un usuario */
		public function buscarApuestasUsuario($usuario){
			$apuestas = array();
			
			$apuestaDAO = new ApuestaDAO();
			$apuestas = $apuestaDAO->buscarApuestasUsuario($usuario);
			
			return $apuestas;
		}
	}
?>