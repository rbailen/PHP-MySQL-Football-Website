<?php
	session_start();

	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/UsuarioDAO.php');

	/* Si el formulario envía el parámetro de registro de un usuario */
	if(isset($_POST['crear'])){
		$registroController = new RegistroController();
		$registroController->registrar();
	}

	class RegistroController{
		public function registrar(){
			$nombre = mysql_real_escape_string($_POST['nombre']);
			$email = mysql_real_escape_string($_POST['email']);
			$password = mysql_real_escape_string($_POST['password']);
			
			$usuarioDAO = new UsuarioDAO();
			$usuario = new Usuario();
			
			/* Buscamos si existe un usuario en BBDD con el email introducido */
			$usuario = $usuarioDAO->buscarUsuarioPorEmail($email);
			
			$entra = false;
			
			/* Si el usuario no existe lo insertamos (por defecto los usuarios que se registren no tienen perfil administrador)*/
			if($usuario == null){
				$resultado = $usuarioDAO->insertarUsuario($nombre, $email, md5($password), 0);
			}else{
				$_SESSION['error'] = 'Ya existe en BBDD un usuario con ese email';
			}
				
			if($resultado){
				$_SESSION['correcto'] = 'Se ha registrado correctamente';
			}
			
			header('Location: ../login.php?');
		}
	}
?>