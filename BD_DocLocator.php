-- Crear base de datos si no existe
CREATE DATABASE IF NOT EXISTS doclocator
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

-- Usar la base de datos creada
USE doclocator;

-- Crear tabla 'medicos' si no existe
CREATE TABLE IF NOT EXISTS medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    municipio VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

-- Insertar datos de ejemplo en la tabla 'medicos'
INSERT INTO medicos (nombre, especialidad, municipio, direccion, telefono) VALUES
('Dr. Juan Pérez', 'Cardiología', 'Madrid', 'Calle Ficticia 123', '123456789'),
('Dra. Ana López', 'Pediatría', 'Barcelona', 'Avenida Ejemplo 45', '987654321'),
('Dr. Luis García', 'Dermatología', 'Valencia', 'Carrer de l\'Exemple 67', '654321987'),
('Dra. María Sánchez', 'Ginecología', 'Sevilla', 'Calle Real 89', '112233445');
