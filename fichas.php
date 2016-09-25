<?php
	
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Equipo.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/EquipoController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Jugador.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/JugadorController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Entrenador.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/EntrenadorController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Estadio.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/EstadioController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Clasificacion.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/ClasificacionController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Partido.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/PartidoController.php');
	
	$id = null;
	
	/* Recogemos el ID del equipo a visualizar */
	if (!empty($_GET['id'])) {
		$id = $_REQUEST['id'];
	}
	
	/* Si es distinto de nulo buscamos el equipo que contiene ese ID */
	if ($id == null) {
		header("Location: inicio.php");
	} else {
		$equipoController  = new EquipoController();
		$equipo = $equipoController->buscarEquipoPorId($id);
	}
	
	/* Buscamos los jugadores del equipo */
	$jugadores = array();
	
	$jugadorController = new JugadorController();
	$jugadores = $jugadorController->listarJugadoresEquipo($equipo->getId());
	
	/* Buscamos el entrenador del equipo */
	$entrenador = new Entrenador();
	
	$entrenadorController = new EntrenadorController();
	$entrenador = $entrenadorController->entrenadorEquipo($equipo->getId());
	
	/* Buscamos el estadio del equipo */
	$estadio = new Estadio();
	$estadioController = new EstadioController();
	
	$estadio = $estadioController->buscarEstadioPorId($equipo->getIdEstadio());
	
	/* Obtenemos la clasificación del equipo */
	$clasificacion = new Clasificacion();
	$clasificacionController = new ClasificacionController();
	
	$clasificacion = $clasificacionController->verClasificacionEquipo($equipo->getId());
	
	/* Partidos jugados por el equipo */
	$partidos = array();
	
	$partidoController = new PartidoController();
	$partidos = $partidoController->buscarPartidosEquipo($id);
	
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
      
      <!-- Container -->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-6">
          <h2>Jugadores</h2>
          <?php			
				if($jugadores == null) {
					echo("No se han insertado en BBDD jugadores para este equipo");
				}else{
			 ?>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>Nombre</th>
		            <th>Nacionalidad</th>
		        </tr>
		    </thead>
		         
		    <?php			
				foreach($jugadores as $jugador) {
			 ?>
			 	<tbody class="fondoBlanco">
			        <tr>
						<td><?php echo $jugador->getNombre()?></td>
						<td><?php echo $jugador->getNacionalidad()?></td>
					</tr>
				</tbody>
			<?php				
				}
				}
			?>
	      </table>
        </div>
        <div class="col-lg-6">
          <h2>Entrenador</h2>
          <?php			
				if($entrenador == null) {
					echo("No se ha insertado en BBDD un entrenador para este equipo");
				}else{
			 ?>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>Nombre</th>
		            <th>Nacionalidad</th>
		        </tr>
		    </thead>
		    
			 <tbody class="fondoBlanco">
			 	<tr>
					<td><?php echo $entrenador->getNombre()?></td>
					<td><?php echo $entrenador->getNacionalidad()?></td>
				</tr>
			</tbody>
			<?php			
				}
			 ?>
	      </table>
       </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
          <h2>Partidos Jugados</h2>
           <?php			
				if($partidos == null) {
					echo("No se han insertado en BBDD partidos para este equipo");
				}else{
			 ?>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>Local</th>
		            <th>Visitante</th>
		            <th>Resultado</th>
		            <th>Fecha</th>
		        </tr>
		    </thead>
		         
		    <?php			
				foreach($partidos as $partido) {
			 ?>
			 	<tbody class="fondoBlanco">
			        <tr>
						<td>
						<?php 
							$equipo = $equipoController->buscarEquipoPorId($partido->getLocal());
						?>
						<img alt="Escudo del <?php echo $equipo->getNombre()?>" title="Escudo del <?php echo $equipo->getNombre()?>" src="resources/img/escudos/<?php echo $equipo->getId()?>.png" width="40" height="30">
							<?php 
								echo $equipo->getNombre();
							?>
						</td>
						<td>
						<?php 
							$equipo = $equipoController->buscarEquipoPorId($partido->getVisitante());
						?>
						<img alt="Escudo del <?php echo $equipo->getNombre()?>" title="Escudo del <?php echo $equipo->getNombre()?>" src="resources/img/escudos/<?php echo $equipo->getId()?>.png" width="40" height="30">
							<?php 
								echo $equipo->getNombre();
							?>
						</td>
						<td><?php echo $partido->getResultado()?></td>
						<td>
							<?php 
								$date = date_create($partido->getFecha());
								echo date_format($date, 'd-m-Y');
							?>
						</td>
					</tr>
				</tbody>
			<?php				
				}
				}
			?>
			</table>
        </div>
        <div class="col-lg-6">
          <h2>Clasificación</h2>
          	 <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>POS</th>
		            <th>PTOS</th>
		            <th>JU</th>
		            <th>GA</th>
		            <th>EM</th>
		            <th>PE</th>
		            <th>GF</th>
		            <th>GC</th>
		            <th>DIF</th>
		        </tr>
		    </thead>
		    
			 <tbody class="fondoBlanco">
			 	<tr>
					<td><?php echo $clasificacion->getPosicion()?></td>
						<td><?php echo $clasificacion->getPuntos()?></td>
						<td><?php echo $clasificacion->getPjugados()?></td>
						<td><?php echo $clasificacion->getPganados()?></td>
						<td><?php echo $clasificacion->getPempatados()?></td>
						<td><?php echo $clasificacion->getPperdidos()?></td>
						<td><?php echo $clasificacion->getGfavor()?></td>
						<td><?php echo $clasificacion->getGcontra()?></td>
						<td><?php echo $clasificacion->getDiferencia()?></td>
				</tr>
			</tbody>
		  </table>
       </div>
      </div>
      
      <div class="row">
        <div class="col-lg-6">
          <h2>Estadio</h2>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>Nombre</th>
		            <th>Ciudad</th>
		        </tr>
		    </thead>
		    
			 <tbody class="fondoBlanco">
			 	<tr>
					<td><?php echo $estadio->getNombre()?></td>
					<td><?php echo $estadio->getCiudad()?></td>
				</tr>
			</tbody>
		  </table>
        </div>
      </div>
      <div class="form-actions">
      	 <a class="btn" href="equipos.php">Volver</a>
	  </div>
    </div>
      
       
  </body>
</html>