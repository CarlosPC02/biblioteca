<?php

function crearLibro($conex, $datos)
{
	$answer = -1;

	$sql ="INSERT INTO biblioteca.libro(titulo,isbn,editorial,numero_paginas) ";
	$sql.="VALUES('".$datos['titulo']."','".$datos['isbn']."','".$datos['editorial']."','".$datos['numPaginas']."') ";

	$result = mysqli_query($conex, $sql);
	$answer = $result;

	return $answer;
	mysqli_close($conex);
}


function getLibro($conex, $libro_id)
{
	$answer = array();

	$sql ="SELECT * FROM biblioteca.libro ";
	$sql.="WHERE idLibro = $libro_id ";

	$result = mysqli_query($conex, $sql);
	while ($row = mysqli_fetch_array($result)) {
        $answer['idLibro'] = trim($row['idLibro']);
        $answer['isbn'] = trim($row['isbn']);
        $answer['editorial'] = trim($row['editorial']);
        $answer['numPaginas'] = trim($row['numero_paginas']);
    }
		
	return $answer;
	mysqli_close($conex);
}


// function editarLibro($conex, $datos)
// {
// }
?>