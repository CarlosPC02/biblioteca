<?php

function crearLibro($conex, $datos)
{
	$answer = -1;

	$sql = "INSERT INTO biblioteca.libro(isbn, nombre, cantidad_bodega, idautor, precio) ";
	$sql .= "VALUES('" . $datos['isbn'] . "','" . strtoupper($datos['titulo']) . "','" . $datos['stock'] . "', ";
	$sql .= "'" . strtoupper($datos['author']) . "','" . $datos['precio'] . "') ";

	$result = mysqli_query($conex, $sql);
	$answer = $result;

	return $answer;
	mysqli_close($conex);
}
