CREATE TABLE categoriaAgrupadas(
	idcategoriaAgrupadas INT(11) NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(30),
PRIMARY KEY(idcategoriaAgrupadas)
);



CREATE TABLE categorias(
    idcategoria INT(11) NOT NULL AUTO_INCREMENT,
    descripcion VARCHAR(200) NOT NULL,
    idcategoriaAgrupadas INT(11) NOT NULL,
    PRIMARY KEY(idcategoria)
);


CREATE TABLE recetas(
	idreceta INT(11) NOT NULL AUTO_INCREMENT,
	idusuario INT(11) NOT NULL,
	idpais INT(11) NOT NULL,
	idcategoria INT(11) NOT NULL,
	nombre VARCHAR(30) NOT NULL,
	ingredientes VARCHAR(500) NOT NULL,
	pasos VARCHAR(5000) NOT NULL,
	PRIMARY KEY (idreceta)
);

CREATE TABLE usuarios(
	idusuario INT(11) NOT NULL AUTO_INCREMENT,
	idperfil INT(11) NOT NULL,
	idpais INT(11) NOT NULL,
	idgenero INT(11) NOT NULL,
	nombre VARCHAR(20) NOT NULL,
	apellido VARCHAR (20) NOT NULL,
	correoElectronico VARCHAR(30) NOT NULL,
	fechaNachimiento DATE NOT NULL,
	contraseña VARCHAR(255) NOT NULL,
	PRIMARY KEY(idusuario)
);



ALTER TABLE recetas ADD COLUMN idcategoriaAgrupadas INT(11) NOT NULL;






alter categorias
add foreign key (idcategoriaAgrupadas) references categoriaAgrupadas(idcategoriaAgrupadas);



INSERT INTO categoriaagrupadas (titulo) VALUES ('Pastas'),('Legumbres'), ('Carnes')

insert into categorias (descripcion, idcategoriaAgrupadas)
VALUES('Parrillada', 3),('milanesa', 3), ('ravioles', 1), ('fideos', 1), ('ñioquis', 1), ('ensalada',2)




SELECT R.idreceta, R.nombre, R.idcategoria, C.descripcion AS 'categoria', R.idusuario
		, U.apellido, U.nombre as 'Usuario'
FROM recetas R
INNER JOIN categorias C ON C.idcategoria = R.idcategoria
inner join usuarios U on U.idusuario = R.idusuario 




