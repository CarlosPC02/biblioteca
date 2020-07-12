<?php
	// Datos del equipo utilizado
	$hostname = gethostname();
	$ip = $_SERVER["REMOTE_ADDR"];
	if ($ip == "::1" || $ip == "127.0.0.1") {
		$ip = "127.0.0.1";
	} else {
		$ip = "localhost";
	}

	// Configuracion MySQL
	function conexion() {
		$host = "localhost";
		$user = "root";
		$password = "";
		$bd = "biblioteca";

		$conex = new mysqli($host, $user, $password);
		if ($conex) {
			echo "Conectado";
		} else {
			die("No conectado ".$conex->connect_error);
			exit();
		}

		if (!($conex->select_db($bd))) {
			echo ", !!Error Base de datos [".$bd."] no econtrada.";
            exit();
		} 
	}
?>