<?php
	require 'resource/conexion.php';
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema de Biblioteca</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="resource/bootstrap/css/bootstrap.css">
	<style type="text/css">
		.navbar { 
			padding-top: 0.3rem;
			padding-right: 1rem;
			padding-bottom: 0.5rem;
			padding-left: 1rem;
		}

		.info-datos li a {
			padding: 0;
			font-size: 0.7rem;
			letter-spacing: 0.1rem
		}

		.navbar .info-datos .nav-item .nav-link { color: #C4C6C8; }

		.menu-sb { font-size: 0.9rem; }
	</style>
</head>
<body>
	<header>
		<nav class="navbar navbar-expand-lg navbar-dark bg-dark">
			<div class="container">
  				<a class="navbar-brand" href="./">My Biblioteca</a>
  				<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navegation-sb" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
    				<span class="navbar-toggler-icon"></span>
  				</button>
  				<div class="collapse navbar-collapse" id="navegation-sb">
  					<ul class="navbar-nav menu-sb">
      					<li class="nav-item active"><a class="nav-link" href="#">Nuevo Usuario</a></li>
      					<li class="nav-item active"><a class="nav-link" href="#">Nuevo Autor</a></li>
						<li class="nav-item active"><a class="nav-link" href="#">Nuevo Ejemplar</a></li>
  					</ul>
    				<ul class="navbar-nav ml-md-auto flex-column info-datos">
      					<li class="nav-item"><a class="nav-link disabled">Equipo: <?php echo $hostname; ?></a></li>
						<li class="nav-item"><a class="nav-link disabled">IP: <?php echo $ip; ?></a></li>
						<li class="nav-item">
							<a class="nav-link disabled">Conexi&oacute;n: <?php echo $mysqli = conexion(); ?></a>
						</li>
    				</ul>
  				</div>
  			</div>
		</nav>
	</header>



	
	<script src="resource/bootstrap/jquery-3.5.1.slim.js"></script>
	<script src="resource/bootstrap/popper.js"></script>
	<script src="resource/bootstrap/js/bootstrap.js"></script>
</body>
</html>