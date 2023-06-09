CREATE DATABASE DB_PROYECTO;
USE DB_PROYECTO;
-- DROP DATABASE DB_PROYECTO
CREATE TABLE ESTADO_USUARIO(
	id_estado_usuario INT PRIMARY KEY AUTO_INCREMENT,
    estado_usuario VARCHAR (30) NOT NULL
);
CREATE TABLE ESTADO_CATEGORIA(
	id_estado_categoria INT PRIMARY KEY AUTO_INCREMENT,
    estado_categoria VARCHAR (30) NOT NULL
);
CREATE TABLE CLASE_USUARIO(
	id_clase INT PRIMARY KEY AUTO_INCREMENT,
    clase VARCHAR (60) NOT NULL
);
CREATE TABLE CATEGORIA(
	id_categoria INT PRIMARY KEY AUTO_INCREMENT,
    categoria VARCHAR (60) NOT NULL,
    fk_estado_categoria INT NOT NULL,
    FOREIGN KEY (fk_estado_categoria) REFERENCES ESTADO_CATEGORIA(id_estado_categoria)
);
CREATE TABLE USUARIO(
	id_usuario INT PRIMARY KEY AUTO_INCREMENT,
    usuario VARCHAR (60) NOT NULL,
    correo VARCHAR (90) NOT NULL,
    clave VARCHAR (18) NOT NULL,
    certificado LONGBLOB NULL,
    tipo_archivo varchar (50)NULL,
    verificado BOOLEAN DEFAULT 0,
    fk_clase INT NOT NULL,
    fk_estado_usuario INT NOT NULL,
    FOREIGN KEY (fk_clase) REFERENCES CLASE_USUARIO(id_clase),
    FOREIGN KEY (fk_estado_usuario) REFERENCES ESTADO_USUARIO(id_estado_usuario)
);
CREATE TABLE RECOMENDAR(
	id_recomendar INT PRIMARY KEY AUTO_INCREMENT,
    titulo varchar (100) NOT NULL,
    comentario NVARCHAR (10000) NULL,
    imagen LONGBLOB NULL,
    tipo_imagen varchar (50)NULL,
    fk_categoria INT NOT NULL,
    registro_usuario VARCHAR (60) NOT NULL,
    recomendados INT NULL,
    no_recomendados INT NULL,
    FOREIGN KEY (fk_categoria) REFERENCES CATEGORIA(id_categoria)
);
CREATE TABLE DETALLE_RECOMENDAR(
	id_detalle INT NOT NULL AUTO_INCREMENT,
	fk_recomendar INT NOT NULL,
    fk_usuario INT NOT NULL,
    usuario VARCHAR (60) NOT NULL,
    respuesta NVARCHAR (5000) NOT NULL,
    PRIMARY KEY (id_detalle,fk_recomendar,fk_usuario),
    FOREIGN KEY (fk_recomendar) REFERENCES RECOMENDAR(id_recomendar),
    FOREIGN KEY (fk_usuario) REFERENCES USUARIO(id_usuario)
);

 

INSERT INTO ESTADO_USUARIO(ESTADO_USUARIO) VALUES("Activo");
INSERT INTO ESTADO_USUARIO(ESTADO_USUARIO) VALUES("Inactivo");
INSERT INTO ESTADO_USUARIO(ESTADO_USUARIO) VALUES("Reportado");

INSERT INTO ESTADO_CATEGORIA(ESTADO_CATEGORIA) VALUES("Visible");
INSERT INTO ESTADO_CATEGORIA(ESTADO_CATEGORIA) VALUES("Oculta");

INSERT INTO CATEGORIA() VALUES(NULL,'Salud',1);
INSERT INTO CATEGORIA() VALUES(NULL,'Mentalidad',1);
INSERT INTO CATEGORIA() VALUES(NULL,'Consejo',1);
INSERT INTO CATEGORIA() VALUES(NULL,'Repercuciones',2);

INSERT INTO CLASE_USUARIO() VALUES(NULL,"Admin");
INSERT INTO CLASE_USUARIO() VALUES(NULL,"Usuario Común");
INSERT INTO CLASE_USUARIO() VALUES(NULL,"Madre");
INSERT INTO CLASE_USUARIO() VALUES(NULL,"Padre");
INSERT INTO CLASE_USUARIO() VALUES(NULL,"Doctor");
INSERT INTO CLASE_USUARIO() VALUES(NULL,"Psicólogo");

INSERT INTO USUARIO() VALUES(NULL,"admin","admin@email.com","12345",null,null,default,1,1);


