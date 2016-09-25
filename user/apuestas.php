<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil usuario */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(0) || $_SESSION['esadmin'] != md5('no')){  
		session_destroy();
		
		header('Location: ../login.php');
	}
	
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Partido.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/PartidoController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Equipo.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/EquipoController.php');
	
	$partidos = array();
	
	$partidoController = new PartidoController();
	$partidos = $partidoController->listarPartidos();
	
	$equipoController = new EquipoController();
	$equipo = new Equipo();
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
      
        <div class="container">
    			<div class="span10 offset1">
    				<div class="row">
		    			<h3>Apuestas</h3>
		    		</div>
					
					<form class="form-horizontal" method="post" action="../controllers/ApuestaController.php">
						
						<!-- Input hidden del usuario que realiza la apuesta -->
	    				<input type="hidden" name="id" value="<?php echo $_SESSION['idusuario']?>"/>
					
						<div class="form-group">
		    				<div class="col-xs-5">
							    <select class="form-control" name="partido" required autofocus>
							        <option value="">Partidos:</option>
									<?php 
										foreach ($partidos as $partido){
									?>
								    <option value="<?php echo $partido->getId()?>">
								    	<?php 
								    		$equipo = $equipoController->buscarEquipoPorId($partido->getLocal());
								    		echo $equipo->getNombre();
								    	?>
								    	 - 
								    	<?php 
								    		$equipo = $equipoController->buscarEquipoPorId($partido->getVisitante());
								    		echo $equipo->getNombre();
								    	?>
										 
								    	<?php 
								    		$date = date_create($partido->getFecha());
											echo '('.date_format($date, 'd-m-Y').')';
								    	?>
										
								    </option>
									<?php
										}
									?>
							    </select>
						    </div>
					     </div>
		    			
		    			<div class="form-group">
			    			<div class="col-xs-5">
			    				<label class="sr-only">Resultado</label>
			    				<input type="text" class="form-control" name="resultado" placeholder="Resultado" required>
			    			</div>
		    			</div>
		    			
		    			<div class="form-group">
			        		<button class="btn btn-success" type="submit" name="crear">Apostar</button>
			        		<a class="btn btn-primary" href="verApuestas.php">Apuestas realizadas</a>
			        		<a class="btn" href="index.php">Volver</a>
			        	</div>
			      	</form>
				</div>	
		</div>
  </body>
</html>