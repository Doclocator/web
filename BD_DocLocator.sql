-- crear_base_de_datos.sql

CREATE DATABASE IF NOT EXISTS doclocator
CHARACTER SET utf8mb4
COLLATE utf8mb4_general_ci;

USE doclocator;

CREATE TABLE IF NOT EXISTS medicos (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    especialidad VARCHAR(100) NOT NULL,
    municipio VARCHAR(100) NOT NULL,
    direccion VARCHAR(255),
    telefono VARCHAR(20)
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;
