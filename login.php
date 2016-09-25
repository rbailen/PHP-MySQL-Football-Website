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
    <link href="resources/css/bootstrap.min.css" rel="stylesheet">
    <link href="resources/css/styles.css" rel="stylesheet">
    
    <!-- JS -->
	<script type="text/javascript" src="resources/js/jquery1.12.3.js"></script>
	<script type="text/javascript" src="resources/js/bootstrap.min.js"></script>
	
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
              <li class="active"><a href="inicio.php">Inicio</a></li>
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
            <ul class="nav navbar-nav navbar-right">
               <li><a href="registro.php"><span class="glyphicon glyphicon-user"></span>&nbsp;Crear cuenta</a></li>
      		   <li><a href="login.php"><span class="glyphicon glyphicon-log-in"></span>&nbsp;Entrar</a></li>
            </ul>
          </div>
        </div>
      </nav>
      
       <div class="container">
       		
       		<!-- Error al acceder a la cuenta o al registrarse -->
	      	<?php 
	      	 	session_start();
				if (isset($_SESSION['error'])) {
	      	?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Error:</strong> <?=$_SESSION['error']?>
				</div>
			<?php 
				 unset($_SESSION['error']);
				
				/* El usuario se ha registrado correctamente */
				}else if (isset($_SESSION['correcto'])) {
			?>
				<div class="alert alert-danger alert-dismissable">
					<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
					<strong>Mensaje:</strong> <?=$_SESSION['correcto']?>
				</div>
			<?php 
				 unset($_SESSION['correcto']);
				}
			?>
			
	      <form class="form-signin" method="post" action="controllers/LoginController.php">
	        <h2 class="form-signin-heading">Acceder cuenta</h2>
	        <label for="inputEmail" class="sr-only">Email address</label>
	        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email" required autofocus>
	        <label for="inputPassword" class="sr-only">Password</label>
	        <input type="password" id="inputPassword" name="password" class="form-control" placeholder="Contraseña" required>
	        
	        <button class="btn btn-lg btn-primary btn-block" type="submit" name="acceder">Acceder</button>
	      </form>
	   </div>
  </body>
</html>