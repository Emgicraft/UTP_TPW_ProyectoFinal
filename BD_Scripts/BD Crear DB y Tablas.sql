CREATE DATABASE IF NOT EXISTS BDMARKET;
USE BDMARKET;

-- Tabla para almacenar los empleados
CREATE TABLE Empleado (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    cargo VARCHAR(100) NOT NULL,
    salario DECIMAL(10, 2) NOT NULL,
    fecha_contratacion DATE NOT NULL
);

-- Tabla para almacenar los clientes
CREATE TABLE Cliente (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL,
    numruc VARCHAR(16) NULL,
    direccion VARCHAR(100) NULL,
    telefono VARCHAR(20) NULL
);

-- Tabla para almacenar las categorías de productos
CREATE TABLE Categoria (
    id INT AUTO_INCREMENT PRIMARY KEY,
    nombre VARCHAR(100) NOT NULL
);

-- Tabla para almacenar los productos
CREATE TABLE Producto (
    id INT AUTO_INCREMENT PRIMARY KEY,
    -- nombre INT,
    descripcion VARCHAR(100) NOT NULL,
    categoria_id INT,
    precio DECIMAL(10, 2) NOT NULL,
    stock INT NOT NULL,
    FOREIGN KEY (categoria_id) REFERENCES Categoria(id)
);

-- Tabla para almacenar las ventas
CREATE TABLE Venta (
    id INT AUTO_INCREMENT PRIMARY KEY,
    cliente_id INT,
    empleado_id INT,
    fecha_venta DATE NOT NULL,
    FOREIGN KEY (cliente_id) REFERENCES Cliente(id),
    FOREIGN KEY (empleado_id) REFERENCES Empleado(id)
);

CREATE TABLE Detalle_Venta (
	venta_id INT NOT NULL,
	producto_id INT NOT NULL,
    cantidad INT NOT NULL,
	PRIMARY KEY(venta_id, producto_id),
    FOREIGN KEY (venta_id) REFERENCES Venta(id),
    FOREIGN KEY (producto_id) REFERENCES Producto(id)
);
