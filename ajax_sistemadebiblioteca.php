<?php
	require 'conexion.php';
	require 'cdb_sistemadebiblioteca.php';

	if (isset($_POST['accion'])) {
		$accion = $_POST['accion'];
		if (isset($accion)) {

			// Guardar un regitro
			if ($accion = "saved") {
				$answer = false;

				$datos['titulo'] = mysqli_real_escape_string($conex, trim($_POST['t']));
				$datos['isbn'] = mysqli_real_escape_string($conex, trim($_POST['i']));
				$datos['editorial'] = mysqli_real_escape_string($conex, trim($_POST['e']));
				$datos['numPaginas'] = mysqli_real_escape_string($conex, trim($_POST['np']));

				if ($datos['titulo'] == "") {
					echo $msg ='<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO TITULO NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
					return false;
				}

				if ($datos['isbn'] == "") {
					echo $msg ='<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO INDICADOR NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
					return false;
				}

				if ($datos['editorial'] == "") {
					echo $msg ='<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO EDITORIAL NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
					return false;
				}

				if ($datos['numPaginas'] == "") {
					echo $msg ='<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">EL CAMPO Nº PAGINAS NO PUEDE ESTAR VACIO</strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
						</div>';
					return false;
				}

				$answer = crearLibro($conex, $datos);
				if($answer){
  					echo $msg ='<div class="alert alert-success alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">Registro guardado exitosamente! </strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
  				}else{
  					echo $msg ='<div class="alert alert-danger alert-dismissible fade show text-center" role="alert">
						<strong class="texto-sb">Registro guardado exitosamente! </strong>
						<button type="button" class="close btn-cerrar" data-dismiss="alert" aria-label="Close">
							<span aria-hidden="true">&times;</span>
						</button>
					</div>';
  				}
			}


			// Editar un registro
			// if ($accion = "")
		}
	}	
?>
 	
  	