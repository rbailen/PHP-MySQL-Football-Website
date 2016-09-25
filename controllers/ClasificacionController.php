<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Clasificacion.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/ClasificacionDAO.php');

	class ClasificacionController{
		/* Devuelve un array de clasificaciones con los datos de cada uno de los equipos ordenadas por posición */
		public function verClasificacionEquipos(){
			$clasificaciones = array();
			
			$clasificacionDAO = new ClasificacionDAO();
			$clasificaciones = $clasificacionDAO->verClasificacionEquipos();
			
			return $clasificaciones;
		}
		
		/* Devuelve el objeto clasificación de un equipo, con sus respectivos datos */
		public function verClasificacionEquipo($id){
			$clasificacion = new Clasificacion();
			
			$clasificacionDAO = new ClasificacionDAO();
			$clasificacion = $clasificacionDAO->verClasificacionEquipo($id);
			
			return $clasificacion;
		}
	}
?>