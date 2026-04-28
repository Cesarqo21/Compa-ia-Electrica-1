-- CREAR BASE DE DATOS
CREATE DATABASE sistema_electrica;
USE sistema_electrica;

-- TABLA USUARIO (LOGIN)
CREATE TABLE usuario (
    id_usuario INT AUTO_INCREMENT PRIMARY KEY,
    usuario VARCHAR(50) NOT NULL,
    contrasena VARCHAR(100) NOT NULL,
    rol VARCHAR(50) NOT NULL
);

-- TABLA CLIENTE
CREATE TABLE cliente (
    id_cliente INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    telefono VARCHAR(20),
    direccion VARCHAR(150)
);

-- TABLA PRODUCTO 
CREATE TABLE producto (
    id_producto INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100),
    stock INT,
    precio DECIMAL(10,2)
);

-- TABLA INSTALACION
CREATE TABLE instalacion (
    id_instalacion INT AUTO_INCREMENT PRIMARY KEY,
    id_cliente INT,
    fecha DATE,
    estado VARCHAR(50),

    FOREIGN KEY (id_cliente) REFERENCES cliente(id_cliente)
);

-- TABLA DETALLE INSTALACION
CREATE TABLE detalle_instalacion (
    id_detalle INT AUTO_INCREMENT PRIMARY KEY,
    id_instalacion INT,
    id_producto INT,
    cantidad INT,

    FOREIGN KEY (id_instalacion) REFERENCES instalacion(id_instalacion),
    FOREIGN KEY (id_producto) REFERENCES producto(id_producto)
);

-- USUARIOS
INSERT INTO usuario (usuario, contrasena, rol) VALUES
('admin', '1234', 'admin');
