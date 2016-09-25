<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Jugador.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class JugadorDAO{
		public function listarJugadoresEquipo($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Jugador where idEquipo = '$id'";
				$result = mysql_query($sql);
			
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$jugador = new Jugador();
							
							$jugador->setId($row['id']);
							$jugador->setNombre($row['nombre']);
							$jugador->setNacionalidad($row['nacionalidad']);
							$jugador->setEquipo($row['idEquipo']);
							
							$jugadores[] = $jugador;
						}
					}else{
						$jugadores = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $jugadores;
		}
	}
?>