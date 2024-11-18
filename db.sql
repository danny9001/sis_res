mysql -u root -p
CREATE DATABASE eventos;

CREATE USER 'eventos_user'@'%' IDENTIFIED BY 'eventos_password';
GRANT ALL PRIVILEGES ON eventos.* TO 'eventos_user'@'%';
FLUSH PRIVILEGES;

CREATE DATABASE eventos;

USE eventos;

CREATE TABLE usuarios (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  password VARCHAR(255) NOT NULL
);

CREATE TABLE eventos (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(100) NOT NULL,
  fecha DATE NOT NULL,
  hora TIME NOT NULL
);

CREATE TABLE invitados (
  id INT PRIMARY KEY AUTO_INCREMENT,
  nombre VARCHAR(50) NOT NULL,
  apellido VARCHAR(50) NOT NULL,
  correo VARCHAR(100) NOT NULL,
  id_evento INT NOT NULL,
  FOREIGN KEY (id_evento) REFERENCES eventos(id)
);

CREATE TABLE mesas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  numero INT NOT NULL,
  capacidad INT NOT NULL
);

CREATE TABLE reservas (
  id INT PRIMARY KEY AUTO_INCREMENT,
  fecha DATE NOT NULL,
  hora TIME NOT NULL,
  id_usuario INT NOT NULL,
  id_mesa INT NOT NULL,
  FOREIGN KEY (id_usuario) REFERENCES usuarios(id),
  FOREIGN KEY (id_mesa) REFERENCES mesas(id)
);

CREATE TABLE qrcodes (
  id INT PRIMARY KEY AUTO_INCREMENT,
  codigo VARCHAR(255) NOT NULL,
  texto VARCHAR(255) NOT NULL,
  id_evento INT NOT NULL,
  FOREIGN KEY (id_evento) REFERENCES eventos(id)
);
