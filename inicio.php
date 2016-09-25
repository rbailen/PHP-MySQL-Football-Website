<?php 
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Equipo.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Noticia.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/EquipoController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/ClasificacionController.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/NoticiaController.php');
	
	/* En la página de inicio mostramos los equipos ($equipos), los datos de la clasificación
   	   de cada uno de ellos ($clasificaciones) y las últimas 3 noticias ($noticias)*/
	$equipos = array();
	$clasificaciones = array();
	$noticias = array();
	
	$equipoController = new EquipoController();
	$clasificacionController  = new ClasificacionController();
	
	$equipos = $equipoController->listarEquipos();
	$clasificaciones = $clasificacionController->verClasificacionEquipos();
	
	$noticiasController = new NoticiaController();
	$noticias = $noticiasController->listarNoticias();
	
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

  <body class="inicio">
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

     <!-- Jumbotron -->
      <div class="jumbotron">
      	<div class="container">
	      	<div class="text-center">
		        <h1>Liga de Fútbol</h1>
		        <p class="lead">Bienvenido a la página oficial de la mejor liga de fútbol del mundo, la liga BBVA.</p>
		        <img alt="Logo de la Liga de Fútbol" src="resources/img/logo.png">
	      	</div>
      	</div>
      </div>

	<!-- Container -->
	<div class="container">
      <!-- Example row of columns -->
      <div class="row">
        <div class="col-lg-4">
          <h2>Equipos</h2>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
          			<th>Escudo</th>
		            <th>Nombre</th>
		        </tr>
		    </thead>
		            
		    <?php			
				foreach($equipos as $equipo) {
			 ?>
			 	<tbody>
			        <tr>
						<td><img alt="Escudo del <?php echo $equipo->getNombre()?>" title="Escudo del <?php echo $equipo->getNombre()?>" src="resources/img/escudos/<?php echo $equipo->getId()?>.png" width="40" height="30"></td>
						<td><?php echo $equipo->getNombre()?></td>
					</tr>
				</tbody>
			<?php				
				}
			?>
	      </table>
          <p><a class="btn btn-primary" href="equipos.php" role="button">Ver información &raquo;</a></p>
        </div>
        <div class="col-lg-4">
          <h2>Clasificación</h2>
          <table class="table table-bordered">
          	<thead>
          		<tr class="darkgreenbox">
		            <th>Posición</th>
		            <th>Equipo</th>
		        </tr>
		    </thead>
		            
		    <?php			
				foreach($clasificaciones as $clasificacion) {
					$equipo = $equipoController->buscarEquipoPorId($clasificacion->getEquipo());
			 ?>
			 	<tbody>
			        <tr>
						<td><?php echo $clasificacion->getPosicion()?></td>
						<td><img alt="Escudo del <?php echo $equipo->getNombre()?>" title="Escudo del <?php echo $equipo->getNombre()?>" src="resources/img/escudos/<?php echo $equipo->getId()?>.png" width="40" height="30">&nbsp;<?php echo $equipo->getNombre()?></td>
					</tr>
				</tbody>
			<?php				
				}
			?>
	      </table>
          <p><a class="btn btn-primary" href="clasificacion.php" role="button">Ver información &raquo;</a></p>
       </div>
        <div class="col-lg-4">
          <h2>Noticias</h2>
          <?php			
					foreach($noticias as $noticia) {
				 ?>

                <!-- Date/Time -->
                <p><span class="glyphicon glyphicon-time"></span> Publicado el 
	                <?php 
	                	$date = date_create($noticia->getFecha());
	                	echo date_format($date, 'd-m-Y');
	                ?>
                </p>

                <hr>

                <!-- Preview Image -->
                <img class="img-responsive" src="resources/img/noticias/<?php echo $noticia->getImagen()?>.jpg" alt="Noticia <?php echo $noticia->getId()?>" title="Noticia <?php echo $noticia->getId()?>">

                <hr>

                <!-- Post Content -->
                <p class="lead"><?php echo $noticia->getTitular()?></p>
                
                 <hr>
                
                <?php				
					}
				?>
          <p><a class="btn btn-primary" href="noticias.php" role="button">Ver información &raquo;</a></p>
        </div>
      </div>

      <!-- Site footer -->
      <footer class="footer">
        <p>&copy; 2016 Ramón Bailén Sánchez</p>
      </footer>
      
    </div>
  </body>
</html>