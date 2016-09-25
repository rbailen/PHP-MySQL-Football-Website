<?php
	session_start();

	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/UsuarioDAO.php');

	/* Si el formulario envía el parámetro de acceder a la aplicación */
	if(isset($_POST['acceder'])){
		$loginController = new LoginController();
		$loginController->login();
	}
	
	/* Si el formulario envía el parámetro de salir de la aplicación */
	if(isset ($_POST['salir'])){
		$loginController = new LoginController();
		$loginController->logout();
	}

	class LoginController{
		
		public function login(){
			$email = $_POST['email'];
			$password = $_POST['password']; 
			
			$usuarioDAO = new UsuarioDAO();
			$usuario = new Usuario();
			
			$usuario = $usuarioDAO->buscarUsuarioPorEmail($email); //Podría buscarse todo directamente en BBDDD
			
			/* Si el usuario existe y su contraseña es válida */
			if($usuario != null && strcmp(md5($password), $usuario->getPassword()) == 0){
				/* Comprobamos si es o no administrador */
				if($usuario->getEs_Administrador() == 1){
					/* Si es administrador guardamos en sesión el ID de la misma, 
					   el ID del usuario, el indicador de que es administrador 
					   y el nombre del usuario */
					$_SESSION['keyid'] = md5(session_id());
					$_SESSION['idusuario'] = $usuario->getId();
					$_SESSION['esadmin'] = md5('yes');
					$_SESSION['nombreusuario'] = $usuario->getNombre();
					
					header('Location: ../admin/index.php');
				}else{
					/* Si no es administrador guardamos en sesión el ID de la misma, 
					   el ID del usuario y el indicador de que no es administrador 
					   y el nombre del usuario */
					$_SESSION['keyid'] = md5(session_id());
					$_SESSION['idusuario'] = $usuario->getId();
					$_SESSION['esadmin'] = md5('no');
					$_SESSION['nombreusuario'] = $usuario->getNombre();
					
					header('Location: ../user/index.php');
				}
			}else{
				$_SESSION['error'] = 'El email o la contraseña son incorrectos';
				header('Location: ../login.php?');
			}
			
		}
		
		public function logout(){
			/* Se destruye la sesión */
			session_destroy();
				
			header('Location: ../login.php');
		}	
		
	}
?>