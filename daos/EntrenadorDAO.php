<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Entrenador.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class EntrenadorDAO{
		public function entrenadorEquipo($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "SELECT * FROM Entrenador where idEquipo = '$id'";
				$result = mysql_query($sql);
					
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$entrenador = new Entrenador();
								
							$entrenador->setId($row['id']);
							$entrenador->setNombre($row['nombre']);
							$entrenador->setNacionalidad($row['nacionalidad']);
							$entrenador->setEquipo($row['idEquipo']);
						}
					}else{
						$entrenador = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
				
			return $entrenador;
		}
	}
?>