<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Partido.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class PartidoDAO{
		public function listarPartidos(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Partido";
				$result = mysql_query($sql);
				
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$partido = new Partido();
							
							$partido->setId($row['id']);
							$partido->setLocal($row['local']);
							$partido->setVisitante($row['visitante']);
							$partido->setResultado($row['resultado']);
							$partido->setFecha($row['fecha']);
							
							$partidos[] = $partido;
						}	
					}else{
						$partidos = null;
					}
				}
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $partidos;
		}
		
		public function buscarPartidosEquipo($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Partido where local = '$id' or visitante = '$id'";
				$result = mysql_query($sql);
				
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$partido = new Partido();
							
							$partido->setId($row['id']);
							$partido->setLocal($row['local']);
							$partido->setVisitante($row['visitante']);
							$partido->setResultado($row['resultado']);
							$partido->setFecha($row['fecha']);
							
							$partidos[] = $partido;
						}
					}else{
						$partidos = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $partidos;
		}
		
		public function buscarPartidoPorId($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$sql = "SELECT * FROM Partido where id = '$id'";
				$result = mysql_query($sql);
		
				$partido = new Partido();
					
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$partido->setLocal($row['local']);
							$partido->setVisitante($row['visitante']);
						}
					}else{
						$partido = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $partido;
		}
		
	}
?>