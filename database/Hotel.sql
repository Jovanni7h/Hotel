CREATE DATABASE Hotel;
USE Hotel;

CREATE TABLE Habitaciones(
  Id_Habitacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Nombre_Hab VARCHAR(15) NOT NULL,
  Precio INT NOT NULL,
  Cantidad INT NOT NULL, 
)ENGINE=InnoDB;

CREATE TABLE Reservaciones(
  Id_Reservacion INT NOT NULL AUTO_INCREMENT,
  Nombre VARCHAR(25) NOT NULL,
  Apellido VARCHAR(25) NOT NULL,
  Telefono VARCHAR(10) NOT NULL,
  Fecha_Rev DATE NOT NULL,
  Hora TIME NOT NULL,
  Id_Habitacion INT NOT NULL,
  Cantidad INT NOT NULL,
  PRIMARY KEY(Id_Reservacion),
  FOREIGN KEY(Id_Habitacion) REFERENCES Habitaciones(Id_Habitacion)
)ENGINE=InnoDB;

CREATE TABLE Usuarios(
  IdUsuario INT NOT NULL AUTO_INCREMENT PRIMARY KEY ,
  Usuario VARCHAR(20) NOT NULL,
  Contraseña VARCHAR(20) NOT NULL
)ENGINE=InnoDB;

CREATE TABLE Confirmacion(
  Id_Confirmacion INT NOT NULL AUTO_INCREMENT PRIMARY KEY,
  Id_Reservacion INT NOT NULL,
  Cantidad INT NOT NULL,
  Nombre_ImgImagen  VARCHAR(30) NOT NULL,
  Imagen LONGBLOB NOT NULL,
  FOREIGN KEY(Id_Reservacion) REFERENCES Reservaciones(Id_Reservacion)
)ENGINE=InnoDB;




INSERT INTO Usuarios (Usuario,Contraseña) VALUES("Admin","1234")

INSERT INTO Habitaciones (Nombre_Hab,Precio) VALUES("Sencilla", 250)
INSERT INTO Habitaciones (Nombre_Hab,Precio) VALUES("Especial", 500)
INSERT INTO Habitaciones (Nombre_Hab,Precio) VALUES("Suite", 1100)

