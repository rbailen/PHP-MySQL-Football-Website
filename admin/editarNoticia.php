<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil administrador */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(1) || $_SESSION['esadmin'] != md5('yes')){  
		session_destroy();
		
		header('Location: ../login.php');
	}
	
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Noticia.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/NoticiaController.php');	
	
	$id = null;
	
	/* Recogemos el ID de la noticia a editar */
	if (!empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	/* Si es distinto de nulo buscamos la noticia que contiene ese ID */
	if ($id == null) {
		header("Location: noticias.php");
	} else {
		$noticiaController  = new NoticiaController();
		$noticia = $noticiaController->buscarNoticiaPorId($id);
	}
?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="Ramón Bailén Sánchez">

    <title>La Liga</title>

    <!-- CSS -->
    <link href="../resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="../resources/css/styles.css" rel="stylesheet">
    
    <!-- JS -->
	<script type="text/javascript" src="../resources/js/jquery1.12.3.js"></script>
	<script type="text/javascript" src="../resources/js/bootstrap.min.js"></script>
	
  </head>

  <body>
      <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
              <span class="sr-only">Toggle navigation</span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand">La Liga</a>
          </div>
          <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav">
              <li class="active"><a href="index.php">Inicio</a></li>
               <li><a href="usuarios.php">Usuarios</a></li>
               <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">Información<span class="caret"></span></a>
                <ul class="dropdown-menu">
                  <li><a href="equipos.php">Equipos</a></li>
                  <li><a href="clasificacion.php">Clasificación</a></li>
                  <li><a href="partidos.php">Partidos</a></li>
                </ul>
              </li>
              <li><a href="noticias.php">Noticias</a></li>
            </ul>
            
            <form method="post" action="../controllers/LoginController.php">
	            <ul class="nav navbar-nav navbar-right">
	               <li> <a class="navbar-brand">¡Hola, <?php echo $_SESSION['nombreusuario']?>!</a></li>
	      		   	<li><button class="btn-link" type="submit" name="salir" id="salir"><span class="glyphicon glyphicon-log-in"></span>&nbspCerrar sesión</button></li>
	            </ul>
            </form>
          </div>
        </div>
      </nav>
      
      <div class="container">
    
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Editar una noticia</h3>
		    		</div>
    		
	    			<form class="form-horizontal" method="post" action="../controllers/NoticiaController.php">
	    			
	    				<!-- Input hidden de la noticia que queremos editar -->
	    				<input type="hidden" name="id" value="<?php echo($noticia->getId())?>"/>
	    				
	    				 <div class="control-group">
						    <label class="control-label">Fecha:</label>
							<?php 
								$date = date_create($noticia->getFecha());
								echo date_format($date, 'd-m-Y');
							?>
						 </div>
		    			
		    			<div class="form-group">
			    			<div class="col-xs-5">
			    				<label class="control-label">Imagen:</label>
			    				<input type="text" class="form-control" name="imagen" placeholder="Imagen" value="<?php echo($noticia->getImagen())?>" required autofocus>
			    			</div>
		    			</div>
		    			
		    			<div class="form-group">
			    			<div class="col-xs-5">
			    				<label class="control-label">Titular:</label>
								<textarea class="form-control" name="titular" placeholder="Titular" rows="4" cols="50" required><?php echo($noticia->getTitular())?></textarea>
							</div>
		    			</div>
						
						<div class="form-group">
			    			<div class="col-xs-5">
			    				<label class="control-label">Cuerpo:</label>
								<textarea class="form-control" name="cuerpo" placeholder="Cuerpo" rows="4" cols="50" required><?php echo($noticia->getCuerpo())?></textarea>
							</div>
		    			</div>
		    			
		    			<div class="form-group">
			        		<button class="btn btn-success" type="submit" name="editar">Guardar</button>
			        		<a class="btn" href="noticias.php">Volver</a>
			        	</div>
			      	</form>
    		</div> 
    	</div>
  </body>
</html>