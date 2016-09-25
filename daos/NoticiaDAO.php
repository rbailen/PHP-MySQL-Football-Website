<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Noticia.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');
	
	class NoticiaDAO{
		public function listarNoticias(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "SELECT * FROM Noticia order by fecha desc";
				$result = mysql_query($sql);
			
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$noticia = new Noticia();
								
							$noticia->setId($row['id']);
							$noticia->setFecha($row['fecha']);
							$noticia->setImagen($row['imagen']);
							$noticia->setTitular($row['titular']);
							$noticia->setCuerpo($row['cuerpo']);
								
							$noticias[] = $noticia;
						}
					}else{
						$noticias = null;
					}
				}
			
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
				
			return $noticias;
		}
		
		public function listarNoticiasAdmin(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$sql = "SELECT * FROM Noticia";
				$result = mysql_query($sql);
					
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$noticia = new Noticia();
		
							$noticia->setId($row['id']);
							$noticia->setFecha($row['fecha']);
							$noticia->setImagen($row['imagen']);
							$noticia->setTitular($row['titular']);
							$noticia->setCuerpo($row['cuerpo']);
		
							$noticias[] = $noticia;
						}
					}else{
						$noticias = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $noticias;
		}
		
		public function buscarNoticiaPorId($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$sql = "SELECT * FROM Noticia where id = '$id'";
				$result = mysql_query($sql);
		
				$noticia = new Noticia();
					
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$noticia->setId($row['id']);
							$noticia->setFecha($row['fecha']);
							$noticia->setImagen($row['imagen']);
							$noticia->setTitular($row['titular']);
							$noticia->setCuerpo($row['cuerpo']);
						}
					}else{
						$noticia = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $noticia;
		}
		
		public function insertarNoticia($imagen, $titular, $cuerpo){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				/* Fecha actual*/
				$fecha = date('Y-m-d H:i:s');
				
				$sql = "INSERT INTO Noticia (fecha, imagen, titular, cuerpo) VALUES ('$fecha', '$imagen', '$titular', '$cuerpo')";
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
		
		public function borrarNoticia($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "DELETE FROM Noticia where id = '$id'";
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
		
		public function editarNoticia($id, $imagen, $titular, $cuerpo){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "UPDATE Noticia SET imagen = '$imagen', titular = '$titular', cuerpo = '$cuerpo' WHERE id = $id";
				
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
	}
?>