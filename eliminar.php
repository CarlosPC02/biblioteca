<?php
require 'conexion.php';
$id = $_GET['isbn'];
// error_log("ID ISBN: " . $id);

?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title>Sistema de Biblioteca</title>
	<link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico">
	<link rel="stylesheet" href="resource/bootstrap/css/bootstrap.css">
    <link rel="stylesheet" href="css/estilos.css">
    <link rel="stylesheet" href="css/font-awesome.css">
</head>
<body>
	<?php require 'template/header.php'; ?>

	<form class="form-inline d-flex justify-content-center mt-5">
		<div class="form-group mb-2">
			<label for="inpISBN">¿Seguro que deseas eliminar este registro?</label>
		</div>
		<div class="form-group mx-sm-3 mb-2">
    		<input type="text" class="form-control form-control-sm" id="inpISBN" value="<?php echo $id; ?>" readonly>
  		</div>
  		<button type="button" class="btn btn-dark mb-2 btn-sm" id="btnDelete">Eliminar</button>
	</form>
	<div class="d-flex justify-content-center">
		<span id="msg"></span>
	</div>

	<div class="d-flex justify-content-center mt-3">
		<a href="./index.php" class="btn btn-danger mb-2 btn-sm">Volver Atras</a>
	</div>


    <script src="resource/bootstrap/jquery-3.5.1.slim.js"></script>
    <script src="resource/bootstrap/js/bootstrap.js"></script>
    <script type="text/javascript">
    	
    	document.getElementById("btnDelete").addEventListener("click", function() {
    		if (confirm("¿Respuesta definitiva?")) {
    			// console.info(`Traspaso de ISBN: ${document.getElementById('inpISBN').value.trim()}`);
    			let objeto, dato;
    			let txtIsbn = document.getElementById('inpISBN').value.trim();
    			let sms = document.getElementById("msg");


            	if(window.XMLHttpRequest) {
                	objeto = new XMLHttpRequest();
            	} else {
	                objeto = new ActiveXObject("Microsoft.XMLHTTP");
    	        }
        	    
	            objeto.onreadystatechange = () => {
    	            if (objeto.readyState == 4 && objeto.status == 200) {
        	            var messages = objeto.responseText;
            	        sms.innerHTML = messages;
	                }
    	        }
        	    objeto.open("POST", "ajax_sistemadebiblioteca.php", true);
	            objeto.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
    	        dato = "accion=delete";
        	    dato += '&i=' + txtIsbn;

            	objeto.send(dato);
            }
    	});

    </script>
</body>
</html>