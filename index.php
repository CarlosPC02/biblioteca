<?php
	require 'conexion.php';

	$sql ="SELECT u.nombre, u.telefono, l.titulo, l.isbn, l.editorial, l.numero_paginas ";
	$sql.="FROM biblioteca.libro l, biblioteca.usuario u ";
	$sql.="ORDER BY l.idLibro DESC";

	$query = mysqli_query($conex,$sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<title>Sistema de Biblioteca</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="resource/bootstrap/css/bootstrap.css">
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.css">
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
      					<li class="nav-item"><a class="nav-link disabled">Equipo: <?php echo $hostname = gethostname(); ?></a></li>
						<li class="nav-item"><a class="nav-link disabled">
							IP: <?php $ip = $_SERVER["REMOTE_ADDR"];
							if ($ip == "::1" || $ip == "127.0.0.1") {
								echo $ip = "127.0.0.1";
							} else {
								echo $ip = "localhost";
							} ?></a>
						</li>
						<li class="nav-item">
							<!-- <a class="nav-link disabled">Conexi&oacute;n:</a> -->
						</li>
    				</ul>
  				</div>
  			</div>
		</nav>
	</header>

	<main>
		<div class="container pt-4">
			<div class="row">
				<div class="col-md-4">
					<h5>Libro</h5>
					<div class="card card-body" style="width: 20rem;">
						<div>
							<div class="form-group">
								<input type="text" name="txtTitulo" placeholder="Titulo" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="txtIndentificador" placeholder="Indentificador (ISBN)" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="txtEditorial" placeholder="Editorial" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="txtNumPaginas" placeholder="Numero de Paginas" class="form-control form-control-sm">
							</div>
				
							<div class="form-group">
								<button type="submit" class="btn btn-primary btn-block btn-sm" id="btnSaved">Guardar Libro</button>
							</div>
						</div>
					</div>	
				</div>

				<div class="col-md-8">
					<table class="table table-striped table-bordered bg-white table-sm" style="font-size: 0.9rem;">
						<thead>
							<tr class="text-center" style="background: #1F2430; color: #FFF">
								<th>Nombre</th>
								<th>Contacto</th>
								<th>Titulo</th>
								<th>Identificador</th>
								<th>Editorial</th>
								<th>Paginas</th>
								<th colspan="2"></th>
							</tr>
						</thead>
						<tbody>
						<?php while($row = mysqli_fetch_array($query, MYSQLI_BOTH)){ ?>
							<tr>
								<td><?php echo $row["nombre"]; ?></td>
								<td><?php echo $row["telefono"]; ?></td>
								<td><?php echo $row["titulo"]; ?></td>
								<td><?php echo $row["isbn"]; ?></td>
								<td><?php echo $row["editorial"]; ?></td>
								<td><?php echo $row["numero_paginas"]; ?></td>
								<td class="text-center">
									<a href="#"><i class="fa fa-edit" aria-hidden="true"></i></a>
								</td>
								<td>
									<a href="#" ><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</main>

	<script src="resource/bootstrap/jquery-3.5.1.slim.js"></script>
	<script src="resource/bootstrap/popper.js"></script>
	<script src="resource/bootstrap/js/bootstrap.js"></script>
	<script>
		
	</script>
</body>
</html>