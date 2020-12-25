<?php
require 'conexion.php';

$sql = "SELECT l.isbn, l.nombre AS 'titulo', l.cantidad_bodega, a.nombre AS 'author', l.precio ";
$sql .= "FROM biblioteca.libro l ";
$sql .= "INNER JOIN biblioteca.autor a ON l.idautor = a.idautor ";
$sql .= "ORDER BY l.idlibro ASC ";

$query = mysqli_query($conex, $sql);
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
		<div class="container-fluid pt-4" style="width: 98%;">
			<div class="row">
				<div class="col-md-4">
					<span id="msg"></span>
					<h5>Nuevo Libro</h5>
					<div class="card card-body">
						<div>
							<div class="form-group">
								<input type="text" name="txtIndentificador" id="txtIndentificador" placeholder="Indentificador (ISBN)" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="inpTitulo" id="txtTitulo" placeholder="Titulo" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<input type="text" name="inpStock" id="txtStock" placeholder="Cantidad en Bodega" class="form-control form-control-sm">
							</div>
							<div class="form-group">
								<select class="form-control form-control-sm" id="txtAuthor" name="inpAuthor">
									<option value="1">Seleccione...</option>
									<option value="2">JULIAN MELGOSA Y MICHELSON BORGES</option>
									<option value="3">ALBA ROSA PASTORA OLIVARES</option>
									<option value="4">ISHA</option>
									<option value="5">EDICIONES PAULINAS VERBO DIVINO</option>
								</select>
							</div>
							<div class="form-group">
								<input type="text" name="inpPrecio" id="txtPrecio" placeholder="Precio del Libro" class="form-control form-control-sm">
							</div>

							<div class="form-group">
								<button type="button" class="btn btn-primary btn-block btn-sm" id="btnSaved">Guardar</button>
							</div>
						</div>
					</div>
				</div>

				<div class="col-md-8 table-responsive">
					<table class="table table-striped table-bordered bg-white table-sm table-hover" style="font-size: 0.9rem; cursor: pointer;">
						<thead>
							<tr class="text-center" style="background: #1F2430; color: #FFF">
								<th>IDENTIFICADOR</th>
								<th>TITULO DEL LIBRO</th>
								<th>STOCK</th>
								<th>AUTHOR</th>
								<th>PRECIO</th>
								<th colspan="2">ACCIONES</th>
							</tr>
						</thead>
						<tbody>
							<?php while ($row = mysqli_fetch_array($query, MYSQLI_BOTH)) { ?>
								<tr>
									<td><?php echo $row['isbn']; ?></td>
									<td><?php echo strtoupper($row['titulo']); ?></td>
									<td class="text-center"><?php echo $row['cantidad_bodega']; ?></td>
									<td><?php echo strtoupper($row['author']); ?></td>
									<td><?php echo "$" . $row['precio'] . ".-"; ?></td>
									<td class="text-center">
										<a href="editar.php?isbn=<?php echo $row['isbn']; ?>" title="Editar">
											<i class=" fa fa-edit" aria-hidden="true"></i>
										</a>
									</td>
									<td>
										<a href="#" title="Eliminar">
											<i class="fa fa-trash" aria-hidden="true"></i>
										</a>
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
	<script src="resource/bootstrap/js/bootstrap.js"></script>
	<script>
		// Guardar Registro
		document.getElementById("btnSaved").addEventListener("click", () => {
			let objeto, variables;

			let isbn = document.getElementById("txtIndentificador").value.trim();
			let titulo = document.getElementById("txtTitulo").value.trim();
			let stock = document.getElementById("txtStock").value.trim();
			let author = document.getElementById("txtAuthor").value;
			let precio = document.getElementById("txtPrecio").value.trim();
			let msg = document.getElementById("msg");

			/* Aca puedes validar para que los valores vacios INICIO */
			if (isbn == "") {
				html = `<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo [Identificador (ISBN)] no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
				document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (titulo == "") {
				html = `<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo [Titulo] no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
				document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (stock == "") {
				html = `<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo [Cantidad en Bodega] no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
				document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (author == "" || author.length == 0) {
				html = `<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo [Author] no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
				document.getElementById("msg").innerHTML = html;
				return false;
			}

			if (precio == "") {
				html = `<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">El campo [Precio del Libro] no puede estar vacio</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>`
				document.getElementById("msg").innerHTML = html;
				return false;
			}
			/* FIN */

			objeto = (window.XMLHttpRequest) ? objeto = new XMLHttpRequest() : objeto = new ActiveXObject("Microsoft.XMLHTTP");
			objeto.onreadystatechange = function() {
				if (objeto.readyState == 4 && objeto.status == 200) {
					var messages = objeto.responseText;
					msg.innerHTML = messages;
				}
			}

			objeto.open("POST", "ajax_sistemadebiblioteca.php", true);
			objeto.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
			variables = "accion=saved";
			variables += '&i=' + isbn;
			variables += '&t=' + titulo;
			variables += '&s=' + stock;
			variables += '&au=' + author;
			variables += '&p=' + precio;

			objeto.send(variables);
		});
	</script>
</body>

</html>