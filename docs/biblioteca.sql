CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE IF NOT EXISTS ficha_autor(idficha_autor INT AUTO_INCREMENT, nombre VARCHAR(45) NOT NULL,
	PRIMARY KEY(idficha_autor));

CREATE TABLE IF NOT EXISTS libro(idLibro INT AUTO_INCREMENT, titulo VARCHAR(45) NOT NULL, isbn INTEGER NOT NULL,
	editorial VARCHAR(50) NOT NULL, numero_paginas INTEGER NOT NULL,
    PRIMARY KEY(idLibro));
    
CREATE TABLE IF NOT EXISTS usuario(idUsuario INT AUTO_INCREMENT, nombre VARCHAR(30) NOT NULL, direccion VARCHAR(45) NOT NULL,
	telefono INTEGER NOT NULL,
    PRIMARY KEY(idUsuario));
    
CREATE TABLE IF NOT EXISTS ejemplar(idEjemplar INT AUTO_INCREMENT, localizacion VARCHAR(100) NOT NULL, idLibro INT NOT NULL,
	CONSTRAINT fk_idLibro FOREIGN KEY(idLibro) REFERENCES libro(idLibro),
    PRIMARY KEY(idEjemplar));

CREATE TABLE IF NOT EXISTS ficha_autor_has_libro(idficha_autor INTEGER NOT NULL, idLibro INTEGER NOT NULL,
	CONSTRAINT fk2_idLibro FOREIGN KEY(idLibro) REFERENCES libro(idLibro),
    CONSTRAINT fk_idficha_autor FOREIGN KEY(idficha_autor) REFERENCES ficha_autor(idficha_autor),
    PRIMARY KEY(idficha_autor, idLibro));

CREATE TABLE IF NOT EXISTS ejemplar_has_usuario(fecha_prestamo DATE NOT NULL, fecha_devolucion DATE NOT NULL,
	idEjemplar INTEGER NOT NULL, idUsuario INTEGER NOT NULL,
    CONSTRAINT fk_idUsuario FOREIGN KEY(idUsuario) REFERENCES usuario(idUsuario),
    CONSTRAINT fk_idEjemplar FOREIGN KEY(idEjemplar) REFERENCES ejemplar(idEjemplar),
    PRIMARY KEY(idEjemplar, idUsuario));