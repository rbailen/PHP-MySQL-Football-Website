<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Usuario.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/UsuarioDAO.php');

	/* Recogemos el ID del usuario a borrar */
	$id = null;
	
	/* Si el formulario envía el parámetro de creación de usuarios por parte del administrador */
	if(isset($_POST['crear'])){
		$usuarioController = new UsuarioController();
		$usuarioController->crearUsuario();
		
	/* Si el formulario envía el parámetro de edición de usuarios por parte del administrador */	
	}if(isset($_POST['editar'])){
		$usuarioController = new UsuarioController();
		$usuarioController->editarUsuario();
		
	/* Si el formulario envía el parámetro de borrado de usuarios por parte del administrador */	
	}else if(isset($_REQUEST['action'])) {
		$id = $_REQUEST['id'];
		
		/* Si es distinto de nulo lo borramos a partir de su ID */
		if ($id == null) {
			header("Location: ../admin/usuarios.php");
		} else {
			$usuarioController  = new UsuarioController();
			$usuarioController->borrarUsuario($id);
		}
	}
	
	class UsuarioController{
		public function listarUsuarios(){
			$usuarios = array();
			
			$usuarioDAO = new UsuarioDAO();
			$usuarios = $usuarioDAO->listarUsuarios();
			
			return $usuarios;
		}
		
		public function crearUsuario(){
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$password = $_POST['password'];
			$es_administrador = $_POST['es_administrador'];
			
			$usuarioDAO = new UsuarioDAO();
			$usuario = new Usuario();
			
			/* Buscamos si existe un usuario en BBDD con el email introducido */
			$usuario = $usuarioDAO->buscarUsuarioPorEmail($email);
			
			/* Si el usuario no existe lo insertamos */
			if($usuario == null){
				$resultado = $usuarioDAO->insertarUsuario($nombre, $email, md5($password), $es_administrador);
			}else{
				$_SESSION['cuenta'] = 'Ya existe en BBDD un usuario con ese email'; //Comprobar que funciona
			}
			
			header('Location: ../admin/usuarios.php');
		}
		
		public function borrarUsuario($id){
			$usuarioDAO = new UsuarioDAO();
			$usuarioDAO->borrarUsuario($id);
			
			header('Location: ../admin/usuarios.php');
		}
		
		public function editarUsuario(){
			$id = $_POST['id'];
			$nombre = $_POST['nombre'];
			$email = $_POST['email'];
			$es_administrador = $_POST['es_administrador'];
			
			$usuarioDAO = new UsuarioDAO();
			$usuario = new Usuario();
			
			/* Buscamos al usuario que contiene ese ID */
			$usuario = $usuarioDAO->buscarUsuarioPorId($id);
			
			/* Si el usuario existe lo editamos */
			if($usuario != null){
				$resultado = $usuarioDAO->editarUsuario($id, $nombre, $email, $es_administrador);
			}
			
			header('Location: ../admin/usuarios.php');
		}
		
		public function buscarUsuarioPorId($id){
			$usuario = new Usuario();
			
			$usuarioDAO = new UsuarioDAO();
			$usuario = $usuarioDAO->buscarUsuarioPorId($id);
			
			return $usuario;
		}
		
		public function buscarUsuarioPorEmail($email){
			$usuario = new Usuario();
				
			$usuarioDAO = new UsuarioDAO();
			$usuario = $usuarioDAO->buscarUsuarioPorEmail($email);
				
			return $usuario;
		}
	}
?>