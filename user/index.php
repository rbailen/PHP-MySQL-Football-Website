<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil usuario */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(0) || $_SESSION['esadmin'] != md5('no')){  
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
              <li><a href="apuestas.php">Apuestas</a></li>
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
	  
	  <!-- Error al apostar en el mismo partido -->
	  <?php 
		if (isset($_SESSION['apuesta'])) {
	  ?>
	  <div class="alert alert-danger alert-dismissable">
		<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
		<strong>Error:</strong> <?=$_SESSION['apuesta']?>
	  </div>
	  <?php 
		unset($_SESSION['apuesta']);
	  }
	  ?>
      
      <!-- Jumbotron -->
      <div class="jumbotron">
      	<div class="container">
	      	<div class="text-center">
		        <h1>Liga de Fútbol</h1>
		        <p class="lead">Acaba de acceder a su cuenta.</p>
		        <img alt="Logo de la Liga de Fútbol" src="../resources/img/logo.png">
	      	</div>
      	</div>
      </div>
  </body>
</html>