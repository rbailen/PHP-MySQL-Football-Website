<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Estadio.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class EstadioDAO{
		public function buscarEstadioPorId($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$sql = "SELECT * FROM Estadio where id = '$id'";
				$result = mysql_query($sql);
		
				$estadio = new Estadio();
					
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$estadio->setId($row['id']);
							$estadio->setNombre($row['nombre']);
							$estadio->setCiudad($row['ciudad']);
						}
					}else{
						$estadio = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $estadio;
		}
	}
?>