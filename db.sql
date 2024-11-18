-- Crear base de datos unificada
CREATE DATABASE sistema_reservas_eventos;
USE sistema_reservas_eventos;

-- Crear usuario y otorgar privilegios
CREATE USER 'usuario_reservas'@'localhost' IDENTIFIED BY 'contraseña_segura';
GRANT ALL PRIVILEGES ON sistema_reservas_eventos.* TO 'usuario_reservas'@'localhost';
FLUSH PRIVILEGES;

-- Tabla para usuarios del sistema
CREATE TABLE usuarios (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    email VARCHAR(100) UNIQUE NOT NULL,
    contrasena VARCHAR(255) NOT NULL,
    rol ENUM('Administrador', 'Encargado de Reservas', 'Encargado de Revisión', 'Encargado de Control en Puerta', 'Encargado de Control de Pagos', 'Personal Administrativo') NOT NULL,
    creado_en TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
    requiere_cambio_password BOOLEAN DEFAULT FALSE
);

-- Tabla para sectores
CREATE TABLE sectores (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    capacidad INT NOT NULL
);

-- Tabla para mesas
CREATE TABLE mesas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    sector_id INT,
    numero INT NOT NULL,
    capacidad INT NOT NULL,
    FOREIGN KEY (sector_id) REFERENCES sectores(id) ON DELETE CASCADE
);

-- Tabla para reservas
CREATE TABLE reservas (
    id INT AUTO_INCREMENT PRIMARY KEY,
    usuario_id INT,
    mesa_id INT,
    fecha DATETIME NOT NULL,
    pagado BOOLEAN DEFAULT FALSE,
    estado ENUM('Pendiente', 'Confirmada', 'Cancelada') DEFAULT 'Pendiente',
    FOREIGN KEY (usuario_id) REFERENCES usuarios(id) ON DELETE CASCADE,
    FOREIGN KEY (mesa_id) REFERENCES mesas(id) ON DELETE CASCADE
);

-- Tabla para invitados
CREATE TABLE invitados (
    id INT AUTO_INCREMENT PRIMARY KEY,
    reserva_id INT,
    nombre VARCHAR(100) NOT NULL,
    ci VARCHAR(20),
    fecha_nacimiento DATE,
    FOREIGN KEY (reserva_id) REFERENCES reservas(id) ON DELETE CASCADE
);

-- Tabla para los permisos de usuario
CREATE TABLE user_permissions (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    permiso VARCHAR(50),
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla para el historial de accesos y modificaciones
CREATE TABLE log_accesos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    user_id INT,
    accion VARCHAR(255),
    fecha DATETIME DEFAULT CURRENT_TIMESTAMP,
    FOREIGN KEY (user_id) REFERENCES usuarios(id) ON DELETE CASCADE
);

-- Tabla para los registros públicos de invitados
CREATE TABLE invitados_publicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    ci VARCHAR(20),
    qr_path VARCHAR(255)
);