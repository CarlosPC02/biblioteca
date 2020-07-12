<?php
	// Configuracion MySQL
	$host = "localhost";
	$user = "root";
	$password = "";
	$bd = "biblioteca";

	if (!($conex = mysqli_connect($host, $user, $password))) { 
		die("No conectado ".mysqli_connect_error());
		exit();
	}

	if (!mysqli_select_db($conex, $bd)) {
        echo ", !!Error Base de datos [".$bd."] no econtrada.";
        exit();
    }
?>