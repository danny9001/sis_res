CREATE DATABASE sistema_reservas;
CREATE USER 'usuario_reservas'@'localhost' IDENTIFIED BY 'contraseña_segura';
GRANT ALL PRIVILEGES ON sistema_reservas.* TO 'usuario_reservas'@'localhost';
FLUSH PRIVILEGES;
EXIT;


USE sistema_reservas;

CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    rol ENUM('Administrador', 'Encargado de Reservas', 'Encargado de Revisión', 'Encargado de Control en Puerta', 'Encargado de Control de Pagos', 'Personal Administrativo') NOT NULL,
    email VARCHAR(100) UNIQUE,
    contraseña VARCHAR(255),
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);

CREATE TABLE sectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    capacidad INT
);

CREATE TABLE mesas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sector_id INT,
    numero INT,
    capacidad INT,
    FOREIGN KEY (sector_id) REFERENCES sectores(id)
);

CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    mesa_id INT,
    fecha DATE,
    pagado BOOLEAN DEFAULT 0,
    estado ENUM('Pendiente', 'Confirmada', 'Cancelada'),
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id),
    FOREIGN KEY (mesa_id) REFERENCES mesas(id)
);

CREATE TABLE invitados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT,
    nombre VARCHAR(100),
    ci VARCHAR(20),
    fecha_nacimiento DATE,
    FOREIGN KEY (reserva_id) REFERENCES reservas(id)
);

CREATE DATABASE sistema_eventos;
USE sistema_eventos;

-- Tabla para usuarios del sistema
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL,
    role VARCHAR(20) NOT NULL
);

-- Tabla para los permisos de usuario
CREATE TABLE user_permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    permiso VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);

-- Tabla de reservas
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    fecha DATETIME NOT NULL,
    encargado_id INT,
    estado ENUM('pendiente', 'confirmada', 'cancelada') DEFAULT 'pendiente',
    sector VARCHAR(50),
    mesa VARCHAR(50),
    FOREIGN KEY (encargado_id) REFERENCES usuarios(id)
);

-- Tabla de invitados asociados a una reserva
CREATE TABLE invitados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT,
    nombre VARCHAR(100),
    ci VARCHAR(20),
    fecha_nacimiento DATE,
    mesa VARCHAR(50),
    sector VARCHAR(50),
    consumo VARCHAR(50),
    FOREIGN KEY (reserva_id) REFERENCES reservas(id)
);

-- Tabla para el historial de accesos y modificaciones
CREATE TABLE log_accesos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    accion VARCHAR(255),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id)
);

-- Tabla para los registros públicos de invitados
CREATE TABLE invitados_publicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    ci VARCHAR(20),
    qr_path VARCHAR(255)
);

ALTER TABLE usuarios 
ADD COLUMN requiere_cambio_password BOOLEAN DEFAULT FALSE;

