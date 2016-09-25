<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Apuesta.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class ApuestaDAO{
		public function comprobarApuestaUsuario($partido, $usuario){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "SELECT * FROM Apuesta where partido = '$partido' and usuario = '$usuario'";
				$result = mysql_query($sql);
				
				$apuesta = new Apuesta();
				
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$apuesta->setId($row['id']);
							$apuesta->setPartido($row['partido']);
							$apuesta->setResultado($row['resultado']);
							$apuesta->setUsuario($row['usuario']);
						}	
					}else{
						$apuesta = null;
					}
				}	
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $apuesta;
		}
		
		public function insertarApuesta($partido, $resultado, $usuario){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "INSERT INTO Apuesta (partido, resultado, usuario) VALUES ('$partido', '$resultado', '$usuario')";
				$result = mysql_query($sql);
				
				if($result) {
					return true;
				}else{
					return false;
				}	
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		}
		
		public function buscarApuestasUsuario($usuario){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Apuesta where usuario = '$usuario'";
				$result = mysql_query($sql);
				
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$apuesta = new Apuesta();
							
							$apuesta->setPartido($row['partido']);
							$apuesta->setResultado($row['resultado']);
							
							$apuestas[] = $apuesta;
						}	
					}else{
						$apuestas = null;
					}
				}
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $apuestas;
		}
	}
?>