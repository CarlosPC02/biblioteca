<?php

function crearLibro($conex, $datos) {
	$answer = -1;

	$sql = "INSERT INTO biblioteca.libro(isbn, nombre, cantidad_bodega, idautor, precio) ";
	$sql.= "VALUES('" . $datos['isbn'] . "','" . strtoupper($datos['titulo']) . "','" . $datos['stock'] . "', ";
	$sql.= "'" . strtoupper($datos['author']) . "','" . $datos['precio'] . "') ";

	$result = mysqli_query($conex, $sql);
	$answer = $result;

	return $answer;
	mysqli_close($conex);
}


function UpdateLibro($conex, $datos) {
	$answer = false;

	$query = "UPDATE biblioteca.libro SET ";
	$query.= "nombre='".strtoupper($datos['titulo'])."', cantidad_bodega=".$datos['stock'].", ";
	$query.= "idautor=".$datos['author'].", precio=".$datos['precio']." ";
	$query.= "WHERE isbn=".$datos['isbn']." ";
	error_log($query);

	$row = mysqli_query($conex, $query);
	if (!$row) {
	} else {
		if (mysqli_affected_rows($conex)) {
			$answer = true;
		} 
	} 

	return $answer;
	mysqli_close($conex);
}