<?php
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Noticia.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/daos/NoticiaDAO.php');
	
	/* Recogemos el ID de la noticia a borrar */
	$id = null;
	
	/* Si el formulario envía el parámetro de creación de noticias por parte del administrador */
	if(isset($_POST['crear'])){
		$noticiaController = new noticiaController();
		$noticiaController->crearNoticia();
		
	/* Si el formulario envía el parámetro de edición de noticias por parte del administrador */
	}if(isset($_POST['editar'])){
		$noticiaController = new NoticiaController();
		$noticiaController->editarNoticia();
		
	/* Si el formulario envía el parámetro de borrado de noticias por parte del administrador */	
	}else if(isset($_REQUEST['action'])) {
		$id = $_REQUEST['id'];
		
		/* Si es distinto de nulo la borramos a partir de su ID */
		if ($id == null) {
			header("Location: ../admin/noticias.php");
		} else {
			$noticiaController  = new NoticiaController();
			$noticiaController->borrarNoticia($id);
		}
	}

	class NoticiaController{
		public function listarNoticias(){
			$noticias = array();
			$noticia = new Noticia();
			
			$noticiaDAO = new NoticiaDAO();
			$noticias = $noticiaDAO->listarNoticias();
			
			/* Almacenamos en un array las 3 primeras noticias */
			for ($i=0; $i<3; $i++){
				$noticia = $noticias[$i];
				$tres_noticias[] = $noticia;
			}
			
			return $tres_noticias;
		}
		
		public function listarNoticiasAdmin(){
			$noticias = array();
				
			$noticiaDAO = new NoticiaDAO();
			$noticias = $noticiaDAO->listarNoticiasAdmin();
				
			return $noticias;
		}
		
		public function crearNoticia(){
			$imagen = $_POST['imagen'];
			$titular = $_POST['titular'];
			$cuerpo = $_POST['cuerpo'];
			
			$noticiaDAO = new NoticiaDAO();
			$noticia = new Noticia();
			
			$resultado = $noticiaDAO->insertarNoticia($imagen, $titular, $cuerpo);
			
			header('Location: ../admin/noticias.php');
		}
		
		public function borrarNoticia($id){
			$noticiaDAO = new NoticiaDAO();
			$noticiaDAO->borrarNoticia($id);
			
			header('Location: ../admin/noticias.php');
		}
		
		public function editarNoticia(){
			$id = $_POST['id'];
			$imagen = $_POST['imagen'];
			$titular = $_POST['titular'];
			$cuerpo = $_POST['cuerpo'];
			
			$noticiaDAO = new NoticiaDAO();
			$noticia = new Noticia();
			
			/* Buscamos la noticia que contiene ese ID */
			$noticia = $noticiaDAO->buscarNoticiaPorId($id);
			
			/* Si la noticia existe la editamos */
			if($noticia != null){
				$resultado = $noticiaDAO->editarNoticia($id, $imagen, $titular, $cuerpo);
			}
			
			header('Location: ../admin/noticias.php');
		}
		
		public function buscarNoticiaPorId($id){
			$noticia = new Noticia();
			
			$noticiaDAO = new NoticiaDAO();
			$noticia = $noticiaDAO->buscarNoticiaPorId($id);
			
			return $noticia;
		}
	}
?>