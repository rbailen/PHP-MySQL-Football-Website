<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Clasificacion.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class ClasificacionDAO{
		public function verClasificacionEquipos(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Clasificacion order by posicion asc";
				$result = mysql_query($sql);
				
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$clasificacion = new Clasificacion();
							
							$clasificacion->setPosicion($row['posicion']);
							$clasificacion->setEquipo($row['equipo']);
							$clasificacion->setPuntos($row['puntos']);
							$clasificacion->setPjugados($row['pjugados']);
							$clasificacion->setPganados($row['pganados']);
							$clasificacion->setPempatados($row['pempatados']);
							$clasificacion->setPperdidos($row['pperdidos']);
							$clasificacion->setGfavor($row['gfavor']);
							$clasificacion->setGcontra($row['gcontra']);
							$clasificacion->setDiferencia($row['diferencia']);
							
							$clasificaciones[] = $clasificacion;
						}	
					}else{
						$clasificaciones = null;
					}
				}
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $clasificaciones;
		}
		
		public function verClasificacionEquipo($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "SELECT * FROM Clasificacion where equipo = '$id'";
				$result = mysql_query($sql);
		
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$clasificacion = new Clasificacion();
								
							$clasificacion->setPosicion($row['posicion']);
							$clasificacion->setEquipo($row['equipo']);
							$clasificacion->setPuntos($row['puntos']);
							$clasificacion->setPjugados($row['pjugados']);
							$clasificacion->setPganados($row['pganados']);
							$clasificacion->setPempatados($row['pempatados']);
							$clasificacion->setPperdidos($row['pperdidos']);
							$clasificacion->setGfavor($row['gfavor']);
							$clasificacion->setGcontra($row['gcontra']);
							$clasificacion->setDiferencia($row['diferencia']);

						}
					}else{
						$clasificacion = null;
					}
				}
		
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
				
			return $clasificacion;
		}
		
	}
?>