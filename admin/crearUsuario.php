<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil administrador */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(1) || $_SESSION['esadmin'] != md5('yes')){  
		session_destroy();
		
		header('Location: ../login.php');
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
		    			<h3>Crear un usuario</h3>
		    		</div>
    		
	    			<form class="form-horizontal" method="post" action="../controllers/UsuarioController.php">
		    			<div class="form-group">
			    			<div class="col-xs-5">
			    				<input type="text" class="form-control" name="nombre" placeholder="Nombre" required autofocus>
			    			</div>
		    			</div>
		    			
		    			<div class="form-group">
			    			<div class="col-xs-5">
			    				<label for="inputEmail" class="sr-only">Email address</label>
			    				<input type="email" id="inputEmail" class="form-control" name="email" placeholder="Email" required>
			    			</div>
		    			</div>
		    			
		    			<div class="form-group">
			    			<div class="col-xs-5">
			    				<label for="inputPassword" class="sr-only">Password</label>
			    				<input type="password" id="inputPassword" class="form-control" name="password" placeholder="Contraseña" required>
			    			</div>
		    			</div>
		    			
		    			<div class="form-group">
		    				<div class="col-xs-5">
							    <select class="form-control" name="es_administrador" required>
							        <option value="">Tipo de usuario:</option>
								    <option value="1">Administrador</option>
								    <option value="0">Usuario</option>
							    </select>
						    </div>
					     </div>
		    			
		    			<div class="form-group">
			        		<button class="btn btn-success" type="submit" name="crear">Crear</button>
			        		<a class="btn" href="usuarios.php">Volver</a>
			        	</div>
			      	</form>
    		</div> 
    	</div>
  </body>
</html>