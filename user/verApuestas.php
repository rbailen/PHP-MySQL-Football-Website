<?php
	session_start();

	/* Comprobamos que esta página solo pueda ser accesible por un usuario con perfil usuario */
	if ($_SESSION['keyid'] != md5(session_id()) && $_SESSION['idusuario'] != md5(0) || $_SESSION['esadmin'] != md5('no')){  
		session_destroy();
		
		header('Location: ../login.php');
	}
	
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Apuesta.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/ApuestaController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Partido.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/PartidoController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Equipo.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/EquipoController.php');

	$apuestas = array();
	
	$apuestaController = new ApuestaController();
	
	/* Obtenemos el usuario de la sesión */
	$usuario = $_SESSION['idusuario'];
	$apuestas = $apuestaController->buscarApuestasUsuario($usuario);
	
	$partido = new Partido();
	$partidoController = new PartidoController();
	
	$equipo = new Equipo();
	$equipoController = new EquipoController();
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
		    			<h3>Apuestas realizadas</h3>
		    		</div>
		    		 <?php			
						if($apuestas == null) {
							echo("No ha realizado ninguna apuesta.");
						}else{
					 ?>
			          <table class="table table-bordered">
			          	<thead>
			          		<tr class="darkgreenbox">
					            <th>Partido</th>
					            <th>Resultado</th>
					        </tr>
					    </thead>
					         
					    <?php			
							foreach($apuestas as $apuesta) {
						 ?>
						 	<tbody>
						        <tr>
									<td>
										<?php
											$partido = $partidoController->buscarPartidoPorId($apuesta->getPartido());
											$equipoLocal = $equipoController->buscarEquipoPorId($partido->getLocal());
											$equipoVisitante = $equipoController->buscarEquipoPorId($partido->getVisitante());
											
											echo $equipoLocal->getNombre() .' vs '. $equipoVisitante->getNombre();
										?>
									</td>
									<td><?php echo $apuesta->getResultado()?></td>
								</tr>
							</tbody>
						<?php				
							}
							}
						?>
				      </table>
				</div>
				<div class="form-actions">
					<a class="btn" href="apuestas.php">Volver</a>
				</div>	
		</div>
  </body>
</html>