<?php 
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/models/Noticia.php');
	require_once ($_SERVER['DOCUMENT_ROOT']. '/EjercicioFinal/controllers/NoticiaController.php');
	
	$noticias = array();
	
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
	<meta name="author" content="">
	
	<title>Blog Post - Start Bootstrap Template</title>
	
	<!-- CSS -->
	<link href="resources/css/bootstrap.min.css" rel="stylesheet">
	<link href="resources/css/blog.css" rel="stylesheet">
	
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

    <!-- Page Content -->
    <div class="container">

        <div class="row">

            <!-- Blog Post Content Column -->
            <div class="col-lg-8">

                <!-- Blog Post -->
                
                <!-- Title -->
                <h1>Noticias</h1>

                <!-- Author -->
                <p class="lead">
                    de <a>La Liga</a>
                </p>

                <hr>
                
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
                <p><?php echo $noticia->getCuerpo()?></p>
                
                 <hr>
                
                <?php				
					}
				?>
            </div>
        </div>
         <div class="form-actions">
        	 <a class="btn" href="inicio.php">Volver</a>
		 </div>
      </div>
</body>
</html>