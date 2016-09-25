<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/config/database.php');

	class UsuarioDAO{
		public function listarUsuarios(){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "SELECT * FROM Usuario";
				$result = mysql_query($sql);
				
				if($result) {
					// Si hay registros
					if(mysql_num_rows($result) !== 0) {
						while($row = mysql_fetch_array($result)) {
							$usuario = new Usuario();
							
							$usuario->setId($row['id']);
							$usuario->setNombre($row['nombre']);
							$usuario->setEmail($row['email']);
							$usuario->setPassword($row['password']);
							$usuario->setEs_Administrador($row['es_administrador']);
							
							$usuarios[] = $usuario;
						}	
					}else{
						$usuarios = null;
					}
				}
				
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
			
			return $usuarios;
		}
		
		public function buscarUsuarioPorEmail($email){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "SELECT * FROM Usuario where email = '$email'";
				$result = mysql_query($sql);
				
				$usuario = new Usuario();
			
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$usuario->setId($row['id']);
							$usuario->setNombre($row['nombre']);
							$usuario->setEmail($row['email']);
							$usuario->setPassword($row['password']);
							$usuario->setEs_Administrador($row['es_administrador']);
						}
					}else{
						$usuario = null;
					}
				}
			
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
				
			return $usuario;
		}
		
		public function buscarUsuarioPorId($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
		
			if($db->conectar()) {
				$sql = "SELECT * FROM Usuario where id = '$id'";
				$result = mysql_query($sql);
		
				$usuario = new Usuario();
					
				if($result) {
					// Si solo hay un registro
					if(mysql_num_rows($result) !== 0 && mysql_num_rows($result) == 1) {
						while($row = mysql_fetch_array($result)) {
							$usuario->setId($row['id']);
							$usuario->setNombre($row['nombre']);
							$usuario->setEmail($row['email']);
							$usuario->setPassword($row['password']);
							$usuario->setEs_Administrador($row['es_administrador']);
						}
					}else{
						$usuario = null;
					}
				}
					
				$db->desconectar();
			} else {
				echo "Error al conectar con la base de datos<br />";
			}
		
			return $usuario;
		}
		
		public function insertarUsuario($nombre, $email, $password, $es_administrador){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
				
			if($db->conectar()) {
				$sql = "INSERT INTO Usuario (nombre, email, password, es_administrador) VALUES ('$nombre', '$email', '$password', '$es_administrador')";
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
		
		public function borrarUsuario($id){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "DELETE FROM Usuario where id = '$id'";
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
		
		public function editarUsuario($id, $nombre, $email, $es_administrador){
			/* Comprobamos la conexión a la BBDD */
			$db = new DataBase();
			
			if($db->conectar()) {
				$sql = "UPDATE Usuario SET nombre = '$nombre', email = '$email', es_administrador = '$es_administrador' WHERE id = $id";
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