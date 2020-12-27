<?php
require 'conexion.php';
require 'cdb_sistemadebiblioteca.php';

if (isset($_POST['accion'])) {
	$accion = $_POST['accion'];
	if (isset($accion)) {

		// Guardar un regitro
		if ($accion === "saved") {
			$answer = false;

			$datos['isbn'] = mysqli_real_escape_string($conex, trim($_POST['i']));
			$datos['titulo'] = mysqli_real_escape_string($conex, trim($_POST['t']));
			$datos['stock'] = mysqli_real_escape_string($conex, trim($_POST['s']));
			$datos['author'] = mysqli_real_escape_string($conex, trim($_POST['au']));
			$datos['precio'] = mysqli_real_escape_string($conex, trim($_POST['p']));

			if ($datos['isbn'] == "") {
				echo $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO [INDENTIFICADOR (ISBN)]<br>NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
				return false;
			}

			if ($datos['titulo'] == "") {
				echo $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO [TITULO]<br>NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
				return false;
			}

			if ($datos['stock'] == "") {
				echo $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO [CANTIDAD EN BODEGA]<br>NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
				return false;
			}

			if ($datos['author'] == "") {
				echo $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO [AUTHOR]<br>NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
				return false;
			}

			if ($datos['precio'] == "") {
				echo $msg = '<div class="alert alert-warning alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO [Precio del Libro]<br>NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
				return false;
			}

			$answer = crearLibro($conex, $datos);
			if ($answer) {
				echo $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">Registro guardado exitosamente! </strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
			} else {
				echo $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">Error no se puedo guardar los datos! </strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
			}
		}


		// Editar un registro
		if ($accion === "update") {
			$answer = false;

			$datos['isbn'] = mysqli_real_escape_string($conex, trim($_POST['i']));
			$datos['titulo'] = mysqli_real_escape_string($conex, trim($_POST['t']));
			$datos['stock'] = mysqli_real_escape_string($conex, trim($_POST['s']));
			$datos['author'] = mysqli_real_escape_string($conex, trim($_POST['au']));
			$datos['precio'] = mysqli_real_escape_string($conex, trim($_POST['p']));

			$answer = UpdateLibro($conex, $datos);
			if ($answer) {
				echo $msg = '<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">Actualizacion exitosa! </strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
			} else {
				echo $msg = '<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">!!Error no se puedo actualizar los datos! </strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
			}
		}

	}
}
