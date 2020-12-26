CREATE DATABASE biblioteca;
USE biblioteca;

CREATE TABLE IF NOT EXISTS autor (
	idautor INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

CREATE TABLE IF NOT EXISTS libro (
	idlibro INT AUTO_INCREMENT PRIMARY KEY,
    isbn INT UNIQUE NOT NULL,
    nombre VARCHAR(100) NOT NULL,
    leyenda VARCHAR(100),
    descripcion VARCHAR(255) NOT NULL,
    cantidad_bodega INT NOT NULL,
    num_paginas INT NOT NULL,
    idautor INT,
    precio INT,
    CONSTRAINT fk_idautor FOREIGN KEY(idautor) REFERENCES autor(idautor)
);

-- Datos temporales de ejemplo
INSERT INTO biblioteca.autor(nombre)
	VALUES('Seleccione...'),('Julian Melgosa y Michelson Borges'),('Alba Rosa Pastora Olivares'),('Isha'),
    ('Ediciones Paulinas Verbo Divino');
SELECT a.idautor AS "#", a.nombre FROM biblioteca.autor a;
-- SET FOREIGN_KEY_CHECKS = 0; 
-- TRUNCATE table autor; 
-- SET FOREIGN_KEY_CHECKS = 1;

INSERT INTO biblioteca.libro(isbn, nombre, leyenda, descripcion, cantidad_bodega, num_paginas, idautor, precio)
	VALUES (10502,'El poder de la esperanza','Secretos del bienestar emocional','Practicar ejercicio fisico y tener...',20,96,2,5200);
INSERT INTO biblioteca.libro(isbn, nombre, leyenda, descripcion, cantidad_bodega, num_paginas, idautor, precio)
	VALUES (2015,'Camino al exito','Demoliendo mis zonas estrechos','Muchas veces no preocupamos de...',100,80,3,2380);
INSERT INTO biblioteca.libro(isbn, nombre, leyenda, descripcion, cantidad_bodega, num_paginas, idautor, precio)
	VALUES (978956,'Sobre las nubes','El sol esta siempre brillando...','La vida es una oferta increible...',5,173,4,1000);
INSERT INTO biblioteca.libro(isbn, nombre, leyenda, descripcion, cantidad_bodega, num_paginas, idautor, precio)
	VALUES (777,'La Biblia','!Jesucristo ha resucitado¡','La historia de Dios',10,388,5,8760);
 SET FOREIGN_KEY_CHECKS = 0; 
 TRUNCATE table libro; 
 SET FOREIGN_KEY_CHECKS = 1;

SELECT l.idlibro AS "#", l.isbn, l.nombre AS "titulo", l.leyenda, l.descripcion, l.cantidad_bodega AS "stock", 
	l.num_paginas AS "paginas", a.nombre AS "author", l.precio
FROM biblioteca.libro l
INNER JOIN biblioteca.autor a ON l.idautor = a.idautor;

SELECT l.isbn, l.nombre AS 'titulo', l.cantidad_bodega, a.nombre AS 'author', l.precio FROM biblioteca.libro l  INNER JOIN biblioteca.autor a ON l.idautor = a.idautor WHERE l.isbn = 978956
