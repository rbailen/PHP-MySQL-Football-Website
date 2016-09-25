<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Equipo.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class EquipoDAO{
		public function listarEquipos(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Equipo";
				$result = mysql_query($sql);
				
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$equipo = new Equipo();
							
							$equipo->setId($row['id']);
							$equipo->setNombre($row['nombre']);
							
							$equipos[] = $equipo;
						}	
					}else{
						$equipos = null;
					}
				}
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $equipos;
		}
		
		public function buscarEquipoPorId($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$sql = "SELECT * FROM Equipo where id = '$id'";
				$result = mysql_query($sql);
		
				$equipo = new Equipo();
					
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$equipo->setId($row['id']);
							$equipo->setNombre($row['nombre']);
							$equipo->setEstadio($row['idEstadio']);
						}
					}else{
						$equipo = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $equipo;
		}
		
	}
?>