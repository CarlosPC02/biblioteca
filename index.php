<?php
	require 'conexion.php';
	require 'cdb_sistemadebiblioteca.php';

	$sql ="SELECT * FROM biblioteca.libro ";
	$sql.="ORDER BY idLibro DESC";

	$query = mysqli_query($conex,$sql);

	$data = getLibro($conex, $libro_id);
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
	<?php require 'template/header.php'; ?>

	<main>
		<div class="container pt-4">
			<!-- <span id="msg"></span> -->
			<div class="row">
				<div class="col-md-4">
					<span id="msg"></span>
					<h5>Registrar Libro</h5>
					<div class="card card-body">
						<div>
							<div class="form-group">
								<input type="text" name="txtTitulo" id="txtTitulo" placeholder="Titulo" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="txtIndentificador" id="txtIndentificador" placeholder="Indentificador (ISBN)" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="txtEditorial" id="txtEditorial" placeholder="Editorial" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="txtNumPaginas" id="txtNumPaginas" placeholder="Numero de Paginas" class="form-control form-control-sm">
							</div>
				
							<div class="form-group">
								<button type="button" class="btn btn-primary btn-block btn-sm" id="btnSaved">Guardar</button>
							</div>
						</div>
					</div>	
				</div>

				<div class="col-md-8">
					<table class="table table-striped table-bordered bg-white table-sm" style="font-size: 0.9rem;">
						<thead>
							<tr class="text-center" style="background: #1F2430; color: #FFF">
								<th>ID Libro</th>
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
								<td><?php echo $row[0]; ?></td>
								<td><?php echo $row["titulo"]; ?></td>
								<td><?php echo $row["isbn"]; ?></td>
								<td><?php echo $row["editorial"]; ?></td>
								<td><?php echo $row["numero_paginas"]; ?></td>
								<td class="text-center">
									<a href="#" data-toggle="modal" data-target="#mdlEditar" title="Editar Registro">
										<i class="fa fa-edit" aria-hidden="true"></i>
									</a>
								</td>
								<td>
									<a href="#" title="Eliminar Registro"><i class="fa fa-trash" aria-hidden="true"></i></a>
								</td>
							</tr>
						<?php } ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>


		<!-- Formulario para editar registro (Modal) -->
		<div class="modal fade" id="mdlEditar" tabindex="-1" role="dialog" aria-labelledby="mdlLabelEditar" aria-hidden="true">
  			<div class="modal-dialog">
      			<div class="modal-content">
          			<div class="modal-header">
            			<h5 class="modal-title" id="mdlLabelEditar">Editar Registro ID: [<?php echo $data['idLibro']; ?>]</h5>
            			<button type="button" class="close" data-dismiss="modal" aria-label="Close">
                			<span aria-hidden="true">&times;</span>
            			</button>
          			</div>

          			<div class="modal-body">
            			<div class="form-group">
                  			<input type="text" name="txtTitulo" id="txtTitulo" placeholder="Titulo" class="form-control form-control-sm" value="<?php echo $data['titulo']; ?>">
                		</div>
                		<div class="form-group">
                  			<input type="text" name="txtIndentificador" id="txtIndentificador" placeholder="Indentificador (ISBN)" class="form-control form-control-sm" value="<?php echo $data['isbn']; ?>">
                		</div>
                		<div class="form-group">
                  			<input type="text" name="txtEditorial" id="txtEditorial" placeholder="Editorial" class="form-control form-control-sm" value="<?php echo $data['editorial']; ?>">
                		</div>
                		<div class="form-group">
                  			<input type="text" name="txtNumPaginas" id="txtNumPaginas" placeholder="Numero de Paginas" class="form-control form-control-sm" value="<?php echo $data['numero_paginas']; ?>">
                		</div>
          			</div>

          			<div class="modal-footer">
            			<button type="button" class="btn btn-danger btn-sm" data-dismiss="modal">
              				<i class="fa fa-sign-out" aria-hidden="true">&nbsp;Salir</i>
            			</button>
            			<button type="button" class="btn btn-success btn-sm">
              				<i class="fa fa-refresh" aria-hidden="true">&nbsp;Actualizar</i>
            			</button>
          			</div>
      			</div>
    		</div>
		</div>
	</main>

	<script src="resource/bootstrap/jquery-3.5.1.slim.js"></script>
	<script src="resource/bootstrap/popper.js"></script>
	<script src="resource/bootstrap/js/bootstrap.js"></script>
	<script>
		// Guardar Registro
		document.getElementById("btnSaved").addEventListener("click", () => {
			// console.log("Recevied");
			let titulo = document.getElementById("txtTitulo").value;
			let isbn = document.getElementById("txtIndentificador").value;
			let editorial = document.getElementById("txtEditorial").value;
			let numPaginas = document.getElementById("txtNumPaginas").value;
			let msg = document.getElementById("msg");
			// console.log(titulo);
			
			/* Aca puedes validar para que los valores vacios INICIO */
			if (titulo == "") {
				html=`<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo Titulo no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
					document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (isbn == "") {
				html=`<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo Identificador no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
					document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (editorial == "") {
				html=`<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo Editorial no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
					document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (numPaginas == "") {
				html=`<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo Nº Paginas no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
					document.getElementById("msg").innerHTML = html;
				return false;
			}
			/* FIN */

			var objeto = (window.XMLHttpRequest) ? objeto = new XMLHttpRequest() : objeto = new ActiveXObject("Microsoft.XMLHTTP");
			objeto.onreadystatechange= function() {
				if (objeto.readyState == 4 && objeto.status == 200) {
					var messages = objeto.responseText;
            		msg.innerHTML = messages;
				}
			}

			objeto.open("POST", "ajax_sistemadebiblioteca.php", true);
			objeto.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			var variables = "accion=saved";
			variables += '&t=' + titulo;
			variables += '&i=' + isbn;
			variables += '&e=' + editorial;
			variables += '&np=' + numPaginas;

			objeto.send(variables);
		});


		// Editar Registro
		
	</script>
</body>
</html>