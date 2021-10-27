CREATE TABLE usuarios(
	idusuario INT(11) NOT NULL AUTO_INCREMENT,
	nombre VARCHAR(20) NOT NULL,
	apellido VARCHAR (20) NOT NULL,
	correoElectronico VARCHAR(30) NOT NULL,
	contrasena VARCHAR(255) NOT NULL,
	PRIMARY KEY(idusuario)
);


CREATE TABLE recetas(
	idreceta INT(11) NOT NULL AUTO_INCREMENT,
	idusuario INT(11) NOT NULL,
	nombre VARCHAR(64) NOT NULL,
	ingredientes VARCHAR(500) NOT NULL,
	idcategoriaAgrupadas INT(11) NOT NULL,
	pasos VARCHAR(5000) NOT NULL,
	PRIMARY KEY (idreceta)
);


CREATE TABLE categorias(
	idcategoria INT(11) NOT NULL ,
	grupo VARCHAR(200) NOT NULL,
	PRIMARY KEY(idcategoria)
);



CREATE TABLE categoriaRecetas(
	idcategoria INT(11) NOT NULL,
	idreceta INT(11) NOT NULL,
	PRIMARY KEY (idcategoria,idreceta)
);


CREATE TABLE categoriaAgrupadas(
	idcategoriaAgrupadas INT(11) NOT NULL AUTO_INCREMENT,
	titulo VARCHAR(30),
	idcategoria INT(11) NOT NULL,
	PRIMARY KEY(idcategoriaAgrupadas)
);

CREATE TABLE favoritoRecetas(
	idusuario INT(11) NOT NULL,
	idreceta INT(11) NOT NULL,
PRIMARY KEY (idusuario, idreceta)
);


CREATE TABLE recetaComentarios(
	idcomentario int(11) NOT NULL AUTO_INCREMENT,
	idreceta INT(11) NOT NULL,
	idusuario INT(11) NOT NULL,
	comentario VARCHAR(500) NOT NULL,
	PRIMARY KEY(idcomentario)
);




INSERT INTO categorias (idcategoria, grupo) VALUES (1,"Dulces");
INSERT INTO categorias (idcategoria, grupo) VALUES (2,"Bebidas");
INSERT INTO categorias (idcategoria, grupo) VALUES (3,"Carnes");
INSERT INTO categorias (idcategoria, grupo) VALUES (4,"Ensaladas");
INSERT INTO categorias (idcategoria, grupo) VALUES (5,"Pastas");


INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo, idcategoria) VALUES (1,"Pasteles",1);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (2,"Helados",1);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (3,"Galletas",1);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (4,"Bizcochos",1);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (5,"Chocolates",1);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (6,"Con alcohol",2);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (7,"Sin alcohol",2);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (8,"Infusiones",2);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (9,"Cerdo",3);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (10,"Vacuno",3);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (11,"Cordero",3);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (12,"Pollo",3);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (13,"Pescado",3);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (14,"Legumbres",4);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (15,"Mariscos",3);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (16,"Arroz",4);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (17,"Frutas",1);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (18,"Espaguetis",5);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (19,"Lasaña",5);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (20,"Macarrones",5);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (21,"Sorrentinos",5);
INSERT INTO categoriaAgrupadas (idcategoriaAgrupadas, titulo,idcategoria) VALUES (22,"Ravioles",5);

INSERT INTO usuarios(nombre, apellido, correoElectronico, contrasena)
VALUES('John', 'Do', 'jdo@mail.com', '1234'), ('Jane', 'Do', 'janedo@mail.com', '1234')


INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (1,"Milanesa con pure","papas, pan rallado, carne, huevo, perejil, ajo",10,"cortamos la carne, la pasamos por huevo, enpanamos y freimos");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (2,"Arroz con leche","Arroz, leche, azucar, cascara de naranja",16,"cocinamos el arroz con leche hirviendo y azucar");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (3,"Cerdo al horno","Carne de cerdo, sal, especias, aceite",9,"cortamos la carne, la untamos en aceite y le agregas sal y especias, la cocinamos por 15 minutos");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (3,"Licuado de banana","banana, leche, azucar",7,"licuamos la banana con leche y azucar");

INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (1,"Receta de Paella de pollo y conejo","pollo, aceite, arroz,ajo ,sal, pimenton",12,"trozeamos las carnes, las cubrimos en aceite, las condimentamos, las cocinamos, le agregamos arroz dejamos cocinar");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (1,"Scons dulces","harina 0000, huevo, leche, azucar, esencia de vainilla, manteca",4,"juntamos todos los ingredientes, los amasamos, dejamos reposar la masa en la heladera, lo cocinamos en horno por 20 minutos");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (1,"Milanesa de pollo","pollo, pan rallado, sal, peregil, huevo, aceite",12,"cortamos pechuga de pollo en filete, lo empanamos con huevo y pan rallado. Lo freimos por 5 minutos");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (2,"Licuado de durazno","furazno, leche, azucar",7,"licuamos el durazno con leche y azucar por 5 minutos, podemos agregarle hielo");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (2,"Licuado de frutilla","frutilla, leche, azucar",7,"licuamos la frutilla con leche y azucar, podemos agregarl hielo y remplazar la leche con agua");
INSERT INTO recetas (idusuario, nombre, ingredientes,idcategoriaAgrupadas,pasos ) VALUES (2,"Bizcochuelo","harina, leche, azucar, huevo",4,"mezclamos los secos por un lado y los liquidos por otro, luego vamos uniendo todo poco a poco hasta que nos quede una masa espesa. Apartir de ahi cocinamos en horno por 50 minutos");



ALTER TABLE categoriaAgrupadas 
ADD FOREIGN KEY (idcategoria) REFERENCES categorias(idcategoria);

ALTER TABLE receta
ADD FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario);

ALTER TABLE recetaComentarios
ADD FOREIGN KEY (idreceta) REFERENCES recetas(idreceta);

ALTER TABLE recetaComentarios
ADD FOREIGN KEY (idusuario) REFERENCES usuarios(idusuario);

ALTER TABLE recetas
ADD FOREIGN KEY (idcategoriaAgrupadas) REFERENCES categoriaAgrupadas(idcategoriaAgrupadas);
